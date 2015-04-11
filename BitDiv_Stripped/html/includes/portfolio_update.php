<?php

  include '../data/config.php';

  if(empty($_POST)) {
    echo 'error: should not be here without having posted from form';
    exit;
  }

  session_name('Private');
  session_start();

  $uid = $_SESSION['uid'];
  $p_name = $_POST['p_name'];
  $p_funding = $_POST['p_funding'];
  $p_risk = $_POST['p_risk'];
  $p_reinvest = isset($_POST['p_reinvest']) && $_POST['p_reinvest'] ? 1 : 0;
  $p_public = isset($_POST['p_public']) && $_POST['p_public'] ? 1 : 0;
  $sql = '';

  $p_id = $_GET['p_id'];

  if($p_name == '') {
    $p_name = $_SESSION['portfolios'][$p_id]['p_name'];
  }


  if(isset($_POST['update'])) {
    $sql = 'UPDATE user_portfolios SET '
      .'uid='.$uid.', '
      .'p_name=\''.$p_name.'\', '
      .'p_funding='.$p_funding.', '
      .'p_risk='.$p_risk.', '
      .'p_reinvest='.$p_reinvest.', '
      .'p_public='.$p_public
      .' WHERE (p_id='.$p_id.')'
      .';';
  } else if(isset($_POST['delete'])) {
    // need to also delete stocks
    $sql = 'DELETE FROM user_portfolios '
      .' WHERE (p_id='.$p_id.')'
      .';';
  } else if(isset($_POST['copy'])) {
    $sql = 'INSERT INTO user_portfolios SET '
      .'uid='.$uid.', '
      .'p_name=\''.$p_name.' Copy\', '
      .'p_funding='.$p_funding.', '
      .'p_risk='.$p_risk.', '
      .'p_reinvest='.$p_reinvest.', '
      .'p_public='.$p_public
      .';';
  }


  try {

    // write parameters for new stock to database
    $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $statement = $db->prepare($sql);
    $statement->execute();
    $new_p_id = $db->lastInsertId();

  } catch(PDOException $e) {
    echo '<!DOCTYPE html><html><head><script language="javascript"> alert("Unable to connect to the database: '.$e.'") </script></head><body></body></html>';
    exit;
  }

  // update $_SESSION to add new portfolio
  if(isset($_POST['update'])) {
    $_SESSION['active_p_id'] = $p_id;
    $_SESSION['portfolios'][$p_id] =
      array(
        'uid' => $uid,
        'p_id' => $p_id,
        'p_name' => $p_name,
        'p_funding' => $p_funding,
        'p_risk' => $p_risk,
        'p_reinvest' => $p_reinvest,
        'p_public' => $p_public,
    );
  } else if(isset($_POST['delete'])) {
    // make new first portfolio active
    reset($_SESSION['portfolios']);
    $_SESSION['active_p_id'] = key($_SESSION['portfolios']);
    // remove portfolio
    unset($_SESSION['portfolios'][$p_id]);
  } else if(isset($_POST['copy'])) {
    $_SESSION['active_p_id'] = $new_p_id;
    $_SESSION['portfolios'][$new_p_id] =
      array(
        'uid' => $uid,
        'p_id' => $new_p_id,
        'p_name' => $p_name,
        'p_funding' => $p_funding,
        'p_risk' => $p_risk,
        'p_reinvest' => $p_reinvest,
        'p_public' => $p_public,
    );
  }

  header('Location: ../page_portfolios.php');
  exit;

?>

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

  if($p_name == '') {
    $p_name = 'New Portfolio';
  }


    $sql = 'INSERT INTO user_portfolios SET '
      .'uid='.$uid.', '
      .'p_name=\''.addcslashes($p_name, "'\"\r\n\\\t\0..\37").'\', '
      .'p_funding='.$p_funding.', '
      .'p_risk='.$p_risk.', '
      .'p_reinvest='.$p_reinvest.', '
      .'p_public='.$p_public
      .';';

  try {

    // write parameters for new stock to database
    $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $statement = $db->prepare($sql);
    $statement->execute();
    $p_id = $db->lastInsertId();

  } catch(PDOException $e) {
    echo '<!DOCTYPE html><html><head><script language="javascript"> alert("Unable to connect to the database: '.$e.'") </script></head><body></body></html>';
    exit;
  }

  // update $_SESSION to add new portfolio
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

    $_SESSION['active_p_id'] = $p_id;

  header('Location: ../page_portfolios.php');
  exit;

?>

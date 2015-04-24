<?php

  include '../data/config.php';

  if(empty($_POST)) {
    echo 'error: should not be here without having posted from form';
    exit;
  }

  // determine where user is coming from, to redirect back
  $referer_url = $_GET['referer']; //urldecode($referer);

  session_name('Private');
  session_start();

  $uid = $_SESSION['uid'];
  $ticker = strtoupper($_POST['ticker']);
  $number_shares = $_POST['number_shares'];
  $price = $_POST['price'];
  $date_purchased = date('Y-m-d', strtotime($_POST['date_purchased']));
  $p_id = $_POST['portfolio'];
  $transfer = 0; // 0 for purchase, 1 for sell
  $sql = '';
  
  if($p_id == 'new') {
  
  $uid = $_SESSION['uid'];
  $p_name = 'New Portfolio';
  $p_funding = empty($_SESSION['funding']) ? 10000.00 : $_SESSION['funding'];
  $p_risk = empty($_SESSION['risk']) ? 0 : $_SESSION['risk'];
  $p_reinvest = empty($_SESSION['reinvest']) ? 0 : $_SESSION['reinvest'];
  $p_public = 0;
  $sql = '';

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
  }

  if($_GET['act'] == 'remove') {

    $sql = 'DELETE FROM user_stocks WHERE stock_id = '.$_POST['stock_id'].';';

  } else {
    if($_GET['act'] == 'sell') {

    $transfer = 1;
    $ticker = $_GET['ticker'];
    $p_id = $_GET['portfolio'];

    //header('Location: '.$referer_url);
    //exit;
    }

    $sql = 'INSERT INTO user_stocks SET '
      .'uid='.$uid.', '
      .'ticker=\''.addcslashes($ticker, "'\"\r\n\\\t\0..\37").'\', '
      .'number_shares='.$number_shares.', '
      .'price='.$price.', '
      .'date_purchased=\''.addcslashes($date_purchased, "'\"\r\n\\\t\0..\37").'\', '
      .'portfolio='.$p_id.', '
      .'transfer='.$transfer
      .';';
  }

  try {

    // write parameters for new stock to database
    $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $statement = $db->prepare($sql);
    $statement->execute();
    $stock_id = $db->lastInsertId();

  } catch(PDOException $e) {
    echo '<!DOCTYPE html><html><head><script language="javascript"> alert("Unable to connect to the database: '.$e.'") </script></head><body></body></html>';
    exit;
  }

  // update $_SESSION to remove or add new stock
  if($_GET['act'] == 'remove') {
    unset($_SESSION['user_stocks'][$p_id][$ticker][$stock_id]);
  } else {
    $_SESSION['user_stocks'][$p_id][$ticker][$stock_id] =
      array(
        'uid' => $uid,
        'ticker' => $ticker,
        'number_shares' => $number_shares,
        'price' => $price,
        'date_purchased' => $date_purchased,
        'portfolio' => $p_id,
        'stock_id' => $stock_id,
        'transfer' => $transfer,
    );
  }

  $_SESSION['active_p_id'] = $p_id;

  //header('Location: '.$referer_url);
  header('Location: ../page_portfolios.php');
  exit;

?>

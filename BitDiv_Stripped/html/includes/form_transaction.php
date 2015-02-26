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
  $ticker = $_POST['ticker'];
  $number_shares = $_POST['number_shares'];
  $price = $_POST['price'];
  $date_purchased = date('Y-m-d', strtotime($_POST['date_purchased']));
  $portfolio = $_POST['portfolio'];

  // update $_SESSION to add new stock
  $_SESSION['user_stocks'][$ticker] =
    array(
      'uid' => $uid,
      'ticker' => $ticker,
      'number_shares' => $number_shares,
      'price' => $price,
      'date_purchased' => $date_purchased,
      'portfolio' => $portfolio,
    );

  try {

    // write parameters for new stock to database
    $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $sql = 'INSERT INTO user_stocks SET '
      .'uid='.$uid.', '
      .'ticker=\''.$ticker.'\', '
      .'number_shares='.$number_shares.', '
      .'price='.$price.', '
      .'date_purchased=\''.$date_purchased.'\', '
      .'portfolio='.$portfolio
      .';';

    $statement = $db->prepare($sql);
    $statement->execute();

  } catch(PDOException $e) {
    echo '<!DOCTYPE html><html><head><script language="javascript"> alert("Unable to connect to the database: '.$e.'") </script></head><body></body></html>';
    exit;
  }

  header('Location: '.$referer_url);
  exit;

?>

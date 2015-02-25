<?php

  include '../data/config.php';

  if(empty($_POST)) {
    echo 'error: should not be here without having posted from form';
    exit;
  }

  try {

    // write parameters to database
    $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $sql = 'INSERT INTO user_stocks SET '//(uid, ticker, number_shares, '
      //.'price, date_purchased, portfolio) VALUES ('
      .'uid='.$_SESSION['uid'].', '
      .'ticker=\''.$_POST['ticker'].'\', '
      .'number_shares='.$_POST['number_shares'].', '
      .'price='.$_POST['price'].', '
      .'date_purchased=\''.date('Y-m-d', strtotime($_POST['date_purchased'])).'\', '
      .'portfolio='.$_POST['portfolio']
      .';';
      //.');';

    $statement = $db->prepare($sql);
    $statement->execute();

  } catch(PDOException $e) {
    echo '<!DOCTYPE html><html><head><script language="javascript"> alert("Unable to connect to the database: '.$e.'") </script></head><body></body></html>';
    exit;
  }

  header('Location: http://'.$_SERVER['SERVER_NAME'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/') + 1));
  exit;

?>

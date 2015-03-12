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
  $transfer = 0; // 0 for purchase, 1 for sell
  $sql = '';

  if($_GET['act'] == 'remove') {

    $sql = 'DELETE FROM user_stocks WHERE stock_id = '.$_POST['stock_id'].';';

  } else {
    if($_GET['act'] == 'sell') {

    $transfer = 1;
    $ticker = $_GET['ticker'];
    $portfolio = $_GET['portfolio'];

    //header('Location: '.$referer_url);
    //exit;
    }

    $sql = 'INSERT INTO user_stocks SET '
      .'uid='.$uid.', '
      .'ticker=\''.$ticker.'\', '
      .'number_shares='.$number_shares.', '
      .'price='.$price.', '
      .'date_purchased=\''.$date_purchased.'\', '
      .'portfolio='.$portfolio.', '
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
    unset($_SESSION['user_stocks'][$portfolio][$ticker][$stock_id]);
  } else {
    $_SESSION['user_stocks'][$portfolio][$ticker][$stock_id] =
      array(
        'uid' => $uid,
        'ticker' => $ticker,
        'number_shares' => $number_shares,
        'price' => $price,
        'date_purchased' => $date_purchased,
        'portfolio' => $portfolio,
        'stock_id' => $stock_id,
        'transfer' => $transfer,
    );
  }

  header('Location: '.$referer_url);
  exit;

?>

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

  if(empty($p_name)) {
    $p_name = $_SESSION['portfolios'][$p_id]['p_name'];
  }


  if(isset($_POST['update'])) {
    $sql = 'UPDATE user_portfolios SET '
      .'uid='.$uid.', '
      .'p_name=\''.addcslashes($p_name, "'\"\r\n\\\t\0..\37").'\', '
      .'p_funding='.$p_funding.', '
      .'p_risk='.$p_risk.', '
      .'p_reinvest='.$p_reinvest.', '
      .'p_public='.$p_public
      .' WHERE (p_id='.$p_id.')'
      .';';
  } else if(isset($_POST['delete'])) {
    $sql = 'DELETE FROM user_portfolios '
      .' WHERE (p_id='.$p_id.')'
      .';';
    // need to also delete stocks
    $sql2 = 'DELETE FROM user_stocks WHERE portfolio = '.$p_id.';';
  } else if(isset($_POST['copy'])) {
    if($p_name == $_SESSION['portfolios'][$p_id]['p_name']) {
      $p_name .= ' Copy';
    }
    $sql = 'INSERT INTO user_portfolios SET '
      .'uid='.$uid.', '
      .'p_name=\''.addcslashes($p_name, "'\"\r\n\\\t\0..\37").'\', '
      .'p_funding='.$p_funding.', '
      .'p_risk='.$p_risk.', '
      .'p_reinvest='.$p_reinvest.', '
      .'p_public='.$p_public
      .';';
    // copying of stocks happens below (once new p_id is determined)
  }
  
  


  try {

    // write parameters for new stock to database
    $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $statement = $db->prepare($sql);
    $statement->execute();
    $new_p_id = $db->lastInsertId();

    if(!empty($sql2)) {
      $statement = $db->prepare($sql2);
      $statement->execute();
    }
    
    
  if(isset($_POST['copy'])) {
    // copy stocks
    $i = 0;
    foreach($_SESSION['user_stocks'][$p_id] as $key => $value) {
      foreach($value as $sid => $sparams) {
        $sql3[$i] = 'INSERT INTO user_stocks SET '
          .'uid='.$sparams['uid'].', '
          .'ticker=\''.$sparams['ticker'].'\', '
          .'number_shares='.$sparams['number_shares'].', '
          .'price='.$sparams['price'].', '
          .'date_purchased=\''.$sparams['date_purchased'].'\', '
          .'portfolio='.$new_p_id.', '
          .'transfer='.$sparams['transfer']
          .';';
        $i++;
      }
    }
    
      foreach($sql3 as $q) {
        $statement = $db->prepare($q);
        $statement->execute();
      }
    
  }
    
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
    // remove portfolio
    unset($_SESSION['portfolios'][$p_id]);
    // active portfolio is gone; make the first portfolio in the array active
    reset($_SESSION['portfolios']);
    $_SESSION['active_p_id'] = key($_SESSION['portfolios']);
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
    
        try {

      // write session variables to database
      $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $dbPassword);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

      $statement = $db->prepare('SELECT * FROM user_stocks WHERE uid="'.$_SESSION['uid'].'"');
      $statement->execute();

      // find all user stocks
      $user_stocks = array();
      $stock_list = array();
      while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $user_stocks[$row['portfolio']][$row['ticker']][$row['stock_id']] = $row;
        // track list of tickers
        if(!in_array($row['ticker'], $stock_list)) {
          $stock_list[] = $row['ticker'];
        }
      }

      // save to session
      session_name('Private');
      session_start();
      $_SESSION['user_stocks'] = $user_stocks;
      session_write_close();

    } catch(PDOException $e) {
      echo '<!DOCTYPE html><html><head><script language="javascript"> alert("Unable to connect to the database: '.$e.'") </script></head><body></body></html>';
      exit;
    }
    
    
    
  }

  header('Location: ../page_portfolios.php');
  exit;

?>

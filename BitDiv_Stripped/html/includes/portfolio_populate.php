<?php

  include 'data/config.php';

  // TODO: implement column 'number_portfolios' to be stored in users table
  // currently static 3 portfolios
  session_name('Private');
  session_start();
  $_SESSION['number_portfolios'] = 3;
  session_write_close();

  if(!isset($_SESSION['user_stocks'])) {
    try {

      // write session variables to database
      $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $dbPassword);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

      $statement = $db->prepare('SELECT * FROM user_stocks WHERE uid="'.$_SESSION['uid'].'"');
      $statement->execute();

      // find all user stocks
      $user_stocks = array();
      while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $user_stocks[$row['portfolio']][$row['ticker']][$row['stock_id']] = $row;
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
?>

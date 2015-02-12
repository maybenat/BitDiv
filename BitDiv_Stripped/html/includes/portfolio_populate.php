<?php

  include 'data/config.php';

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
        $user_stocks[$row['ticker']] = $row;
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

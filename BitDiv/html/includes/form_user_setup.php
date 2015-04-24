<?php

  include 'data/config.php';

  // current form page
  if(!isset($form_page)) {
    $form_page = 1;
  }
  // total number of form pages
  $NUM_PAGES = 3;

  // form progress bar completion
  $percent_complete = 5;

  // risk "enum"
  $RISK = array (
    'high' => 0,
    'med'  => 1,
    'low'  => 2
  );

  if(empty($_POST)) {
    return;
  }

  session_name('Private');
  session_start();

  // store posted values into session variable
  if(isset($_POST['next1'])) {
    $_SESSION['funding'] = (int)$_POST['funding'];
    $_SESSION['date_of_birth'] = date('Y-m-d', strtotime($_POST['date_of_birth']));
    $_SESSION['age'] = (int)(date('Y') - date('Y', $_SESSION['date_of_birth']));
    $form_page = 2;
  } else if(isset($_POST['next2'])) {
    //$_SESSION['risk'] already captured
    $form_page = 3;
  } else if(isset($_POST['next3'])) {
    //$_SESSION['reinvest'] already captured

    // done writing session, close session
    session_write_close();

    try {

      // write session variables to database
      $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $dbPassword);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

      $sql = 'UPDATE users SET '
        .'funding='.$_SESSION['funding'].', '
        .'date_of_birth=\''.addcslashes($_SESSION['date_of_birth'], "'\"\r\n\\\t\0..\37").'\', '
        .'age='.$_SESSION['age'].', '
        .'risk='.$_SESSION['risk'].', '
        .'reinvest='.$_SESSION['reinvest'].', '
        .'first_login='.$_SESSION['first_login']
        .' WHERE uid='.$_SESSION['uid'];

      $statement = $db->prepare($sql);
      $statement->execute();

    } catch(PDOException $e) {
      echo '<!DOCTYPE html><html><head><script language="javascript"> alert("Unable to connect to the database: '.$e.'") </script></head><body></body></html>';
      exit;
    }

    // create first portfolio (if completing first_login)
    if($_SESSION['first_login']) {
    session_name('Private');
    session_start();
    
    $uid = $_SESSION['uid'];
    $p_name = 'My First Portfolio';
    $p_funding = $_SESSION['funding'];
    $p_risk = $_SESSION['risk'];
    $p_reinvest = $_SESSION['reinvest'];
    $p_public = 0; // private first portfolio
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
    
    // user has completed profile setup
    $_SESSION['first_login'] = 0;
    
    //header('Location: http://'.$_SERVER['SERVER_NAME'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/') + 1));
    header('Location: index.php');
    exit;
  } else if(isset($_POST['prev2'])) {
    $form_page = 1;
    return;
  } else if(isset($_POST['prev3'])) {
    $form_page = 2;
  } else if(isset($_POST['risk_high'])) {
    $_SESSION['risk'] = (int)$RISK['high'];
    $form_page = 2;
  } else if(isset($_POST['risk_med'])) {
    $_SESSION['risk'] = (int)$RISK['med'];
    $form_page = 2;
  } else if(isset($_POST['risk_low'])) {
    $_SESSION['risk'] = (int)$RISK['low'];
    $form_page = 2;
  } else if(isset($_POST['payout'])) {
    $_SESSION['reinvest'] = 0;
    $form_page = 3;
  } else if(isset($_POST['reinvest'])) {
    $_SESSION['reinvest'] = 1;
    $form_page = 3;
  }

  // for progress bar
  $percent_complete = 100*($form_page - 1)/$NUM_PAGES;

  session_write_close();
  return;
?>

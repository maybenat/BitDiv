<?php

  include 'data/config.php';
  
  // filename of user setup page
  $USER_SETUP = 'user_setup.php';

  // session regeneration period
  $SESSION_REGENERATE = 60*30; // 30 min

  session_name('Private');
  session_start();

  // determine session regeneration
  if(!isset($_SESSION['session_started'])) {
    $_SESSION['session_started'] = time();
  // session started more than 30 minutes ago
  } else if(time() - $_SESSION['session_started'] > $SESSION_REGENERATE) {
    session_regenerate_id(true);
    $_SESSION['session_started'] = time();
  }

  // if there is no valid session, direct to login page
  if(!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {
    session_write_close();
    header('Location: http://'.$_SERVER['SERVER_NAME'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/') + 1).'page_signin.php');
    exit;
  // otherwise, if user has not completed profile and is not in process of completing profile, direct to user setup page
  } else if($_SESSION['first_login'] && substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['SCRIPT_NAME'], '/') + 1) != $USER_SETUP) {
    session_write_close();
    header('Location: http://'.$_SERVER['SERVER_NAME'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/') + 1).'user_setup.php');
    exit;
  }

  // initialization of valid session

  // determine if stock is being viewed
  if($_GET['stocks']) {
    $_SESSION['current_stock_viewing'] = $_GET['stocks'];
    // add stock to recently viewed list (shift all others)
    $temp = $_SESSION['recently_viewed_stock'][0];
    if($temp != $_GET['stocks']) {
      for($i = 0; $i < 5; $i++) {
        $temp2 = $_SESSION['recently_viewed_stock'][$i + 1];
        $_SESSION['recently_viewed_stock'][$i + 1] = $temp;
        // don't repeat stocks
        if(($temp = $temp2) == $_GET['stocks']) {
          break;
        }
      }
    }
    $_SESSION['recently_viewed_stock'][0] = $_GET['stocks'];
  } else {
    $_SESSION['current_stock_viewing'] = $_SESSION['recently_viewed_stock'][0];
  }

  // determine current portfolio id
  if(!empty($_GET['pid'])) {
    $_SESSION['active_p_id'] = $_GET['pid'];
  }
  if(empty($_SESSION['active_p_id'])) {
    reset($_SESSION['portfolios']);
    $_SESSION['active_p_id'] = key($_SESSION['portfolios']);
  }
  $_SESSION['active_p_id'] = empty($_SESSION['active_p_id']) ? 0 : $_SESSION['active_p_id'];
  
  // update session parameters to this portfolio's parameters
  if(!empty($_SESSION['active_p_id'])) {
    $_SESSION['funding'] = $_SESSION['portfolios'][$_SESSION['active_p_id']]['p_funding'];
    $_SESSION['risk'] = $_SESSION['portfolios'][$_SESSION['active_p_id']]['p_risk'];
    $_SESSION['reinvest'] = $_SESSION['portfolios'][$_SESSION['active_p_id']]['p_reinvest'];
  }
  
  // write recently viewed stocks, active portfolio to database
  $sql = 'UPDATE users SET '
    .'recent_stock1=\''.$_SESSION['recently_viewed_stock'][0].'\', '
    .'recent_stock2=\''.$_SESSION['recently_viewed_stock'][1].'\', '
    .'recent_stock3=\''.$_SESSION['recently_viewed_stock'][2].'\', '
    .'recent_stock4=\''.$_SESSION['recently_viewed_stock'][3].'\', '
    .'recent_stock5=\''.$_SESSION['recently_viewed_stock'][4].'\', '
    .'p_id_current='.$_SESSION['active_p_id']
    .' WHERE (uid='.$_SESSION['uid'].')'
    .';';

  try {
    $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $statement = $db->prepare($sql);
    $statement->execute();

  } catch(PDOException $e) {
    echo '<!DOCTYPE html><html><head><script language="javascript"> alert("Unable to connect to the database: '.$e.'") </script></head><body></body></html>';
    exit;
  }
  
  // end initialization

  session_write_close();

  $current_page_url = urlencode('http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);

?>

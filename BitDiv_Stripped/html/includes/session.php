<?php

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
  session_write_close();

?>

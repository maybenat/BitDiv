<?php

  session_name('Private');
  session_start();
  session_regenerate_id();

  // if there is no valid session
  if(!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {
    session_write_close(); 
    header('Location: http://'.$_SERVER['SERVER_NAME'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/') + 1).'page_signin.php');
    exit;
  } else if($_SESSION['first_login']) {
    // if user has not completed profile
    session_write_close(); 
    header('Location: http://'.$_SERVER['SERVER_NAME'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/') + 1).'user_setup.php');
    exit;
  }
  session_write_close();

?>

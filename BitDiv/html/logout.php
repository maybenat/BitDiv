<?php
  session_name('Private'); 
  session_start();
  session_unset();
  session_write_close();
  session_destroy();
  header('Location: ./page_signin.php');
  exit;
?>
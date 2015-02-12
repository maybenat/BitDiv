<?php
  session_name('Private'); 
  session_start();
  session_write_close();
  session_unset();
  session_destroy();
  header('Location: ./page_signin.php');
  exit;
?>

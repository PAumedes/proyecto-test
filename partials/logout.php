<?php
  if(!isset($_SESSION)){
    session_start();
  }
  if(isset($_COOKIES["userId"])){setcookie("userId","",-1);}
  session_destroy();
  header("location: index.php");
  exit;
 ?>

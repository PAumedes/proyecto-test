<?php

  session_start();

  setcookie("userId",'asd',time()-1);
  setcookie("PHPSESSID",'asd',time()-1);

  $_SESSION=array();
  session_destroy();

  var_dump($_COOKIE);exit;
  header("location: ../index.php");
  exit;
 ?>

<?php

  session_start();

  setcookie("userId",'',time()-10);

  session_destroy();

  header("location: index.php");
  exit;
 ?>

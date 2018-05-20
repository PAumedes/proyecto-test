<?php
require_once('classes/Auth.php')
  Auth::logout();
  header("location: index.php");
  exit;
 ?>

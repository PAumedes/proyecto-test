<?php
require_once('classes/Db.php');
if(!Db::existsDB() || !Db::existsTable('users')){  header('location: crearDB.php');  }
require_once('classes/Auth.php');
  Auth::logout();
  header("location: index.php");
  exit;
 ?>

<?php
$title = "crear DB";

require_once('classes/Db.php');
require_once('classes/Users.php');


$message="";

if(isset($_POST['db'])){
  Db::createDB();
  $message = "La base de datos ha sido creada";
}


if(isset($_POST['table']))
{
  if(!Db::existsDB()){
    $message = "Primero debe crear la base de datos.";
  } else{
    Db::createTable();
    $message = "Las tablas han sido creadas correctamente";
  }
}



if(isset($_POST['migrate']))
  {
    if(!Db::existsDB())
    {
      $message = "Primero debe crear la base de datos.";
    }
    elseif (!Db::existsTable('users')) 
    {
      $message = 'Primero se debe crear la tabla de usuarios.';
    }
    else
    {
      if ($error = !Users::migrateJSON())
        {
          $message="El JSON ha sido migrado exitosamente";
          header("location: index.php");
          exit;
        }
      else{$message = $error;}
    }
  }






 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2><?=$message?></h2>
    <form class="" action="" method="post">
      <button type="submit" name="db">Crear DB</button>
      <button type="submit" name="table"> Crear tablas</button>
      <button type="submit" name="migrate"> Migrar JSON a DB</button>
    </form>
  </body>
</html>

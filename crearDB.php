/*formulario al cual redirijo si no esta creada la DB*/
<?php
$title = "crear DB";

require_once('classes/Db.php');
require_once('classes/Users.php');


$message="";

if(isset($_POST['db'])){
  Db::createDB();
  $message = "DB creada";
}


if(isset($_POST['table']))
{
  if(!Db::existsDB()){
    $message = "Primero crea la db";
  } else{
    Db::createTable();
    $message = "Tablas creadas";
  }
}



if(isset($_POST['migrate']) )
{
  if(!Db::existsDB())
  {
    $message = 'Primero se debe crear la DB';
  }elseif (!Db::existsTable('users')) {
    $message = 'Primero se debe crear la tabla de usuarios';
  }else{

    if ($error = !Users::migrateJSON()){$message="JSON migrado";}
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
      <button type="submit" name="db">crear db</button>
      <button type="submit" name="table"> crear tablas</button>
      <button type="submit" name="migrate"> migrar json a db</button>
    </form>
  </body>
</html>

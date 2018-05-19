/*formulario al cual redirijo si no esta creada la DB*/
<?php

/*if(isset($_POST['db'])){
  creo la db con db::createdb,
  si l try catch de esto me devuelve error o false, genero un error en pantalla
  $error['db'] = No se pudo crear la db intente denuevo.
}*/


if(isset($_POST['db'])){
  db::createDB
} else {
  $error['db'] = "No se pudo crear la db, intente de nuevo"
}


/*if(isset($_POST['table']){
  if(!db::connect){
    $error['db'] = che antes de las tablas, crea la db
  }else{
    db::createTable
    $error['db'] = Tablas creadas!
  }

})*/


if(isset($_POST['table'])){
  if(!db:connect){
    $error['db'] = "Primero crea la db"
  } else{
    db::createTable
    $error['db'] = "Tablas creadas"
  }
}



/*if(isset($_POST['migrar']){

})*/






 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="" method="post">
      <button type="submit" name="db">crear db</button>
      <button type="submit" name="table"> crear tablas</button>
      <button type="submit" name="table"> migrar json a db</button>
    </form>
  </body>
</html>

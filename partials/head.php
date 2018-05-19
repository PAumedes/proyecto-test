<head>
  <?php
  /*Si db::connect da false, redirijo al formulario para crear la db(crearDB.php)*/
  if(!db:connect){
    header('location: crearDB.php')
  }

   ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
  <link rel="stylesheet" href="css/fontello.css">
  <link rel="stylesheet" href="css/styles.css">
  <title><?=$title?></title>
</head>

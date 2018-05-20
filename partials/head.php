  <?php
    require_once('classes/Db.php');
    require_once('classes/Auth.php');

    // Si  Si no esta creada la DB y la tabla de usuarios redirijo al formulario para crearlas */
    if(!Db::existsDB() || !Db::existsTable('users')){  header('location: crearDB.php');  }

    // inicia SESSION y si hay cookie logea al user.
    Auth::session_start();

  ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
  <link rel="stylesheet" href="css/fontello.css">
  <link rel="stylesheet" href="css/styles.css">
  <title><?=$title?></title>
</head>

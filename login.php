<?php
$title="ingresa";

require_once("classes/Auth.php");
require_once("classes/Validator.php");
require_once("classes/Users.php");
require_once("classes/User.php");

// si hay usuario logeado redirigir a index.
if( $user = Auth::loggedUser() )
{
  header("location:index.php");
  exit;
}

$oldUser="";
if ($_POST)
{
  $oldUser = $_POST['user'];
  $erroresLogin = Validator::validateLogin($_POST);
  if (!$erroresLogin)
  {
    $user = Users::getByUsernameOrEmail(trim($_POST['user']));
    Auth::login($user,isset($_POST["recordar"]));
    header("location: perfil.php");
    exit;
  }
}

//inicializo las variables de error
if(!isset($erroresLogin["user"])) {$erroresLogin["user"]="";}
if(!isset($erroresLogin["password"])) {$erroresLogin["password"]="";}


?>

<!DOCTYPE html>
<html>

  <?php require_once("partials/head.php"); ?>
  <body>
    <?php require_once("partials/navbar.php"); ?>

    <main class="form-main">
      <h1>INGRESA</h1>
      <form class="login-form" action="login.php" method="post">

        <div class="form-group">
          <div class="field-block">
            <label for="user">USUARIO O EMAIL</label>
            <input id="user" name="user" class="form-field " type="text" value=" <?=$oldUser?> ">
            <span class="error-message"><?=$erroresLogin["user"]?></span>
          </div>

          <div class="field-block">
            <label for="password">PASSWORD</label>
            <input class="form-field " name="password" type="password" >
            <span class="error-message"><?=$erroresLogin["password"]?></span>
          </div>
        </div>

          <div class="form-footer d-column">
            <button type="submit" class="submit" name="submt" data-toggle="modal" data-target="#login-modal">Ingresa</button>
            <div class="recordar">
              <input type="checkbox" class=" " name="recordar" >Recordarme |
              <a class="" href="#">Olvidaste tu contraseña?</a>
            </div>

          </div>

          <div class="form-footer">
              <span>aun no sos parte de EventR? -</span><a href="register.php">Unite!</a>
          </div>
        </form>

    </main>

    <?php require_once("partials/footer.php") ?>
    <?php require_once("partials/js.php") ?>
  </body>
</html>

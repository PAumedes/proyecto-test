<?php
$title="ingresa";

require_once("partials/functions.php");

if(isset($_SESSION["userId"])){
  header("location:index.php");
  exit;
}

$user["user"]="";
if ($_POST){
  $user["user"]=trim($_POST["user"]);
  $user["password"]=trim($_POST["password"]);
  if(isset($_POST["recordar"])){$user["recordar"]=$_POST["recordar"];}
  $erroresLogin = validarLogin($user);
  if (!$erroresLogin){
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
            <input id="user" name="user" class="form-field " type="text" value=" <?=$user['user']?> ">
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

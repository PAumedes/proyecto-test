<?php
$title="Registrate";
require_once("partials/functions.php");

if(isset($_SESSION["userId"])){
  header("location: index.php");
}

//inicializacion de variables
$options = ["dj"=>"Soy DJ!","eventr"=>"Busco Dj's para eventos!"];

$user["username"]="";
$user["email"]="";
$user["password"]="";
$user["repassword"]="";
$user["option"]="eventr";




if($_POST){
  $user["username"] = trim($_POST["username"]);
  $user["email"] = trim($_POST["email"]);
  $user["password"] = trim($_POST["password"]);
  $user["repassword"] = trim($_POST["repassword"]);
  $user["option"] = $_POST["option"];



  $erroresRegister = validarRegistro($user);
  if (!$erroresRegister){
    registrar($user);
    header("location: welcome.php");
    exit;
  }
}
//renicializo las vriables de error si no estan definidas en el array devuelto por la validacion.
// o si directamente no se hizo validacion por no haber datos en POST
if (!isset($erroresRegister["username"])){$erroresRegister["username"]="";}
if (!isset($erroresRegister["email"])){$erroresRegister["email"]="";}
if (!isset($erroresRegister["password"])){$erroresRegister["password"]="";}
if (!isset($erroresRegister["repassword"])){$erroresRegister["repassword"]="";}




?>



<!DOCTYPE html>
<html>

  <?php require_once("partials/head.php") ?>
  <body>
    <?php require_once("partials/navbar.php"); ?>
    <main class="form-main">
      <h1>Registrate</h1>
      <form class="login-form" action="register.php" method="post">

          <div class="form-group">
            <div class="field-block">
              <label for="username">Elige un nombre de usuario</label><br>
              <input class="form-field" name="username" type="text" id="username" value=<?=$user["username"]?> ><br>
              <span class="error-message"><?=$erroresRegister["username"]?></span>
            </div>

            <div class="field-block">
                <label for="email">Un email para tu cuenta</label><br>
                <input class="form-field" name="email" type="email" value=<?=$user["email"]?> ><br>
                <span class="error-message"><?=$erroresRegister["email"]?></span>
            </div>

            <div class="field-block">
              <label for="password">Password</label><br>
              <input class="form-field" name="password" type="password"><br>
              <span class="error-message"> <?=$erroresRegister["password"] ?> </span>
            </div>
            <div class="field-block">
              <label for="repassword">Confirmar password</label><br>
              <input class="form-field" name="repassword" type="password" ><br>
              <span class="error-message"><?=$erroresRegister["repassword"]?></span>
            </div>

          </div>

          <div class="form-group">
              <div class="" data-toggle="buttons">
                <?php foreach ($options as $key => $value): ?>
                  <label class="" >
                    <?php if ($key == $user["option"]): ?>
                      <input type="radio" name="option" value="<?=$key?>"  autocomplete="off" checked="" > <?=$value?>
                    <?php else: ?>
                      <input type="radio" name="option" value="<?=$key?>"  autocomplete="off" > <?=$value?>
                    <?php endif; ?>
                  </label>
                <?php endforeach; ?>
              </div>
          </div>

            <div class="form-footer d-column">
              <button type="submit"class="submit" name="submt">CREA TU CUENTA!</button>
            </div>
            <div class="form-footer">
                <span>ya tienes cuenta? -</span><a href="login.php">Ingresa</button>
            </div>
        </form>
    </main>

    <?php require_once("partials/footer.php") ?>
    <?php require_once("partials/js.php") ?>
  </body>
</html>

<?php
require_once("classes/Auth.php");
require_once("classes/Validator.php");
require_once("classes/User.php");

$title="mi perfil";

$user = Auth::loggedUser();




//si no hay sesion activa redirigir a home
if (!$user){ header("location: index.php"); }




//si hay datos de POST validar formulario e imagen.
$erroresPerfil=[];
if ($_POST || isset($_FILES["avatar"]))
{
    $erroresPerfil = Validator::validateProfile($_POST,'avatar');
    if(!$erroresPerfil)
    {
      $user->update($_POST,"avatar");
    }
}



 ?>

<!DOCTYPE html>
<html>
<?php require_once("partials/head.php"); ?>

  <body>

    <?php require_once("partials/navbar.php"); ?>

    <main class="perfil-main">

      <div class="">
            <h2>Bienvenido <?=$user->getUsername()?></h2>
      </div>

      <div class="">
        <div class="avatar">
          <?php if ($user->getAvatar()): ?>
            <img class="avatar-img" src="<?=$user->getAvatar()?>" alt="<?=$user->getUsername?>">
          <?php else: ?>
            <img class="avatar-img" src="images/avatar-unknown.jpg" alt="sinAvatar">
          <?php endif; ?>
        </div>
      </div>


      <form class="" action="perfil.php" method="post" enctype="multipart/form-data">
        <div class="form-perfil">
          <!-- Subir avatar -->
          <div class="field-block">
            <label for="avatar">Subir imagen de perfil</label>
            <input type="file" class="form-field" id="avatar" name="avatar" value="">
            <?php if (isset($erroresPerfil["avatar"])): ?>
              <span class="error-message"><?=$erroresPerfil["avatar"]?></span>
            <?php endif; ?>
          </div>

           <!-- datos personales -->

            <div class="feld-block">
              <label for="">NOMBRE</label>
              <input class="form-field" type="text" name="first_name"
              value="<?= $user->getfirst_name()?>">
              <?php if (isset($erroresPerfil["first_name"])): ?>
                <span class="error-message"><?=$erroresPerfil["first_name"]?></span>
              <?php endif; ?>
            </div>

            <div class="feld-block">
              <label for="">APELLIDO</label>
              <input class="form-field" type="text" name="last_name"
              value="<?=$user->getLast_name()?>">
              <?php if (isset($erroresPerfil["last_name"])): ?>
                <span class="error-message"><?=$erroresPerfil["last_name"]?></span>
              <?php endif; ?>
            </div>


          <!-- Domicilio -->

            <div class="field-block">
              <label for="">DIRECCION</label>
              <input class="form-field" type="text" name="address"
              value="<?= $user->getAddress() ?>">
              <?php if (isset($erroresPerfil["address"])): ?>
                <span class="error-message"><?=$erroresPerfil["address"]?></span>
              <?php endif; ?>
            </div>

            <div class="field-block">
              <label for="">CODIGO POSTAL</label>
              <input class="form-field" type="text" name="CP"
              value="<?=$user->getCP() ?>">
              <?php if (isset($erroresPerfil["CP"])): ?>
                <span class="error-message"><?=$erroresPerfil["CP"]?></span>
              <?php endif; ?>
            </div>



          <!-- cambio de contraseña -->
            <div class="feld-block">
              <label for=""> CAMBIAR PASSWORD</label>
                <input class="form-field" type="password" name="password" >
              <?php if (isset($erroresPerfil["password"])): ?>
                <span class="error-message"><?=$erroresPerfil["password"]?></span>
              <?php endif; ?>
            </div>

            <!-- repassword -->
            <div class="feld-block">
              <label for="">CONFIRMAR PASSWORD</label>
              <input class="form-field" type="password" name="repassword" >
              <?php if (isset($erroresPerfil["repassword"])): ?>
                <span class="error-message"><?=$erroresPerfil["repassword"]?></span>
              <?php endif; ?>
            </div>

        </div>



        <button class="" type="submit" name="submit">Guardar cambios</button>
      </form>
    </main>



    <?php require_once("partials/footer.php"); ?>

    <?php require_once("partials/js.php"); ?>
  </body>
</html>

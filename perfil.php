<?php
$title="mi perfil";

if(!isset($_SESSION))
   {
       session_start();
   }




require_once("partials/functions.php");

//si no hay sesion activa redirigir a home
if (!isset($_SESSION["userId"])){
  header("location: index.php");
}


require_once("partials/paises.php");



//si hay datos de POST validar formulario e imagen.
$erroresPerfil=[];
if ($_POST){

    $erroresPerfil = validarPerfil($_POST,"avatar");

    if(!$erroresPerfil){
    guardarPerfil($_POST,"avatar");
    }
}


$loggedUser=traerUsuario($_SESSION["userId"]);

 ?>

<!DOCTYPE html>
<html>
<?php require_once("partials/head.php"); ?>

  <body>

    <?php require_once("partials/navbar.php"); ?>

    <main class="perfil-main">

      <div class="">
            <h2>Bienvenido <?=$loggedUser["username"]?></h2>
      </div>

      <div class="">
        <div class="avatar">
          <?php if (isset($loggedUser["avatar"])): ?>
            <img class="avatar-img" src="<?=$loggedUser['avatar']?>" alt="<?=$loggedUser['username']?>">
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
              <input class="form-field" type="text" name="firstName" placeholder="NOMBRE"
              value="<?=isset($loggedUser['firstName']) ? $loggedUser['firstName'] : "" ?>">
              <?php if (isset($erroresPerfil["firstName"])): ?>
                <span class="error-message"><?=$erroresPerfil["firstName"]?></span>
              <?php endif; ?>
            </div>

            <div class="feld-block">
              <input class="form-field" type="text" name="lastName" placeholder="APELLIDO"
              value="<?=isset($loggedUser['lastName']) ? $loggedUser['lastName'] : "" ?>">
              <?php if (isset($erroresPerfil["lastName"])): ?>
                <span class="error-message"><?=$erroresPerfil["lastName"]?></span>
              <?php endif; ?>
            </div>


          <!-- Domicilio -->

            <div class="feld-block">
              <input class="form-field" type="text" name="direccion" placeholder="DIRECCION"
              value="<?=isset($loggedUser['direccion']) ? $loggedUser['direccion'] : "" ?>">
              <?php if (isset($erroresPerfil["direccion"])): ?>
                <span class="error-message"><?=$erroresPerfil["direccion"]?></span>
              <?php endif; ?>
            </div>

            <div class="feld-block">
              <input class="form-field" type="number" name="codigoPostal" placeholder="CODIGO POSTAL"
              value="<?=isset($loggedUser['codigoPostal']) ? $loggedUser['codigoPostal'] : "" ?>">
              <?php if (isset($erroresPerfil["codigoPostal"])): ?>
                <span class="error-message"><?=$erroresPerfil["codigoPostal"]?></span>
              <?php endif; ?>
            </div>

            <div class='feld-block'>
              <label for='pais'>País de nacimiento:</label>
              <select name="pais">
                <option value="">Elegí</option>
                <?php foreach ($paises as $pais): ?>
                  <?php if (isset($loggedUser['pais']) && $loggedUser["pais"] == $pais ):; ?>
                    <option value="<?=$pais?>" selected ><?=$pais?></option>
                  <?php else: ?>
                    <option value="<?=$pais?>"><?=$pais?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>


          <!-- cambio de contraseña -->
            <div class="feld-block">
                <input class="form-field" type="password" name="password" placeholder="CAMBIAR PASSWORD">
              <?php if (isset($erroresPerfil["password"])): ?>
                <span class="error-message"><?=$erroresPerfil["password"]?></span>
              <?php endif; ?>
            </div>

            <!-- repassword -->
            <div class="feld-block">
              <input class="form-field" type="password" name="repassword" placeholder="CONFIRMAR NUEVO PASSWORD">
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

<?php
$title="Registrate" ?>


<!DOCTYPE html>
<html>

  <?php require_once("partials/head.php") ?>
  <body>
    <?php require_once("partials/navbar.php"); ?>
    <main class="form-main">
      <h1>Registrate</h1>
      <form class="login-form" action="index.html" method="post">

          <div class="form-group">
            <div class="field-block">
              <label for="name">Nombre</label>
              <input class="form-field" type="text" id="nombre">
            </div>
            <div class="field-block">
                <label for="lastName">Apellido</label>
                <input class="form-field" type="text">
            </div>
            <div class="field-block">
                <label for="email">Email</label>
                <input class="form-field" type="email">
            </div>
            <div class="field-block">
              <label for="password">Password</label>
              <input class="form-field" type="password">
            </div>
            <div class="field-block">
              <label for="rePassword">Confirmar password</label>
              <input class="form-field" type="password" >
            </div>
          </div>
          <div class="form-group">
              <div class="" data-toggle="buttons">
                <label class="" >
                  <input type="radio" name="options" id="dj" autocomplete="off" checked=""> Soy DJ!
                </label>
                <label class="">
                  <input type="radio" name="options" id="organizador" autocomplete="off"> Busco DJ's!
                </label>
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

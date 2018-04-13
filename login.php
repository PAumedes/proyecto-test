<?php
$title="ingresa"?>


<!DOCTYPE html>
<html>

  <?php require_once("partials/head.php"); ?>
  <body>
    <?php require_once("partials/navbar.php"); ?>

    <main class="form-main">
      <h1>INGRESA</h1>
      <form class="login-form" action="index.html" method="post">

        <div class="form-group">
          <div class="field-block">
            <label for="user">USUARIO O EMAIL</label>
            <input id="user" class="form-field " type="text">
          </div>

          <div class="field-block">
            <label for="password">PASSWORD</label>
            <input class="form-field " type="password" >
          </div>
        </div>

          <div class="form-footer d-column">
            <button type="submit" class="submit" name="submt" data-toggle="modal" data-target="#login-modal">Ingresa</button>
            <div class="recordar">
              <input type="checkbox" class=" " name="recordar" value="">Recordarme |
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

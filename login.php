<?php
$title="ingresa"?>


<!DOCTYPE html>
<html>

  <?php require_once("partials/head.php") ?>
  <body>

    <main>
      <form class="" action="index.html" method="post">

        <div class="form-group">
          <input class="form-control form-control-lg" type="email" placeholder="TUMAIL@EMAIL.COM">
          <input class="form-control form-control-lg" type="password" placeholder="PASSWORD">
        </div>
          <div class="form-group d-flex flex-wrap align-content-center justify-content-center">
            <button type="submit"class="col-12 btn btn-primary btn-lg mb-3" name="submt" data-toggle="modal" data-target="#login-modal">INGRESA</button>
            <input type="checkbox" class="" name="recordar" value=""><span class="text-black">Recordarme |
              <a class="text-primary" href="#">Olvidaste tu contraseña?</a>
            </span>
          </div>

          <div class="modal-footer">
              <span>aun no sos parte de EventR? -</span><button type="button" name="register"class="btn btn-link btn-sm" data-dismiss="modal" data-toggle="modal" data-target="#register-modal">Unite!</button>
          </div>
        </form>

    </main>

    <?php require_once("partials/footer.php") ?>
    <?php require_once("partials/js.php") ?>
  </body>
</html>

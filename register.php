<?php
$title="Registrate" ?>


<!DOCTYPE html>
<html>

  <?php require_once("partials/head.php") ?>
  <body>

    <main>
      <form class="" action="index.html" method="post">

          <div class="form-group">
            <input class="form-control form-control-lg" type="text" placeholder="NOMBRE">
            <input class="form-control form-control-lg" type="text" placeholder="APELLIDO">
            <input class="form-control form-control-lg" type="email" placeholder="TUMAIL@EMAIL.COM">
            <input class="form-control form-control-lg" type="password" placeholder="UN PASSWORD PARA TU CUENTA">
          </div>
          <div class="form-group d-flex justify-content-center">
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-primary" >
                  <input type="radio" name="options" id="dj" autocomplete="off" checked=""> Soy DJ!
                </label>
                <label class="btn btn-secondary">
                  <input type="radio" name="options" id="organizador" autocomplete="off"> Busco DJ's!
                </label>
              </div>
            </div>
            <div class="form-group d-flex justify-content-center">
              <button type="submit"class="btn btn-primary btn-lg " name="submt">CREA TU CUENTA!</button>
            </div>
            <div class="modal-footer">
                <span>ya tienes cuenta?  -</span><button type="button" name="login"class="btn btn-link btn-small" data-dismiss="modal" data-toggle="modal" data-target="#login-modal">Ingresa</button>
            </div>
        </form>
    </main>

    <?php require_once("partials/footer.php") ?>
    <?php require_once("partials/js.php") ?>
  </body>
</html>

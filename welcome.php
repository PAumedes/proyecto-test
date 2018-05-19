<?php $title="Eventr";
  if (isset($_SESSION["userId"])){
    header("location: index.php");
  }

?>
<!DOCTYPE html>
<html>

  <?php require_once("partials/head.php"); ?>
  <body>
  <?php require_once("partials/navbar.php");?>
    <main>

    </main>
    <div class="welcome d-flex d-column justify-content-center align-items-center">
      <h1>BIENVENIDO</h1>
      <h2>Ya creaste tu cuente de <b>EventR</b> </h2>
      <h2>ahora  <a href="login.php">ingresa</a> </h2>
    </div>
    <?php require_once("partials/footer.php"); ?>
    <?php require_once("partials/js.php"); ?>
  </body>
</html>

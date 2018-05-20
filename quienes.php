<?php
  $title="quienes somos";
  Auth::session_start();
?>
<!DOCTYPE html>
<html>
  <?php require_once("partials/head.php"); ?>
  <body>

<!-- CONTAINER -->
    <div class="container d-flex flex-wrap justify-content-center">
      <?php require_once("partials/navbar.php"); ?>

        <!-- JUMBOTRON INFO DE LA WEB -->
        <div class="jumbotron jumbotron-fluid row col-12">
            <h1 class="display-3 col-12"><?=$navigation[$current]?></h1>
            <p class="lead col-12">En <b class="font-weight-bold">Eventr</b> creemos que para brindar un servicio de calidad, nuestro equipo debe ser parte de ese mundo. Es por eso que todos en Eventr somos músico o estamos relacionados con la música. Amamos la música. Es parte de nuestra vida.</p>

            <div class="card col-12 col-lg-4">
                <img class="card-img-top" src="images/meli.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Meli | <span class="grisado">UX</span></h5>
                    <p class="card-text">CrossFitter y UX designer. El diseño y la usabilidad son pilares fundamentales en mi vida</p>
                </div>
            </div>
              <div class="card col-12 col-lg-4">
                <img class="card-img-top" src="images/rodri.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Rodri | <span class="grisado">JS Master</span></h5>
                    <p class="card-text">Saxofonista y fanático del ReactJS. El backend es mi vida</p>
                </div>
            </div>
            <div class="card col-12 col-lg-4">
                <img class="card-img-top" src="images/pato.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Pato | <span class="grisado">The Other Guy</span></h5>
                    <p class="card-text">Músico. Cinéfilo y amante del CSS. Comencé a diseñar sitios web desde hace ya más de 20 años</p>
                </div>
            </div>
        </div>




  </div>
  <!-- /CONTAINER -->

  <?php require_once("partials/footer.php"); ?>

  <?php require_once("partials/script-imports.php"); ?>
  </body>
</html>

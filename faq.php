<?php
  require_once("partials/navigation.php");
  $title="Preguntas frecuentes";
  $faq = [
    '¿Qué es Eventr?' => 'Eventr es una plataforma que permite tanto a DJ\'s como a organizadores de eventos encontrarse para generar shows increíbles.',
    'Soy DJ ¿Qué me brinda la plataforma?' => 'Los DJ tendrán la posibilidad de crearse un perfil con todos sus datos, incluyendo las redes sociales con sus sets, fotos y experiencias. Así mismo tendrán un calendario donde podrán poner su disponibilidad para tocar.',
    '¿Y si soy organizador?' => 'Los organizadores de eventos, nuestros principales clientes, tendrán la posibilidad de buscar DJ\'s por nombre, género o disponibilidad de fecha.',
    '¿Cuáles son los medios de pago?' => 'Trabajamos con VISA, MasterCard y MercagoPago',
    '¿Puedo contratar a más de un DJ por evento?' => '¡Claro! Puedes contratar todos los que necesites, solo búscalos y agregalos a tu fecha ya creada.',
    'Soy DJ y necesito cancelar la fecha, ¿puedo hacerlo? ¿Se me penaliza?' => 'Puedes hacerlo, en Eventr creemos en nuestros usuarios y no imponemos penalizaciones a nuestros clientes por las eventualidades que puedan tener. De todas maneras, siempre es conveniente avisar con la mayor antelación posible así el orgnaizador puede buscar otro DJ para su evento.',
    'Soy organizador y necesito cancelar mi evento, ¿puedo? ¿Seré penalizado?' => 'Puedes hacerlo, en Eventr creemos en nuestros usuarios y no imponemos penalizaciones a nuestros clientes por las eventualidades que puedan tener. De todas maneras, siempre es conveniente avisar con la mayor antelación posible así los DJ pueden estar disponibles para otro evento.',
    'Si tengo algún problema, ¿dónde me puedo comunicar?' => 'Puedes contactarnos durante las 24hs a nuestro eMail, redes sociales o teléfonos',
  ];
  $index = 0;
?>
<!DOCTYPE html>
<html>
  <?php require_once("partials/head.php"); ?>
  <body>

<!-- CONTAINER -->
    <div class="container d-flex flex-wrap justify-content-center">
      <?php require_once("partials/navbar.php"); ?>

<!-- Con el ForEach se recorre el array $FAQ multidimencional que contiene como Key las preguntas y como Value las respuesta. Se incluye la variable Index (inicializada al comienzo del archivo) para usar de contador en las clases e IDs de cada card para el funcionamiento correcto del collaps -->
<div id="accordion" class="col-xl-6 mb-5">
    <?php foreach ($faq as $pregunta => $respuesta) : ?>
    <?php $index++ ?>
      <div class="card">
        <div class="card-header d-flex flex-wrap" id="heading<?=$index?>">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed faq-btn" data-toggle="collapse" data-target="#collapse<?=$index?>" aria-expanded="false" aria-controls="collapse<?=$index?>">
              <?=$pregunta?>
            </button>
          </h5>
        </div>
        <div id="collapse<?=$index?>" class="collapse" aria-labelledby="heading<?=$index?>" data-parent="#accordion">
          <div class="card-body">
            <?=$respuesta?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>


    <div class="opciones col-12 d-flex justify-content-around mb-5 ">
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#register-modal">Registrate</button>
      <button type="button" class="btn btn-secondary btn-lg">Conocé más</button>
    </div>
  </div>

  </div>
  <!-- /CONTAINER -->

  <?php require_once("partials/footer.php"); ?>

  <?php require_once("partials/js.php"); ?>
  </body>
</html>

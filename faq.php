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
    <main class="">
      <?php require_once("partials/navbar.php"); ?>

<!-- Con el ForEach se recorre el array $FAQ multidimencional que contiene como Key las preguntas y como Value las respuesta. Se incluye la variable Index (inicializada al comienzo del archivo) para usar de contador en las clases e IDs de cada card para el funcionamiento correcto del collaps -->
    <div  class="faq">
        <?php foreach ($faq as $pregunta => $respuesta) : ?>
            <span> <b><?=$pregunta?></b> </span> <br>
            <p><?=$respuesta?></p> <br><br>
        <?php endforeach; ?>
    </div>

  </main>
  <!-- /CONTAINER -->

  <?php require_once("partials/footer.php"); ?>

  <?php require_once("partials/js.php"); ?>
  </body>
</html>

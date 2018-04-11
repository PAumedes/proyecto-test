<?php
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
        <div class="card-header d-flex flex<main>
  <section id="banner">
    <img src="images/fiesta.jpg">
    <div class="contenedor">
      <h2>Eventr</h2>
      <p>Es una plataforma que permite tanto a DJ's como a organizadores de eventos encontrarse para generar shows increíbles. Los DJ tendrán la posibilidad de crearse un perfil con todos sus datos, incluyendo las redes sociales con sus sets, fotos y experiencias. Así mismo tendrán un calendario donde podrán poner su disponibilidad para tocar. Los organizadores de eventos, nuestros principales clientes, tendrán la posibilidad de buscar DJ's por nombre, género o disponibilidad de fecha.</p>
      <a href="#">Registrate</a>
      <a href="#">Conocé más</a>
    </div>
  </section>



<!-- ARTISTAS -->


<section class="artistas">
  <h2>Buscar artistas</h2>
</section>

<section id="artistas">
  <div class="contenedor">
    <article>
      <img src="images/nick-curly.jpg">
      <h4>Nick Curly</h4>
      <p>Desde su memorable estrellato en el 2008, Nick Curly se ha establecido así mismo como uno de los actos internacionales con más presencia de la era moderna de la música house.</p>
    </article>

    <article>
      <img src="images/john-digweed.jpg">
      <h4>John Digweed</h4>
      <p>Es un disc jockey y productor musical. Comenzó a hacer mezclas alrededor de los 13 años de edad. Su primer trabajo formal como DJ fue en el club Renaissance en Londres después de que Alexander Coe, alias Sasha, escuchara su demo y lo aprobara.</p>
    </article>

    <article>
      <img src="images/hot-since.jpg">
      <h4>Hot Since '82</h4>
      <p>El dj y productor británico Daley Padley aka Hot Since 82 despegó artísticamente en el 2011, manufacturando música house de primer nivel ya sea en Ibiza, lugar donde fue descubierto, o en los mejores festivales electrónicos del mundo como Creamfields o WMC.</p>
    </article>

  </div>
</section>

<!-- EVENTOS -->

<section class="eventos">
  <h2>Buscar eventos</h2>
</section>

<section id="eventos">
  <div class="contenedor">
    <article>
      <img src="images/daytimeparty.jpg">
      <h4>Daytime Party</h4>
    </article>

    <article>
      <img src="images/festival.jpg">
      <h4>Festival</h4>
      </article>

    <article>
      <img src="images/nightclub.jpg">
      <h4>Night Club</h4>
      </article>

      <article>
        <img src="images/privateparty.jpg">
        <h4>Private Party</h4>
        </article>

        <article>
          <img src="images/wedding.jpg">
          <h4>Wedding</h4>
          </article>

  </div>
</section>

</main>
-wrap" id="heading<?=$index?>">
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

  <?php require_once("partials/script-imports.php"); ?>
  </body>
</html>

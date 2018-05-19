<?php
require_once("partials/functions.php");
require_once('classes/Db.php');
if (!Db::existsDB()){header('location: crearDB.php');}
$title = "Eventr";
 ?>

 <!DOCTYPE html>
 <html>
    <?php require_once("partials/head.php") ?>

   <body>
     <?php require_once("partials/navbar.php") ?>

     <main>

       <section id="banner" class="banner">
           <h2>Eventr</h2>
           <p>Es una plataforma que permite tanto a DJ's como a organizadores de eventos encontrarse para generar shows increíbles. Los DJ tendrán la posibilidad de crearse un perfil con todos sus datos, incluyendo las redes sociales con sus sets, fotos y experiencias. Así mismo tendrán un calendario donde podrán poner su disponibilidad para tocar. Los organizadores de eventos, nuestros principales clientes, tendrán la posibilidad de buscar DJ's por nombre, género o disponibilidad de fecha.</p>
           <?php if(!logged()):?><a href="register.php" class="banner-button resaltado">Registrate</a><?php endif?>
           <a href="#" class="banner-button">Conocé más</a>
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


     <?php require_once("partials/footer.php"); ?>
     <?php require_once("partials/js.php"); ?>
   </body>
 </html>

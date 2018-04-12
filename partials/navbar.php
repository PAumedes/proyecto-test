<?php
  require_once("navigation.php");
  require_once("functions.php");

  if(logged()){
    $user=traerUsuario($_SESSION["userId"]);
  }
?>

<header class="navbar">
  <div class="contenedor">
    <?php if (logged() && isset($user["avatar"])): ?>
          <img class="logo avatarLogo" src="<?=$user["avatar"]?>">
    <?php else: ?>
          <img class="logo" src="images/eventrlogo.png">
    <?php endif; ?>

    <label for="menu-bar">
      <input type="checkbox" id="menu-bar">
    </label>
    <label class="icon-menu" for="menu-bar"></label>
    <nav class="menu">
      <ul>
        <?php foreach ($navigation as $key => $value): ?>
            <li><a class="navlink" href="<?=key?>"><?=$value?></a></li>
        <?php endforeach; ?>

        <?php if (logged()): ?>
          <?php foreach ($loggedNavigation as $key => $value): ?>
              <li><a class="navlink" href="<?=key?>"><?=$value?></a></li>
          <?php endforeach; ?>

        <?php else: ?>
          <?php foreach ($unloggedNavigation as $key => $value): ?>
              <li><a class="navlink" href="<?=key?>"><?=$value?></a></li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
</header>

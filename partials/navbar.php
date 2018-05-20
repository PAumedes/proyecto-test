<?php
  require_once("navigation.php");
  require_once('classes/Auth.php');
  // require_once("functions.php");
$user = Auth::loggedUser();
?>

<header class="navbar">
  <div class="contenedor">

    <a href="index.php">
      <?php if ($user && $user->getAvatar()): ?>
            <img class="logo avatarLogo" src="<?=$user->getAvatar()?>">
      <?php else: ?>
            <img class="logo" src="images/eventrlogo.png">
      <?php endif; ?>
    </a>

    <label for="menu-bar"></label>
    <input type="checkbox" id="menu-bar">

    <label class="icon-menu" for="menu-bar"></label>
    <nav class="menu">
      <ul>
        <?php foreach ($navigation as $key => $value): ?>
            <li><a class="navlink" href="<?=$key?>"><?=$value?></a></li>
        <?php endforeach; ?>

        <?php if ($user): ?>
          <?php foreach ($loggedNavigation as $key => $value): ?>
              <li><a class="navlink" href="<?=$key?>"><?=$value?></a></li>
          <?php endforeach; ?>

        <?php else: ?>
          <?php foreach ($unloggedNavigation as $key => $value): ?>
              <li><a class="navlink" href="<?=$key?>"><?=$value?></a></li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
</header>

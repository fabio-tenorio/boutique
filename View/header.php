<?
session_start();

?>

<nav>
  <div id="leftlinks">
    <a href="#">nos prestations</a>
    <a href="#">nos produits</a>
    <a href="#">prendre un RDV</a>
  </div>
  <a href="<?php echo ACCUEIL;?>" id="logo">
    <h1>sonia</h1>
    <h2>boutique en ligne</h2>
  </a>
  <?php
  if (isset($_SESSION['user']))
  {?>
    <div id="rightlinks">
      <a href="<?php echo BLOG;?>">blog</a>
      <a href="#" class="link">
        <span class="fa fa-user fa-lg"></span>
        <span><?php echo $_SESSION['user']->login; ?></span>
        <ul class="dropdown_link">
          <li><a href="#">mon profil</a></li>
          <li><a href="#">me deconnecter</a></li>
        </ul>
      </a>
      <a href="#"><span class="fa fa-shopping-bag fa-lg">panier</span></a>
    </div>
  <?php } else
  { ?>
    <div id="rightlinks">
      <a href="<?php echo BLOG;?>">blog</a>
      <a href="<?php echo CONNEXION;?>">connexion</a>
      <a href="<?php echo INSCRIPTION;?>">inscription</a>
    </div>
  <?php } ?>
</nav>
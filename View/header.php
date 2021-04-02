<nav>
  <?php
  if (isset($_SESSION['user']))
  {?>
    <div id="leftlinks">
      <a href="#">prestations</a>
      <a href="http://<?php echo PATH; ?>/ControllerProduits/index">produits</a>
      <a href="http://<?php echo PATH;?>/ControllerAgenda/index">prendre RDV</a>
    </div>
    <a href="http://<?php echo PATH;?>/ControllerUser/index" id="logo">
      <h1>mondrian</h1>
      <h2>votre sallon en ligne</h2>
    </a>
    <div id="rightlinks">
    <!-- <a href="http://<?= PATH;?>/ControllerBlog/blog">blog</a> -->
    <div class="dropdown">
      <button class="dropbtn">
        <span class="fa fa-user fa-lg user-icon"></span>
        <span class="mx-3 user-icon"><?php echo 'Salut '.$_SESSION['user']->login.'!'; ?></span>
      </button>
      <div class="dropdown-content">
          <a href="http://<?php echo PATH; ?>/ControllerUser/profil"><i class="bi bi-person-lines-fill header-icon"></i>mon profil</a>
          <?php if ($_SESSION['user']->id_droit==200) {?>
          <a href="http://<?php echo PATH; ?>/ControllerUser/admin"><i class="bi bi-card-checklist"></i>tableau de bord</a>
          <?php } ?>
          <a href="http://<?php echo PATH; ?>/ControllerUser/disconnect"><i class="bi bi-door-open"></i>me deconnecter</a>
        </div>
      </div>
      <a href="#"><span class="header-icon bi bi-bag-check fa-lg m-2"></span>panier</a>
    </div>
  <?php } else
  { ?>
    <div id="leftlinks">
      <a href="#">prestations</a>
      <a href="http://<?php echo PATH; ?>/ControllerProduits/index">produits</a>
      <a href="http://<?php echo PATH;?>/ControllerUser/connexion">prendre RDV</br>(reservé aux membres)</a>
    </div>
    <a href="http://<?php echo PATH;?>/ControllerUser/index" id="logo">
      <h1>mondrian</h1>
      <h2>votre sallon en ligne</h2>
    </a>
    <div id="rightlinks">
      <!-- <a href="http://<?php echo PATH;?>/ControllerBlog/blog">blog</a> -->
      <a href="http://<?php echo PATH;?>/ControllerUser/connexion">connexion</a>
      <a href="http://<?php echo PATH;?>/ControllerUser/inscription">inscription</a>
    </div>
  <?php } ?>
</nav>
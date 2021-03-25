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
    <a href="http://<?php echo PATH;?>/ControllerBlog/blog">blog</a>
      <a href="#" class="link">
        <span class="fa fa-user fa-lg"></span>
        <span><?php echo $_SESSION['user']->login; ?></span>
        <ul class="dropdown_link">
          <li><a href="http://<?php echo PATH; ?>/ControllerUser/profil">mon profil</a></li>
          <li><a href="http://<?php echo PATH; ?>/ControllerUser/disconnect">me deconnecter</a></li>
        </ul>
      </a>
      <a href="#"><span class="fa fa-shopping-bag fa-lg">panier</span></a>
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
      <a href="http://<?php echo PATH;?>/ControllerBlog/blog">blog</a>
      <a href="http://<?php echo PATH;?>/ControllerUser/connexion">connexion</a>
      <a href="http://<?php echo PATH;?>/ControllerUser/inscription">inscription</a>
    </div>
  <?php } ?>
</nav>
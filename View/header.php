<nav class="nav-superieur navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="http://<?php echo PATH;?>/ControllerUser/index" id="logo">
      <h1 class="text-center mr-3">mondrian</h1>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link mx-3" href="http://<?php echo PATH;?>/ControllerUser/index">Accueil<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link mx-3" href="#">Prestations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link mx-3" href="http://<?php echo PATH; ?>/ControllerProduits/index">produits</a>
      </li>
      <?php if (isset($_SESSION['user'])) { ?>
      <li class="nav-item">
        <a class="nav-link mx-3" href="http://<?php echo PATH;?>/ControllerAgenda/index">prendre RDV</a>
      </li>
      <?php } else {?>
      <li class="nav-item">
        <a class="nav-link mx-3" href="http://<?php echo PATH;?>/ControllerUser/connexion">prendre RDV</a>
      </li>
      <?php } ?>
    </ul>
  </div>
  <address class="mx-3">
    <a href="mailto:mondrian@boutique.fr"><i class="mx-1 bi bi-envelope"></i>mondrian@boutique.fr</a><br>
    <a href="tel:0606060606"><i class="mx-1 bi bi-phone-vibrate"></i> 06 61 62 16 17</a>
  </address>
  <div>
    <i class="mx-1 bi bi-whatsapp"></i>
    <i class="mx-1 bi bi-facebook"></i>
    <i class="mx-1 bi bi-instagram"></i>
    <i class="mx-1 bi bi-youtube"></i>
  </div>
</nav>
<nav class="nav-inferieur nav-superieur navbar navbar-expand-lg navbar-light bg-light">
  <ul>
    <?php if (isset($_SESSION['user'])) { ?>
    <li class="membres-nav nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="bi bi-person"></i>  
      <?php echo $_SESSION['user']->login; ?>
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="http://<?php echo PATH;?>/ControllerUser/profil">Profil</a>
        <?php if ($_SESSION['user']->id_droit == 200) { ?>
        <a class="dropdown-item" href="http://<?php echo PATH;?>/ControllerAdmin/index">Tableau de bord</a>
        <?php } ?>
        <a class="dropdown-item" href="http://<?php echo PATH;?>/ControllerUser/disconnect">Se deconnecter</a>
      </div>
    </li>
    <?php } else { ?>
    <li class="membres-nav nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="bi bi-person"></i>  
      Membres
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="http://<?php echo PATH;?>/ControllerUser/connexion">connexion</a>
        <a class="dropdown-item" href="http://<?php echo PATH;?>/ControllerUser/inscription">inscription</a>
      </div>
    </li>
    <?php } ?>
  </ul>
  <form class="form-inline my-1 my-sm-0">
      <input class="search-nav-bar form-control mr-sm-2" type="search" placeholder="rechercher" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
  </form>
  <ul>
    <li class="nav-item">
      <a class="nav-link" href="#"><i class="mx-2 bi bi-cart3"></i>panier</a>
    </li>
  </ul>
</nav>
<nav class="nav-superieur navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="http://<?php echo PATH;?>/ControllerUser/index" id="logo">
      <h1 class="text-center mr-3 header">S.nails</h1>
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
        <a class="nav-link mx-3" href="http://<?php echo PATH; ?>/ControllerProduits/prestations">Prestations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link mx-3" href="http://<?php echo PATH; ?>/ControllerProduits/produits">Produits</a>
      </li>
      <li class="nav-item">
        <a class="nav-link mx-3" href="http://<?php echo PATH;?>/ControllerAgenda/index">Agenda RDV</a>
      </li>
    </ul>
  </div>
  <address class="mx-3">
    <a href="mailto:mondrian@boutique.fr"><i class="mx-1 bi bi-envelope"></i>s.nails@boutique.fr</a><br>
    <a href="tel:0606060606"><i class="mx-1 bi bi-phone-vibrate"></i> 0000000000</a>
  </address>
  <div>
    <a href='https://www.instagram.com/?hl=fr'><img id="instagram" src="<?php echo IMAGES; ?>instagram.png"></a>
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
        <a class="dropdown-item" href="http://<?php echo PATH;?>/ControllerUser/profil"><i class="bi bi-person-badge mr-2"></i>Profil</a>
        <?php if ($_SESSION['user']->id_droit == 200) { ?>
        <a class="dropdown-item" href="http://<?php echo PATH;?>/ControllerAdmin/index"><i class="bi bi-speedometer2 mr-2"></i>Tableau de bord</a>
        <?php } ?>
        <a class="dropdown-item" href="http://<?php echo PATH;?>/ControllerUser/disconnect"><i class="bi bi-box-arrow-left mr-2"></i>Se déconnecter</a>
      </div>
    </li>
    <?php } else { ?>
    <li class="membres-nav nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="bi bi-person"></i>  
      Membres
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="http://<?php echo PATH;?>/ControllerUser/connexion"><i class="bi bi-door-open mr-2"></i>Connexion</a>
        <a class="dropdown-item" href="http://<?php echo PATH;?>/ControllerUser/inscription"><i class="bi bi-box-arrow-in-right mr-2"></i>Inscription</a>
      </div>
    </li>
    <?php } ?>
  </ul>
  <div id="searchBar">
    <form id="formSearch" class="form-inline my-1 my-sm-0" action="http://<?php echo PATH;?>/ControllerProduits/searchButton" method="POST">
      <input id="fieldSearch" class ="search-nav-bar form-control mr-sm-2" type="search" name="regex" placeholder = "ex: sèche-cheveux" aria - label = "Search">
    </form>
    <button id="buttonSearch" class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
  </div>
  <ul class="panier-header">
    <li class="nav-item">
      <a class="nav-link" href="http://<?php echo PATH;?>/ControllerProduits/panier">
      <?php if (isset($_SESSION['nombreDeProduits']) && $_SESSION['nombreDeProduits'] > 0) {
        echo '<span>'.$_SESSION['nombreDeProduits'].'</span>';
      } ?>
      <i class="mx-2 bi bi-cart3"></i>Panier</a>
    </li>
    <li class="nav-item">
      <?php if (isset($_SESSION['panier']) and isset($_SESSION['nombreDeProduits']) and $_SESSION['nombreDeProduits'] > 0) { ?>
              <a class="nav-link btn btn-warning btn-sm" href="http://<?=PATH;?>/ControllerProduits/viderPanier/">Vider</a>
      <?php } ?>
    </li>
  </ul>
</nav>
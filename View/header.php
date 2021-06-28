
<nav class="nav-superieur navbar navbar-expand-lg navbar-light">
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
        <a class="nav-link mx-3" href="https://calendly.com/olivier-puche/60min">Agenda RDV</a>
        <!-- <a class="nav-link mx-3" href="http://<?php echo PATH;?>/ControllerAgenda/index">Agenda RDV</a> -->
      </li>
    </ul>
    <div id="searchBar" class="d-flex">
      <form id="formSearch" class="form-inline my-1 my-sm-0" action="http://<?php echo PATH;?>/ControllerProduits/searchButton" method="POST">
        <input id="fieldSearch" class ="search-nav-bar form-control mr-sm-0" type="search" name="regex" placeholder = "rechercher" aria-label = "Search">
      </form>
      <button id="buttonSearch" class="btn btn-outline-primary my-1 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
    </div>
  </div>
  <nav class="nav-inferieur nav-superieur navbar navbar-expand-lg navbar-light">
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
    <ul class="panier-header">
      <li class="nav-item">
        <a class="nav-link" href="http://<?php echo PATH;?>/ControllerProduits/panier">
        <?php if (isset($_SESSION['nombreDeProduits']) && $_SESSION['nombreDeProduits'] > 0) {
          echo '<span>'.$_SESSION['nombreDeProduits'].'</span>';
        } ?>
        <svg id="Capa_1" enable-background="new 0 0 512 512" height="42" viewBox="0 0 512 512" width="42" xmlns="http://www.w3.org/2000/svg"><g><path d="m258.496 498.739 21.952-199.295c.665-6.064 5.787-10.656 11.887-10.656h79.829l-12.498-115.062c-1.053-9.605-9.166-16.877-18.828-16.877h-272.233c-9.662 0-17.776 7.273-18.828 16.877l-34.769 317.27c-1.229 11.21 7.55 21.004 18.828 21.004h236.547c-7.12 0-12.663-6.183-11.887-13.261z" fill="#7fb3fa"/><path d="m87.499 490.996 34.769-317.269c1.053-9.605 9.166-16.877 18.828-16.877h-72.491c-9.662 0-17.775 7.273-18.828 16.877l-34.769 317.269c-1.229 11.21 7.55 21.004 18.828 21.004h72.491c-11.277 0-20.057-9.794-18.828-21.004z" fill="#64a6f4"/><g><path d="m302.943 205.779c-4.204 0-7.612-3.408-7.612-7.612v-92.334c0-49.963-40.647-90.61-90.61-90.61s-90.61 40.647-90.61 90.61v92.334c0 4.204-3.408 7.612-7.612 7.612s-7.612-3.408-7.612-7.612v-92.334c.001-58.357 47.478-105.833 105.834-105.833s105.833 47.476 105.833 105.833v92.334c.001 4.205-3.407 7.612-7.611 7.612z" fill="#b5dcff"/></g><g><path d="m106.5 241.139c-13.657 0-24.769-11.111-24.769-24.768s11.111-24.768 24.769-24.768 24.768 11.111 24.768 24.768-11.111 24.768-24.768 24.768zm0-34.313c-5.263 0-9.545 4.282-9.545 9.545s4.282 9.545 9.545 9.545 9.545-4.282 9.545-9.545-4.282-9.545-9.545-9.545z" fill="#dbedff"/></g><g><path d="m302.943 241.139c-13.657 0-24.768-11.111-24.768-24.768s11.111-24.768 24.768-24.768 24.768 11.111 24.768 24.768-11.111 24.768-24.768 24.768zm0-34.313c-5.263 0-9.545 4.282-9.545 9.545s4.282 9.545 9.545 9.545 9.545-4.282 9.545-9.545-4.282-9.545-9.545-9.545z" fill="#dbedff"/></g><path d="m497.035 498.739-21.952-200.31c-.665-6.064-5.787-10.656-11.887-10.656h-171.876c-6.1 0-11.223 4.592-11.887 10.656l-21.952 200.31c-.776 7.078 4.767 13.261 11.887 13.261h215.779c7.121 0 12.663-6.183 11.888-13.261z" fill="#ff94d5"/><path d="m329.972 498.739 21.952-200.31c.665-6.064 5.787-10.656 11.887-10.656h-72.491c-6.1 0-11.223 4.592-11.887 10.656l-21.952 200.31c-.776 7.078 4.767 13.261 11.887 13.261h72.491c-7.12 0-12.663-6.183-11.887-13.261z" fill="#ff72c7"/><g><path d="m377.258 456.611c-34.977 0-63.433-28.456-63.433-63.433v-45.152c0-4.204 3.408-7.612 7.612-7.612s7.612 3.408 7.612 7.612v45.152c0 26.583 21.627 48.21 48.21 48.21s48.21-21.627 48.21-48.21v-45.152c0-4.204 3.408-7.612 7.612-7.612s7.612 3.408 7.612 7.612v45.152c-.002 34.977-28.458 63.433-63.435 63.433z" fill="#b5dcff"/></g><g><path d="m433.08 354.592c-13.147 0-23.842-10.695-23.842-23.842 0-13.146 10.695-23.841 23.842-23.841 13.146 0 23.841 10.695 23.841 23.841 0 13.147-10.695 23.842-23.841 23.842zm0-32.46c-4.752 0-8.618 3.866-8.618 8.618s3.866 8.618 8.618 8.618 8.618-3.866 8.618-8.618-3.866-8.618-8.618-8.618z" fill="#dbedff"/></g><g><path d="m321.436 354.592c-13.146 0-23.842-10.695-23.842-23.842 0-13.146 10.696-23.841 23.842-23.841s23.841 10.695 23.841 23.841c0 13.147-10.695 23.842-23.841 23.842zm0-32.46c-4.752 0-8.618 3.866-8.618 8.618s3.866 8.618 8.618 8.618 8.618-3.866 8.618-8.618-3.866-8.618-8.618-8.618z" fill="#dbedff"/></g></g></svg>
        </a>
      </li>
      <li class="nav-item">
        <?php if (isset($_SESSION['panier']) and isset($_SESSION['nombreDeProduits']) and $_SESSION['nombreDeProduits'] > 0) { ?>
                <a class="nav-link" href="http://<?=PATH;?>/ControllerProduits/viderPanier/">Vider</a>
        <?php } ?>
      </li>
    </ul>
  </nav>
  <address class="mx-3">
    <a href="mailto:mondrian@boutique.fr"><i class="mx-1 bi bi-envelope"></i>s.nails@boutique.fr</a><br>
    <a href="tel:+33770034672"><i class="mx-1 bi bi-phone-vibrate"></i> +33 7 70 03 46 72</a>
  </address>
  <div>
    <a href='https://www.instagram.com/s.nails_salonrouge/'><img id="instagram" src="<?php echo IMAGES; ?>instagram.png"></a>
  </div>
</nav>

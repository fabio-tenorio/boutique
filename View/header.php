<?
session_start();
?>

<nav class="navbar navbar-expand-lg">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">prendre rdv</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">nos prestations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">nos produits</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i id="usericon" class="fa fa-user-circle fa-lg" aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Connexion</a>
          <a class="dropdown-item" href="#">Inscription</a>
          <div class="dropdown-divider"></div>
          <!-- <a class="dropdown-item" href="#">Nous Produits</a> --> -->
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Prendre RDV</a>
      </li> -->
    </ul>
    <!-- <a id="logo" class="navbar-brand" href="#">
        <h1>sonia</h1>
        <h2>boutique en ligne</h2>
    </a> -->
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
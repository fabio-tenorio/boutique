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
  <div id="rightlinks">
    <!-- <form action="#" method="POST" class="form-inline" id="formconnexion">
      <div>
        <label for="login"></label>
        <input id="login" name="login" type="text" placeholder="votre pseudo" class="form-group mx-sm-1 mb-1">
      </div>
      <div>
        <label for="motpasse"></label>
        <input id="motpasse" type="password" placeholder="votre mot de passe" class="form-group mx-sm-1 mb-1">
      </div>
      <button type="submit" class="btn btn-primary">connexion</button>
    </form> -->
    <a href="#">blog</a>
    <a href="<?php echo CONNEXION;?>">connexion</a>
    <a href="<?php echo INSCRIPTION;?>">inscription</a>
  </div>
</nav>
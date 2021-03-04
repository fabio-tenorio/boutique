<?php
Namespace App\View;
Use App\Application\Controller;
Use App\Application\Controllers\ControllerAccueil as ControllerAccueil;

?>
<!-- <main id="main_connexion"> -->
<div id="main_connexion">
<div id="img-connexion">
</div>
<form action="<?php echo CONNEXION; ?>" method="POST">
  <h1>connexion</h1>
  <div class="form">
    <div class="form-group row">
      <label for="login">Login</label>
      <input type="text" name="login" id="login" class="form-control" placeholder="votre pseudo ou votre e-mail">
    </div>
    <div class="form-group row">
      <label for="motpasse">Mot de passe</label>
      <input type="motpasse" class="form-control" name="motpasse" id="motpasse" placeholder="votre mot de passe">
    </div>
  </div>
    <div class="form-group row">
        <button type="submit" class="btn btn-primary">Me connecter</button>
    </div>
</form>
</div>
<!-- </main> -->
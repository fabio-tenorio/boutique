<?php
Namespace App\View;
Use App\Application\Controller;
Use App\Application\Controllers\ControllerAccueil as ControllerAccueil;

?>
<!-- <main id="main_connexion"> -->
<div id="main_connexion">
<div id="img-connexion">
</div>
<form action="<?php echo CONNEXION; ?>" method="GET">
  <h1>connexion</h1>
  <div class="form">
    <div class="form-group row">
      <label for="mail">Email</label>
      <input type="email" name="mail" id="mail" class="form-control" placeholder="example@email.com">
    </div>
    <div class="form-group row">
      <label for="motpasse">Mot de passe</label>
      <input type="motpasse" class="form-control" id="motpasse" placeholder="votre mot de passe">
    </div>
  </div>
    <div class="form-group row">
        <button type="submit" class="btn btn-primary">Me connecter</button>
    </div>
</form>
</div>
<!-- </main> -->
<?php
Namespace App\View;
Use App\Application\Controller;
Use App\Application\Controllers\ControllerAccueil as ControllerAccueil;

?>
<!-- <main id="main_connexion"> -->
<div id="main_connexion">
<div id="img-connexion">
</div>
<form id="formulaire_connexion" action="<?php echo CONNEXION; ?>" method="GET">
  <h1>connexion</h1>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" class="form-control" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="motpasse">Password</label>
      <input type="motpasse" class="form-control" id="motpasse" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="adresse">Address</label>
    <input type="text" class="form-control" name="adresse" id="adresse" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
</div>
<!-- </main> -->
<?php

?>

<form id="form_inscription" action="<?php echo INSCRIPTION; ?>" method="POST">
  <div class="container">
    <h1>inscription</h1>
    <!-- <p>Please fill in this form to create an account.</p> -->
    <hr>
    <div>
        <label for="login"><b>login</b></label>
        <input type="text" placeholder="votre login" name="login" id="login" required>
    </div>
    <div>
        <label for="motpasse"><b>Mot de passe</b></label>
        <input type="password" placeholder="votre mot de passe" name="motpasse" id="motpasse" required>
    </div>
    <div>
        <label for="confirmer_motpasse"><b>Mot de passe</b></label>
        <input type="password" placeholder="confirmez votre mot de passe" name="confirmer_motpasse" id="confirmer_motpasse" required>
    </div>
    <div>
        <label for="prenom"><b>Prénom</b></label>
        <input type="text" placeholder="votre prénom" name="prenom" id="prenom" required>
    </div>
    <div>
        <label for="Nom"><b>Nom</b></label>
        <input type="text" placeholder="votre nom" name="nom" id="nom" required>
    </div>
    <div>
        <label for="email"><b>e-mail</b></label>
        <input type="text" placeholder="votre courrier électronique" name="email" id="email" required>
    </div>
    <div>
        <label for="telephone"><b>téléphone</b></label>
        <input type="tel" placeholder="votre numéro de téléphone" name="telephone" id="telephone" required>    
    </div>
    <div>
        <label for="dateanniversaire"><b>date de naissance</b></label>
        <input type="date" placeholder="votre date de naissance" name="dateanniversaire" id="telephone">    
    </div>
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="btn btn-primary">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>
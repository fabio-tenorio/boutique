<br> <?php echo "<font color=\"red\">".$this->message."</font>";?>

<div id="main_inscription">
    <div id="img-inscription"></div>   
    <form id="form_inscription" action="http://<?php echo PATH; ?>/ControllerUser/inscription" method="POST">
        <h1>Inscription</h1>
        <div id='champsinscription'class="form">
            <div class="form-group row d-flex justify-content-between">
                <label for="prenom">Prénom</label>
                <input type="text" placeholder="votre prénom" name="prenom" id="prenom">
            </div>
            <div class="form-group row d-flex justify-content-between">       
                    <label for="nom">Nom</label>
                    <input type="text" placeholder="votre nom" name="nom" id="nom">
            </div>
            <div class="form-group row d-flex justify-content-between">
                <label for="motpasse">Mot de passe</label>
                <input type="password" placeholder="votre mot de passe" name="motpasse" id="motpasse">
            </div>
            <div class="form-group row d-flex justify-content-between">
                <label for="confirmer_motpasse">Confirmation</label>
                <input type="password" placeholder="confirmez mot de passe" name="confirmer_motpasse" id="confirmer_motpasse">
            </div>
            <div class="form-group row d-flex justify-content-between">
                <label for="mail">E-mail</label>
                <input type="text" placeholder="example@email.com" name="mail" id="mail">
            </div>
            <div class="form-group row d-flex justify-content-between">
                <label for="login">Login</label>
                <input type="text" placeholder="votre login" name="login" id="login">
            </div>
            <div class="form-group row d-flex justify-content-between">
                <label for="telephone">Téléphone</label>
                <input type="tel" placeholder="votre téléphone" name="telephone" id="telephone">
            </div>
            <div class="form-group row d-flex justify-content-between">
                <label for="dateanniversaire">Date de naissance</label>
                <input type="date" placeholder="date de naissance" name="dateanniversaire" id="telephone">
            </div>
        </div>
        <input type="checkbox" id="subscribeRGPD" name="subscribeRGPD" value="RGPD"><label for="subscribeRGPG">Je confirme avoir pris connaissance des &nbsp<a href="http://<?php echo PATH;?>/ControllerUser/rgpd">Mentions Légales</a>.</label>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
  </div>
            
           
            <!-- <div class="container signin">
                <p>Already have an account? <a href="#">Sign in</a>.</p>
            </div> -->
    </form>
</div>

<?php

?>
<div id="main_inscription">
    <form id="form_inscription" action="http://<?php echo PATH; ?>/ControllerUser/inscription" method="POST">
        <h1>inscription</h1>
        <div class="container-fluid" id="form_inscription_container">
            <div class="col-md-12">
                <div class="row w-100">
                    <div class="form-group col w-50">
                        <label for="prenom">Prénom</label>
                        <input type="text" placeholder="votre prénom" name="prenom" id="prenom" required>
                    </div>
                    <div class="form-group col w-50">
                        <label for="nom">Nom</label>
                        <input type="text" placeholder="votre nom" name="nom" id="nom" required>
                    </div>
                    <div class="form-group col w-50">
                        <label for="motpasse">Mot de passe</label>
                        <input type="password" placeholder="votre mot de passe" name="motpasse" id="motpasse" required>
                    </div>
                    <div class="form-group col w-50">
                        <label for="confirmer_motpasse">Confirmation</label>
                        <input type="password" placeholder="Confirmez votre mot de passe" name="confirmer_motpasse" id="confirmer_motpasse" required>
                    </div>
                    <div class="form-group col w-50">
                        <label for="mail">e-mail</label>
                        <input type="text" placeholder="example@email.com" name="mail" id="mail" required>
                    </div>
                    <div class="form-group col w-50">
                        <label for="login">votre pseudo</label>
                        <input type="text" placeholder="votre pseudo" name="login" id="login" required>
                    </div>
                    <div class="form-group col w-50">
                        <label for="telephone">téléphone</label>
                        <input type="tel" placeholder="votre numéro de téléphone" name="telephone" id="telephone" required>
                    </div>
                    <div class="form-group col w-50">
                        <label for="dateanniversaire">date de naissance</label>
                        <input type="date" placeholder="votre date de naissance" name="dateanniversaire" id="telephone">
                    </div>
                </div>
            </div>
        </div>
        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
            <button type="submit" class="btn btn-primary">m'inscrire</button>
            <!-- <div class="container signin">
                <p>Already have an account? <a href="#">Sign in</a>.</p>
            </div> -->
    </form>
</div>
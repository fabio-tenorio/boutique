<?php

?>
<div id="main_profil">
    <form id="form_profil" action="http://<?php echo PATH; ?>/ControllerUser/profil/" method="POST">
        <div class="container" id="form_profil_container">
            <h1>profil</h1>
            <!-- <p>Please fill in this form to create an account.</p> -->
            <hr>
            <div class="col-md-6">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="prenom">Prénom</label>
                        <input type="text" placeholder="<?= $data->prenom ?>" name="prenom" id="prenom" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nom">Nom</label>
                        <input type="text" placeholder="<?= $data->nom ?>" name="nom" id="nom" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="motpasse">Mot de passe</label>
                        <input type="password" placeholder="votre mot de passe" name="motpasse" id="motpasse" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="confirmer_motpasse">Confirmation</label>
                        <input type="password" placeholder="Confirmez votre mot de passe" name="confirmer_motpasse" id="confirmer_motpasse" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="mail">e-mail</label>
                        <input type="text" placeholder="<?= $data->mail ?>" name="mail" id="mail" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="login">votre pseudo</label>
                        <input type="text" placeholder="<?= $data->login ?>" name="login" id="login" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telephone">téléphone</label>
                        <input type="tel" placeholder="<?= $data->telephone ?>" name="telephone" id="telephone" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="dateanniversaire">date de naissance</label>
                        <input type="date" placeholder="" name="dateanniversaire" id="telephone">
                    </div>
                </div>
            </div>
            <hr>

            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
            <button type="submit" class="btn btn-primary">m'inscrire</button>
            <div class="container signin">
                <p>Already have an account? <a href="#">Sign in</a>.</p>
            </div>
        </div>
    </form>
</div>

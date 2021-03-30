<div id="main_profil">

<br> <?php echo "<font color=\"red\">".$this->message."</font>";?>

    <form id="form_profil" action="http://<?php echo PATH; ?>/ControllerUser/profil/" method="POST">
        <div class="container" id="form_profil_container">
            <h1>profil</h1>
            <!-- <p>Please fill in this form to create an account.</p> -->
            <hr>
            <div class="col-md-6">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="prenom">Prénom</label>
                        <input type="text" placeholder="<?= $data->prenom ?>" name="prenom" id="prenom">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nom">Nom</label>
                        <input type="text" placeholder="<?= $data->nom ?>" name="nom" id="nom">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="motpasse">Mot de passe</label>
                        <input type="password" placeholder="votre mot de passe" name="motpasse" id="motpasse">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="confirmer_motpasse">Confirmation</label>
                        <input type="password" placeholder="Confirmez votre mot de passe" name="confirmer_motpasse" id="confirmer_motpasse">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="mail">e-mail</label>
                        <input type="text" placeholder="<?= $data->mail ?>" name="mail" id="mail">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="login">votre login</label>
                        <input type="text" placeholder="<?= $data->login ?>" name="login" id="login">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telephone">téléphone</label>
                        <input type="tel" placeholder="<?= $data->telephone ?>" name="telephone" id="telephone">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="dateanniversaire">date de naissance</label>
                        <input type="date" placeholder="" name="dateanniversaire" id="telephone">
                    </div>
                </div>
            </div>
            <hr>
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
            <button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
            <button type="submit" name="supprimer" class="btn btn-primary" value='true'>Supprimer</button>
            <div class="container signin">
                <p>Already have an account? <a href="#">Sign in</a>.</p>
            </div>
        </div>
    </form>
<?php
if (isset($_POST['supprimer']) AND $_POST['supprimer']==true) 
{ ?>
    <form id="form_profil" action="http://<?php echo PATH; ?>/ControllerUser/del_user/" method="POST">
        <div class="container" id="form_profil_container">
            <button type="submit" name="confirmer" class="btn btn-primary">Confirmer</button> 
            <p>Souhaitez-vous confirmer la suppresion de votre compte?</p>
            <button type="submit" name="annuler" class="btn btn-primary">Annuler</button>
        <div class="container signin">
    </form>
<?php }
?>    
</div>



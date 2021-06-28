<?php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- police du logo -->
    <link href="https://fonts.googleapis.com/css2?family=Dr+Sugiyama&display=swap" rel="stylesheet">
    <!-- police générique -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet"> 
    <!-- icones pour l'application -->
    <link rel="stylesheet" href="<?php echo CSS?>font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo CSS?>style.css">
    <script src="https://js.stripe.com/v3/"></script>
    <title>Sonia | boutique en ligne</title>
</head>
<body>
    <!-- <div id="call_to_action">
        <a class="formcontact" id="call_to_action_link" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
            </svg>
            Nous contacter
        </a>
        <section id="contact_section" class="contact_section_hide">
            <svg id="close_form_contact" xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="orange" class="bi bi-x" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
            <article class="container" id="contact_article">
                <h1 class="text-center">Nous contacter</h1>
                <p>Si ce que nous proposons vous intéresse, nous sommes prêts à engager une réflexion commune sur votre situation. Contactez nous!</p>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control mb-3" id="societe" name="societe" placeholder="Votre entreprise, coopérative, ou institution">
                    </div>
                    <div class="display-flex row">
                        <div class="col">
                            <input class="form-control mb-3" type="text" id="prenom" name="prenom" placeholder="Votre prénom">
                        </div>
                        <div class="col sm-6">
                            <input class="form-control mb-3" type="text" id="nom" name="nom" placeholder="Votre nom">
                        </div>
                    </div>
                    <div class="display-flex row">
                        <div class="col">
                            <input class="form-control mb-3" id="email" type="mail" placeholder="Votre email">
                        </div>
                        <div class="col sm-6">
                            <input class="form-control mb-3" id="tel" type="phone" placeholder="Votre téléphone">
                        </div>
                    </div>
                    <textarea class="form-control mb-3" id="message" cols="10" rows="2" placeholder="Votre message"></textarea>
                    <div class="form-group d-flex flex-row align-items-start">
                        <input type="checkbox" id="privacy" name="privacy" class="mx-2">
                        <label for="vehicle1">En soumettant ce formulaire, j'accepte que les informations saisies soient utilisées pour me recontacter</label>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="contact_button" class="btn btn-12 p-3" id="message" name="message" value="envoyer le message">
                    </div>
                </form>
            </article>
        </section>
    </div> -->
    <header>
        <?= $contentHeader ?>
    </header>
    <main>
        <?= $contentMain ?>
    </main>
    <footer>
        <?= $contentFooter ?>
    </footer>
    <script src="<?php echo '../View/card.js'?>"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="<?php echo '../View/script.js'?>"></script>
</body>
</html>

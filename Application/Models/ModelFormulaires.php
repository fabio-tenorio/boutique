<?php

/*
Contient la classe qui génère les formulaires

1 formulaire user simplifié pour inscription au site, au blog, à l'agenda
1 formulaire pour la boutique avec adresse, vérification identité, coordonnées bancaires 
(renvoi vers créer mon compte et récupèrer les infos de l'inscription) 

1 formulaire connexion

1 formulaire modifier profil avec conditions si je suis membre ou client boutique

1 formulaire agenda avec droit user et administrateur (conditions dans le controler)

1 formulaire pour les messages à afficher dans le tableau

*/

Namespace App\Application\Models;
use App\Application\Model;

class ModelFormulaires extends Model {
    
    public function connect()
    {
        // $this->connectDb();
<<<<<<< HEAD:Application/Models/ModelFormulaires.php
        echo "Je suis ModelFormulaires ";
=======
        echo "suis modeluser";
>>>>>>> 7ba6ca4fc80ee636aea8a0ff4b86c086aadd8d86:Application/Models/ModelFormulaires.php
    }
}

?>
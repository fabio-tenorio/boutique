<?php
/*

UN CONTROLER GÉNÉRAL QUI PERMET L'ACCÈS À DES DONNÉES DIFFÉRENTES

EXCLUSIVEMENT DU PHP. Récupère les fichiers models. 
C'est ici que sont paramétrées des classes et les différentes fonctions avec 
les CONDITIONS pour le contrôle des droits et accès

Gestion de certaines erreurs

Récupérer les titres et l'accès aux pages

Déterminer les différents controlers :

1 controler users
1 controler accueil ou main 
1 controler agenda
1 controler blog
1 controler boutique (voir si nécessité de sous-controlers)
1 controler produits
   
*/

namespace App\Application;
use App\Application\Model as Model;
use App\Application\Models;
use App\View\Accueil;
use App\Autoloader;

require_once 'autoloader.php';

Autoloader::register();

abstract class Controller {
    // public function index()
    // {
    //     echo 'Hello';
    // }

    // les méthodes qui permettent de charger un model

    public function load_model($model)
    {
        // voir après si on peut se passer sans attribuer null par défault
        if ($model!=null)
        {
            $modelPath = 'App\\'.'Application\\'.'Models\\'.$model;
            $this->$model = new $modelPath;
            // ($this->$model);
            return $this->$model;
        }
    }
        // les méthodes concernant le View

    public function render(string $fichier, array $data=[])
    {
        // décortiquer le tableau avec les données
        extract($data);
        // pour démarrer le buffer de sortie
        // ob_start();
        // pour bien écrire le nom du dossier
        // $fichier = ucfirst($fichier);
        include '/var/www/html/unit2/boutique/View/'.$fichier.'.php';
    }

    // les méthodes qui permettent de charger un model

    public function loadModel($model)
    {
        if ($model!=null)
        {
            $modelPath = 'App\\'.'Application\\'.'Models\\'.$model;
            $this->$model = new $modelPath;
        }
    }        
}



?>

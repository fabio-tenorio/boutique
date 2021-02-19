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
// use App\View\Accueil;
use App\Autoloader;

// require_once 'autoloader.php';

// Autoloader::register();

abstract class Controller {
    // public function index()
    // {
    //     echo 'Hello';
    // }

    public function bonne_affichage($donnee)
    {
        echo("<pre>");
        print_r($donnee);
        echo("</pre>");
    }

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

        public function render(string $fichier, array $data = [])
        {
            extract($data);
    
            // On démarre le buffer de sortie
            ob_start();
    
            // On génère la vue
            // require_once 'views/'.strtolower(get_class($this)).'/'.$fichier.'.php');

            // On stocke le contenu dans $content
            // $content = ob_get_clean();
    
            // On fabrique le "template"
            // require_once(ROOT.'views/layout/default.php');
            require_once 'View/header.php';
            // define ('ROOT_HEADER_FOOTER', str_replace('index.php', 'Application'.DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR, $_SERVER['SCRIPT_FILENAME']));
            // var_dump(ROOT_HEADER_FOOTER);
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

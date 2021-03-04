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
use ArrayObject;

// require_once 'autoloader.php';

// Autoloader::register();

abstract class Controller {
    
    // public function index()
    // {
    //     echo 'Hello';
    // }

    // private $path;

    // public function match($url)
    // {
    //     $url = trim($url, '/');
    //     $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
    //     $regex = "#^$path$#i";
    //     if(!preg_match($regex, $url, $matches)){
    //         return false;
    //     }
    //     array_shift($matches);
    //     $this->matches = $matches;  // On sauvegarde les paramètre dans l'instance pour plus tard
    //     return true;
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

        public function render(string $fichier, $data = null)
        {
            // var_dump($data);
    
            // On démarre le buffer de sortie
            // On génère la vue

            // d'abord le header
            ob_start();
            $viewHeader = 'View'.DIRECTORY_SEPARATOR.'header.php';
            require_once $viewHeader;
            $contentHeader = ob_get_clean();
            //ensuite le main
            ob_start();
            $viewMain = 'View'.DIRECTORY_SEPARATOR.strtolower($fichier).'.php';
            require_once $viewMain;
            $contentMain = ob_get_clean();
            //enfin, le footer
            ob_start();
            $viewFooter = 'View'.DIRECTORY_SEPARATOR.'footer.php';
            require_once $viewFooter;
            $contentFooter = ob_get_clean();
    
            // On fabrique le "template"
            require_once 'View/template.php';
        }

        static public function page_error() {
            ob_start();
            $page404 = 'View'.DIRECTORY_SEPARATOR.'page404.php';
            require_once $page404;
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
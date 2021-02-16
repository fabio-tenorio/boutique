<?php
require_once 'autoloader.php';

use App\Autoloader;
use App\Application\Controller as Controller;
use App\Application\Controllers\ControllerUser as ControllerUser;
// use App\Model\Modelaccueil as Modelaccueil;

Autoloader::register();

// define('ROOT', str_replace('index.php','Application/',$_SERVER['SCRIPT_FILENAME']));
// var_dump(WEBROOT);
$params = explode('/', $_GET['p']);

if ($params[0]!='')
{
    $controller = ucfirst($params[0]);
    $MainController = 'App\\'.'Application\\'.$controller;
    if (class_exists($MainController))
    {
        $controller = new $MainController;
        var_dump($controller);
    } else
    {
        $controller = 'App\\'.'Application\\'.'Controllers\\'.$controller;
        $controller = new $controller;
        // var_dump($controller);
    }
    // la syntaxe ci-dessous est équivalent à la condition if else ci-dessous
    // $action = isset($params[1]) ? $params[1] : http_response_code(404);
    if (isset($params[2]))
    {
        $action = $params[1];
        $value = $params[2];
        $controller->$action($value);
        if (isset($params[1]))
        {
            if (method_exists($controller, $action))
            {
                $controller->$action(null);
            }
        } else
        {
            http_response_code(404);
            //faisons une page 404 pour le projet?
            echo "La page n'existe pas";
        }
    }
} else
{
    $controller = new Controller;
    $controller->index();
}

/* 

PENSEZ À EXTENDS LE MODEL ET LE CONTROLER PRINCIPAL OU GÉNÉ DANS CHAQUE FICHIER ET CLASS

C'est "LE ROUTEUR" qui contrôle l'ensemble des controllers, des views (uniquement HTML) 
et des models (accès à la base de données via les diverses requêtes)
 
Faire un controler et un model général

Contient l'accès à la base de données

Vérifie qu'un user est connecté et autorisé à se connecté

Génère les erreurs géné : error 404; voous n'avez pas les droits ; lex exceptions

*/


?>



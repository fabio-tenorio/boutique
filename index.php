<?php
require_once 'autoloader.php';

use App\Autoloader;
use App\Application\Controller as Controller;
use App\Application\Controllers;
use App\Application\Controllers\ControllerUser as ControllerUser;
use App\Application\Controllers\ControllerAccueil as ControllerAccueil;
// use App\Model\Modelaccueil as Modelaccueil;

Autoloader::register();

ini_set('display_errors', 'on');
error_reporting(E_ALL);
// define('ROOT', $_SERVER['REQUEST_URI']);

// echo("<pre>");
// print_r(CSS);
// echo("</pre>");

$params = explode('/', $_GET['p']);
// var_dump($params);
if ($params[0]!='')
{
    $controller = ucfirst($params[0]);
    $MainController = 'App\\'.'Application\\'.$controller;
    $OtherController = 'App\\'.'Application\\'.'Controllers\\'.$controller;
    if (class_exists($MainController))
    {
       $controller = new $MainController;
    }
    if (class_exists($OtherController))
    { 
       $controller = new $OtherController;
    //    $controller->match($_GET);
    //    var_dump($controller);die;
    //    var_dump($controller);
    } else {
        // page_error
        ControllerAccueil::page_error();
    }
    // la syntaxe ci-dessous est équivalent à la condition if else ci-dessous
    // $action = isset($params[1]) ? $params[1] : http_response_code(404);
    if (isset($params[1]) && !isset($params[2]))
    {
        $action = $params[1];
        if (method_exists($controller, $action)) {
            $controller->$action();
            // var_dump($controller->$action());
        }
        // var_dump(ROOT);$_SERVER['SCRIPT_FILENAME']));
        // var_dump(ROOT);
        else
        {
            // http_response_code(404);
            ControllerAccueil::page_error();
            // echo "La page n'existe pas";
        }
    }
    elseif (isset($params[1]) && isset($params[2]))
    {
            // si la méthode accepte des paramètres
            $action = $params[1];
            $value = $params[2];
            // var_dump($value);
            $controller->$action($value);
    }
    else
    {
        // http_response_code(404);
        //faisons une page 404 pour le projet?
        ControllerAccueil::page_error();
        // $controller->index();
        // echo "La page n'existe pas";
    }
}
else
{
    $controller = new ControllerAccueil;
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

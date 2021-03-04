<?php
session_start();

require_once 'autoloader.php';

use App\Autoloader;
// on en a besoin afin d'afficher la page 404
use App\Application\Controllers\ControllerUser as ControllerUser;

Autoloader::register();

ini_set('display_errors', 'on');
error_reporting(E_ALL);

$params = explode('/', $_GET['p']);

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
    
    } else
    {
        ControllerUser::page_error();
    }
    // la syntaxe ci-dessous est équivalent à la condition if else ci-dessous
    // $action = isset($params[1]) ? $params[1] : http_response_code(404);
    if (isset($params[1]) && !isset($params[2]))
    {
        $action = $params[1];
        if (method_exists($controller, $action))
        {
            //vérifie si la méthode a une visibilité publique
            $controller->$action();
        }
        else
        {
            ControllerUser::page_error();
        }
    }
    elseif (isset($params[1]) && isset($params[2]))
    {
        // si la méthode accepte des paramètres
        $action = $params[1];
        $value = $params[2];
        $controller->$action($value);
    }
    else
    {
        ControllerUser::page_error();
    }
}
else
{
    $controller = new ControllerUser;
    $controller->index();
}

?>

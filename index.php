<?php
session_start();

require_once 'autoloader.php';
// require_once 'phpmailer.php';
use App\Autoloader;
// on en a besoin afin d'afficher la page 404
use App\Application\Controllers\ControllerUser as ControllerUser;

Autoloader::register();

ini_set('display_errors', 'on');
error_reporting(E_ALL);

if (isset($_GET['p'])) {
    $params = explode('/', $_GET['p']);
} else {
    $_GET['p'] = '';
    $params = explode('/', $_GET['p']);
}

foreach($params as $key=>$value) {
    if (count($params) < 2) {
        if ($value!='') {
            $controller = ucfirst($value);
            $MainController = 'App\\'.'Application\\'.$controller;
            $OtherController = 'App\\'.'Application\\'.'Controllers\\'.$controller;
            if (class_exists($MainController)) {
                $controller = new $MainController;
            } else if (class_exists($OtherController)) {
                $controller = new $OtherController;
            } else {
                ControllerUser::page_error();
            }
        } else {
            $controller = new ControllerUser;
            $controller->index();
        }
    } else {
        $controller = ucfirst($value);
        $MainController = 'App\\'.'Application\\'.$controller;
        $OtherController = 'App\\'.'Application\\'.'Controllers\\'.$controller;
        $action = $params[1];
        $arguments = [];
        foreach ($params as $key => $value) {
            if ($key > 1) {
                $arguments[] = $value;
            }
        }
        if (class_exists($MainController)) {
            $controller = new $MainController;
            if (method_exists($controller, $action)) {
                $controller->$action(...$arguments);
            } else {
                ControllerUser::page_error();   
            }
        } elseif (class_exists($OtherController)) {
            $controller = new $OtherController;
            if (method_exists($controller, $action)) {
                $controller->$action(...$arguments);
            } else {
                ControllerUser::page_error();
            }
        }       
    }
}
?>

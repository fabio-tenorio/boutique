<?php
use App\Autoloader;
use App\Application\Controller as Controller;
use App\Application\ControllerUser as ControllerUser;
// // use App\Model\Modelaccueil as Modelaccueil;

require 'autoloader.php';

Autoloader::register();

define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));

$params = explode('/', $_GET['p']);

if ($params[0]!='')
{
    $controller = ucfirst($params[0]);
    $controller = new Controller;
    var_dump($controller);
    die;
} else
{
    echo "pas de controller pour le moment\n";die;
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



// echo("<pre>");
// var_dump($_SERVER['SCRIPT_FILENAME']);
// var_dump($_GET);
// echo("</pre>");
// var_dump($_GET);

require_once(ROOT.'Application/Controller.php');
// require_once(ROOT.'Controller/Model.php');

// On sépare les paramètres et on les met dans le tableau $params


// var_dump($params);

// Si au moins 1 paramètre existe
if($params[0] != ""){
    // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
    $controller = 'Application/'.ucfirst($params[0]);
    // On sauvegarde le 2ème paramètre dans $action si il existe, sinon index
    $action = isset($params[1]) ? $params[1] : 'index';

    // On appelle le contrôleur
    // var_dump(ROOT.$controller.'.php');
    require_once(ROOT.$controller.'.php');

    // On instancie le contrôleur
    $controller = new $controller();
    // var_dump($controller);
    // On appelle la méthode
    $controller->$action();
}else{
    echo "aucun controller appelé";
}

$test = new Controller;
$test->index();

?>



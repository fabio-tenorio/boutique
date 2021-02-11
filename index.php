<?php

/* 

PENSEZ À EXTENDS LE MODEL ET LE CONTROLER PRINCIPAL OU GÉNÉ DANS CHAQUE FICHIER ET CLASS

C'est "LE ROUTEUR" qui contrôle l'ensemble des controllers, des views (uniquement HTML) 
et des models (accès à la base de données via les diverses requêtes)
 
Faire un controler et un model général

Contient l'accès à la base de données

Vérifie qu'un user est connecté et autorisé à se connecté

Génère les erreurs géné : error 404; voous n'avez pas les droits ; lex exceptions

*/

define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));


echo("<pre>");
var_dump($_SERVER['SCRIPT_FILENAME']);
var_dump(ROOT);
echo("</pre>");

var_dump($_GET);

// require_once(ROOT.'app/Model.php');
//require_once(ROOT.'Controller/Agenda.php');

// On sépare les paramètres et on les met dans le tableau $params
$params = explode('/', $_GET['p']);

// Si au moins 1 paramètre existe
if($params[0] != ""){
    // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
    $controller = ucfirst($params[0]);

    // On sauvegarde le 2ème paramètre dans $action si il existe, sinon index
    $action = isset($params[1]) ? $params[1] : '__construct';

    // On appelle le contrôleur
    require_once(ROOT.'Controller/'.$controller.'.php');

    // On instancie le contrôleur
    $controller = new $controller();

    // On appelle la méthode
    var_dump($controller->$action());
}else{
    // Ici aucun paramètre n'est défini
}

?>



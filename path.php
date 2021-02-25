<?php

// définir des constantes pour garder les chemins vers les controllers et leurs méthodes
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

define ('ACCUEIL', 'http://'.$host.$uri);
define ('CONNEXION', 'http://'.$host.$uri.'/'.'ControllerUser/connexion');
define('INSCRIPTION', 'http://'.$host.$uri.'/'.'ControllerUser/inscription');
define('PROFIL', 'http://'.$host.$uri.'/'.'ControllerUser/profil');

?>
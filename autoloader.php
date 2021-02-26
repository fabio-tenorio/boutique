<?php

namespace App;

class Autoloader
{
    
    public static function register()
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
        
        // pour les controllers et leurs méthodes
        $host  = $_SERVER['HTTP_HOST'];
        // pour les fichiers des images et le css
        $root = $_SERVER['DOCUMENT_ROOT'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $path = $host.$uri;
        
        define ('ACCUEIL', 'http://'.$path);
        define ('CONNEXION', 'http://'.$path.'/'.'ControllerUser/connexion/');
        // define ('HOST', 'http://'.$host.$uri);
        // define ('ROOT', 'http://'.$root.$uri);
        define ('CONTROLLER', 'http://'.$path.'/'.'Controller');
        define('INSCRIPTION', 'http://'.$path.'/'.'ControllerUser/inscription');
        define('PROFIL', 'http://'.$path.'/'.'ControllerUser/profil');
    
    }
    static function autoload($class_name)
    {
        $class_name = str_replace(__NAMESPACE__ . '\\', '', $class_name);
        $class_name = str_replace('\\','/', $class_name);
        $file = __DIR__.'/'.$class_name.'.php';
        if(file_exists($file)){
        require_once __DIR__.'/'.$class_name.'.php';
        // echo "j'ai trouvé ".__DIR__.'/'.$class_name.'.php';
        } else
        {
            // echo "je n'ai pas trouvé ".__DIR__.'/'.$class_name.'.php';
        }
    }
}

?>
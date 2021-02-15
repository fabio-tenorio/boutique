<?php

namespace App;

class Autoloader
{
    static function register()
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
    }
    static function autoload($class_name)
    {
        $class_name = str_replace(__NAMESPACE__ . '\\', '', $class_name);
        $class_name = str_replace('\\','/', $class_name);
        $file = __DIR__.'/'.$class_name.'.php';
        if(file_exists($file)){
        require_once __DIR__.'/'.$class_name.'.php';
        } else
        {
            echo "je n'ai pas trouvé ".__NAMESPACE__.'/'.$class_name.'.php';
        }
    }
}

?>
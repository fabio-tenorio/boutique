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
    static function autoload($class)
    {
        $class = str_replace('App\\','',$class);  
        $class = str_replace('\\','/',$class);    
        if(file_exists(__DIR__ . '/' . $class . '.php')){
        require __DIR__ . '/' . $class . '.php';   
            
        } 
    }
}

?>
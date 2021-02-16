<?php

/*
Requêtes spécifiques admin
*/

Namespace App\Application\Models;
use App\Application\Model;

class ModelAdmin extends Model {
    
    public function connect()
    {
        // $this->connectDb();
        echo "Je suis ModelAdmin ";
    }
}

?>
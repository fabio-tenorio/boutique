<?php

Namespace App\Application\Models;
use App\Application\Model;

class ModelAccueil extends Model {

    public function __construct()
    {
        $this->table = "categorie";
        $this->connectDb();
    }
    
    public function getAll_user()
    {
        return $this->getAll();
    }
/*
namespace App\Model;

class Modelaccueil {

    public function test()
    {
        echo "je suis Modelaccueil";
    }
}
*/

}

/* 
*/

?>
<?php

/*
Requêtes spécifiques admin
*/

Namespace App\Application\Models;
use App\Application\Model;
use App\Application\Models\ModelProduits;

class ModelAdmin extends Model {
    
    public function connect()
    {
        // $this->connectDb();
        echo "je suis modelAdmin";
    }

    public function deleteProduct($id) {
        $this->delete('produit', $id);
    }
    
}

?>
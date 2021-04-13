<?php

Namespace App\Application\Models;
use App\Application\Model;

class ModelProduits extends Model 
{
    public $table;
    public $id;
    public $msg;

    public $id_utilisateur;

    public function __construct()
    {
        //les attributs basiques de l'user, si jamais il est inscrit sur la bdd
    }

    public function get_all_produits() {
        return $this->get_all('produit');
    }

    public function get_one_produit($id)
    {
        $stmt = $this->connect_db()->prepare("SELECT * FROM `produit` WHERE id=:id");
        $stmt->execute([':id'=>$id]);
        $produit = $stmt->fetch(\PDO::FETCH_OBJ);
        return $produit;
    }

    public function update_stock_produit($data, $id) {
        $this->update('produit', $data, $id);
    }
}
?>
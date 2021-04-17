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

    public function get_all_prestations() {
        $sql = "SELECT * FROM 'produits' WHERE id_categorie = 1 OR id_categorie = 50";
        $stmt = $this->connect_db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function get_all_produits_physiques() {
        $sql = "SELECT * FROM 'produits' WHERE id_categorie IS NOT 1 OR id_categorie IS NOT 50";
        $stmt = $this->connect_db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function get_all_clients() {
        return $this->get_all('client');
    }

    public function select_last_commande() {
        return $this->get_last_one('commande');
    }

    public function get_one_produit($id)
    {
        $stmt = $this->connect_db()->prepare("SELECT * FROM `produit` WHERE id=:id");
        $stmt->execute([':id'=>$id]);
        $produit = $stmt->fetch(\PDO::FETCH_OBJ);
        return $produit;
    }

    public function update_stock_produit($data, $id) {
        return $this->update('produit', $data, $id);
    }

    public function update_client($data, $id) {
        return $this->update('client', $data, $id);
    }

    public function insert_new_client($data) {
        return $this->insert('client', $data);
    }

    public function insert_new_commande($data) {
        return $this->insert('commande', $data);
    }

    public function insert_new_ligne_commande($data) {
        return $this->insert('lignecommande', $data);
    }

    public function get_all_commandes() {
        return $this->get_all('commande');
    }
}
?>
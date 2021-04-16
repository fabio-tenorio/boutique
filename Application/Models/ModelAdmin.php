<?php

/*
Requêtes spécifiques admin
*/

Namespace App\Application\Models;
use App\Application\Model;
use App\Application\Models\ModelProduits;

class ModelAdmin extends Model 
{
    public function connect()
    {
        // $this->connectDb();
        echo "je suis modelAdmin";
    }

    public function new_product_data($data)
    {
        $insert_values = [];
        // je crée un array avec les noms des colonnes
        $column_names = $this->columns_names('produit');
        // je parcours l'array associatif $data qui contient les données renseignés par ControllerUser
        foreach ($data as $key => $value)
        {
            // je parcours aussi les noms des colonnes
            for ($i=0;isset($column_names[$i]);$i++)
            {
                //afin de vérificer, pour chaque element de $data,
                //si la clé correspond au nom d'une colonne
                if ($column_names[$i]==$key)
                {
                    //si oui, j'ajoute $value à l'array insert_values
                    //pour l'envoyer à la méthode insert_values
                    $insert_values[$key]=$value;
                }
            }
        }
        return $insert_values;
    }

    public function insert_product($data)
    {
        foreach($data as $chaine) {
            if (is_string($chaine)) {
                $this->connect_db()->quote($chaine);
            }
        }
        $data = $this->new_product_data($data);
        return $this->insert('produit', $data);
    }

    public function update_product($data, $id)
    {
        return $this->update('produit', $data, $id);
    }

    public function deleteProduct($id) {
        $this->delete('produit', $id);
    }

    // public function deleteUser($id) {
    //     $this->delete('utilisateur', $id);
    // }

    public function allStock() {
        $sql = "SELECT stock FROM produit";
        $stmt = $this->connect_db()->prepare($sql);
        $stmt->execute();
        $stock = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $stock;
    }

    public function all_categories() {
        return $this->get_all('categorie');
    }

    public function new_fournisseur_data($data)
    {
        $insert_values = [];
        // je crée un array avec les noms des colonnes
        $column_names = $this->columns_names('fournisseur');
        // je parcours l'array associatif $data qui contient les données renseignés par ControllerUser
        foreach ($data as $key => $value)
        {
            // je parcours aussi les noms des colonnes
            for ($i=0;isset($column_names[$i]);$i++)
            {
                //afin de vérificer, pour chaque element de $data,
                //si la clé correspond au nom d'une colonne
                if ($column_names[$i]==$key)
                {
                    //si oui, j'ajoute $value à l'array insert_values
                    //pour l'envoyer à la méthode insert_values
                    $insert_values[$key]=$value;
                }
            }
        }
        return $insert_values;
    }

    public function insert_fournisseur($data)
    {
        $data = $this->new_fournisseur_data($data);
        return $this->insert('fournisseur', $data);
    }

    public function update_fournisseur($data, $id)
    {
        return $this->update('fournisseur', $data, $id);
    }

    public function deleteFournisseur($id) {
        $this->delete('fournisseur', $id);
    }
    
}
?>
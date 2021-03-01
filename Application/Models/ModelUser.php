<?php

Namespace App\Application\Models;
use App\Application\Model;

class ModelUser extends Model {

    public $table;
    public $id;
    public $msg;

    public $id_utilisateur;

    public function __construct()
    {
        //les attributs basiques de l'user, si jamais il est inscrit sur la bdd
    }

    //je vérifie si il y a quelqun enregistré sur la bdd avec les données fournis par ControllerUser 
    public function get_one_user($login)
    {
        $stmt = $this->connect_db()->prepare("SELECT * FROM `utilisateurs` WHERE login=:login");
        $stmt->execute([':login'=>$login]);
        $user = $stmt->fetch(\PDO::FETCH_OBJ);
        return $user;
    }

    //je sélectionne tous les utilisateurs de la bdd;
    public function get_all_users()
    {
        return $this->get_all('utilisateurs');
    }

    /*je récupère les données fournis par ControllerUser concernant le nouveau utilisateur
    * je récupère aussi les noms des collones de la table utilisateur
    */

    public function new_user_data($data)
    {
        $insert_values = [];
        // je crée un array avec les noms des colonnes
        $column_names = $this->columns_names('utilisateurs');
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

    //j'insère les infos d'un nouveau utilisateur dans la bdd
    public function insert_user($data)
    {
        $data = $this->new_user_data($data);
        return $this->insert('utilisateurs', $data);
    }
    //je mets à jour les informations de l'utilisateur selon les données fournis par ControllerUser
    public function update_user($data, $id)
    {
        return $this->update('utilisateurs', $data, $id);
    }

    //je supprime l'utilisateur selon le $id fourni par ControllerUser
    public function delete_user($id)
    {
        return $this->delete('utilisateurs', $id);
    }

    // public function select_user($id)
    // {
    //     $sql = "SELECT * FROM utilisateurs WHERE id=$id";
    //     $PDO = $this->connect_db()->prepare($sql);
    //     $PDO->execute();
    //     return $result = $PDO->fetch(\PDO::FETCH_OBJ);
    //     // // $this->pdo->prepare("SELECT * FROM `utilisateurs` WHERE id=$id");
    //     // $pdo->execute();
    //     // $result = $pdo->rowcount(\PDO::FETCH_OBJ);
    //     if ($result===1)
    //     {
    //         return "Vous êtes déjà inscrit";
    //     }
    //     else
    //     {
    //         return "Vous n'êtes pas inscrit";
    //     }
    // }

    /*$this->_PDO->prepare("SELECT * FROM 'tableoproduit' WHERE id=''");
        $this->_PDO->execute();
        $this->_PDO->rowcount(PDO::FETCH_OBJ);*/

}



?>
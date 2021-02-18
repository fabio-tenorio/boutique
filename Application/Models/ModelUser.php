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
    public function get_one_user($id)
    {
        return $this->get_one('utilisateurs', $id);
    }

    //je sélectionne tous les utilisateurs de la bdd;
    public function get_all_users()
    {
        return $this->get_all('utilisateurs');
    }

    //je inscrit un utilisateur avec les données fournis par ControllerUser
    public function insert_user($id)
    {
        $tab_user = $this->get_one_user($id);
        $this->insert($tab_user);
    }

    //je mets à jour les informations de l'utilisateur selon les données fournis par ControllerUser
    public function update_user($tab)
    {
        $this->_PDO->prepare("UPDATE 'table' SET 'nom-colonne' = ? WHERE 'id'=?");
        $this->_PDO->execute(array($a, $b));
        $this->_PDO->fetchAll(\PDO::FETCH_OBJ);
        $msg = "Vos modifications ont bien été enregistrées";
    }

    //je supprime l'utilisateur selon le $id fourni par ControllerUser
    public function delete_user($id)
    {
        $this->_PDO->prepare("DELETE FROM 'table' WHERE id_table=?");
        $this->_PDO->bindParam(1, $a, \PDO::PARAM_INT);
        $this->_PDO->execute();

        $erreur = "La suppression de... a été pris en compte !<br>";

        if(isset($msg))
        {
        echo '<font color="red">'.$msg."</font>";
        unset($msg);
        unset($_POST);
        }
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
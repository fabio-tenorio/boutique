<?php

/*
*/
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

    //je vérifie si il y a quelqun enregistré sur la bdd avec les données fournis par ControllerUser 
    public function get_one_user($login, $mail=null)
    {
        $stmt = $this->connect_db()->prepare("SELECT id, id_droit, login, motpasse, mail FROM `utilisateurs` WHERE login=:login OR mail=:mail");
        $stmt->execute([':login'=>$login, ':mail'=>$mail]);
        $user = $stmt->fetch(\PDO::FETCH_OBJ);
        return $user;
    }
    
    public function connect()
    {
        // $this->connectDb();
        echo "Je suis ModelProduit ";
    }
}

?>
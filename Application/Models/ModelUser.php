<?php

/*
C'est celle qui a été testée et sert de modéle pour la validité de l'extends avec Model (modéle géné)
*/

Namespace App\Application\Models;
use App\Application\Model;

class ModelUser extends Model 
{
    public $table;
    public $id;
    public $msg;

    public $id_utilisateur;

    public function __construct()
    {
       
    }
    
    /*
    public function connect()
    {
        // $this->connectDb();
        echo "suis modeluser";
    }
    */
    
    public function select()
    {
        $this->_PDO->prepare("SELECT * FROM 'table' WHERE id=''");
        $this->_PDO->execute();
        $this->_PDO->rowcount(PDO::FETCH_OBJ);
    }

    public function update()
    {
        $this->_PDO->prepare("UPDATE 'table' SET 'nom-colonne' = ? WHERE 'id'=?");
        $this->_PDO->execute(array($a, $b));
        $this->_PDO->fetchAll(PDO::FETCH_OBJ);

        $msg = "Vos modifications ont bien été enregistrées";
    }

    
    public function insert()
    {
        $this->_PDO->prepare("INSERT INTO 'table' ('a', 'b') VALUES(?, ?)");
        $this->_PDO->execute(array($a, $b));
        
        $msg = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
    }
    

    public function delete()
    {
        $this->_PDO->prepare("DELETE FROM 'table' WHERE id_table=?");
        $this->_PDO->bindParam(1, $a, PDO::PARAM_INT);
        $this->_PDO->execute();

        $erreur = "La suppression de... a été pris en compte !<br>";

        if(isset($msg))
        {
        echo '<font color="red">'.$msg."</font>";
        unset($msg);
        unset($_POST);
        }
    }

}

?>
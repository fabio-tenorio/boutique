<?php

/*
<<<<<<< HEAD

=======
C'est celle qui a été testée et sert de modéle pour la validité de l'extends avec Model (modéle géné)
>>>>>>> 7ba6ca4fc80ee636aea8a0ff4b86c086aadd8d86
*/

Namespace App\Application\Models;
use App\Application\Model;

<<<<<<< HEAD
class ModelUser extends Model {

=======
class ModelUser extends Model 
{
>>>>>>> 7ba6ca4fc80ee636aea8a0ff4b86c086aadd8d86
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
<<<<<<< HEAD
        $this->_PDO->prepare("SELECT * FROM 'tableuser' WHERE id=''");
        $this->_PDO->execute();
        $this->_PDO->rowcount(\PDO::FETCH_OBJ);

        /*$this->_PDO->prepare("SELECT * FROM 'tableoproduit' WHERE id=''");
        $this->_PDO->execute();
        $this->_PDO->rowcount(PDO::FETCH_OBJ);*/
    }

    public function insert()
    {
        $this->_PDO->prepare("INSERT INTO 'table' ('a', 'b') VALUES(?, ?)");
        $this->_PDO->execute(array($a, $b));
        
        $msg = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
=======
        $this->_PDO->prepare("SELECT * FROM 'table' WHERE id=''");
        $this->_PDO->execute();
        $this->_PDO->rowcount(PDO::FETCH_OBJ);
>>>>>>> 7ba6ca4fc80ee636aea8a0ff4b86c086aadd8d86
    }

    public function update()
    {
        $this->_PDO->prepare("UPDATE 'table' SET 'nom-colonne' = ? WHERE 'id'=?");
        $this->_PDO->execute(array($a, $b));
<<<<<<< HEAD
        $this->_PDO->fetchAll(\PDO::FETCH_OBJ);
=======
        $this->_PDO->fetchAll(PDO::FETCH_OBJ);
>>>>>>> 7ba6ca4fc80ee636aea8a0ff4b86c086aadd8d86

        $msg = "Vos modifications ont bien été enregistrées";
    }

    
<<<<<<< HEAD
    public function delete()
    {
        $this->_PDO->prepare("DELETE FROM 'table' WHERE id_table=?");
        $this->_PDO->bindParam(1, $a, \PDO::PARAM_INT);
=======
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
>>>>>>> 7ba6ca4fc80ee636aea8a0ff4b86c086aadd8d86
        $this->_PDO->execute();

        $erreur = "La suppression de... a été pris en compte !<br>";

        if(isset($msg))
        {
        echo '<font color="red">'.$msg."</font>";
        unset($msg);
        unset($_POST);
        }
    }

<<<<<<< HEAD
    public function connect()
    {
        // $this->connectDb();
        echo "Je suis ModelUser ";
    }


}



=======
}

>>>>>>> 7ba6ca4fc80ee636aea8a0ff4b86c086aadd8d86
?>
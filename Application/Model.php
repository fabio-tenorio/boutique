<?php

/*
UN MODEL GÉNÉRAL QUI PERMET L'ACCÈS À DES DONNÉES DIFFÉRENTES DDB MYSQL

CONTIENT L'ACCÈS À LA BASE DE DONNÉES (voir le code que m'avez montré NADIA)

"RÉCUPÉRER Ddb et Ddbconstante dans ce controler"

*/

Namespace App\Application;

class Model {
    //le choix des variables plutôt que des constants (DEFINE) a été fait pour raison de sécurité
    // vu que les constants restent disponibles globalement
    private $db_host;
    private $db_login;
    private $db_password;
    private $db_name;
    protected $_PDO;
    
    //déplacer vers l'intérieur d'une méthode?
    public $table;
    public $id;
    public $msg;

    public function __construct()
    {
        $this->db_host = "localhost";
        $this->db_login = "root";
        $this->db_password = '';
        $this->db_name = "boutique";
    }

    public function test() {
        echo "hello number ";
    }

    public function connectDb() {
        try {
            $this->_PDO = new \PDO("mysql:dbname=$this->db_name;host=$this->db_host;", $this->db_login, $this->db_password);
            $this->_PDO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->_PDO->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            return $this->_PDO;
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getOne(){
        $sql = "SELECT * FROM ".$this->table." WHERE id=".$this->id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();    
    }
    
    /**
     * Méthode permettant d'obtenir tous les enregistrements de la table choisie
     *
     * @return void
     */
    public function getAll(){
        $sql = "SELECT * FROM ".$this->table;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }

    // public function getConnection() {
    //     $this->_PDO = null;

    //     try {
    //         $this->_PDO = new \PDO("mysql:dbname=$this->db_name;host=$this->db_host;", $this->db_login, $this->db_password);
    //         $this->_PDO->exec("set names utf8");
    //         return $this->_PDO;
    //     } catch (\PDOException $e) {
    //         die('Erreur : ' . $e->getMessage());
    //     }

    // }
}

?>
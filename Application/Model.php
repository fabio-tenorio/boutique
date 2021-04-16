<?php
/* UN MODEL GÉNÉRAL QUI PERMET L'ACCÈS À DES DONNÉES DIFFÉRENTES DDB MYSQL */

Namespace App\Application;

abstract class Model
{
    private $db_host = 'localhost';
    private $db_login = 'root';
    private $db_password = '';
    private $db_name = 'boutique';
    private $db_charset = 'utf8mb4';
    protected $_PDO;
    // private $whitelist;
    private $whitelist = array ('utilisateurs', 'reservation', 'produit', 'panier');

    public function __construct() {
        $this->whitelist = array ('utilisateurs', 'reservation', 'produit', 'panier');
    }

    public function connect_db()
    {
        $dsn = "mysql:host=" . $this->db_host . ";dbname=" . $this->db_name . ";charset=" . $this->db_charset;
        $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
        ];
        try {
            $this->_PDO = new \PDO($dsn, $this->db_login, $this->db_password, $options);
            return $this->_PDO;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
       
    // des variables utiles pour la construction des templates
    // déplacer vers l'intérieur d'une méthode?
    public $table;
    public $id;
    public $msg;
    
    //je sélectionne une ligne dans une table selon l'id donnée
    public function get_one($table, $id)
    {
        $sql = $this->connect_db()->prepare("SELECT * FROM $table WHERE id=:id");
        $sql->execute([':id'=>$id]);
        return $sql->fetch(\PDO::FETCH_OBJ);
    }

    public function get_last_one($table) {
        $sql = "SELECT * FROM $table ORDER BY id DESC LIMIT 0, 1";
        $stmt = $this->connect_db()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    /**
     * Méthode permettant d'obtenir tous les enregistrements de la table choisie
     */

    public function get_all($table)
    {   
        $sql = $this->connect_db()->prepare("SELECT * FROM $table");
        // $sql->bindParam(':table', $table);
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_OBJ);
    }

    // d'abord, je récupère les colonnes d'une table informée par le Controller
    public function columns_names($table)
    {
        // on utilise la vue du schema d'information INFORMATION_SCHEMA
        // sur les metadata de la base de données d'une table avec une requête select et des mots-clés SQL
        $db_name = $this->db_name;
        $sql = "SELECT column_name FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = :table AND TABLE_SCHEMA = :db_name";
        $stmt = $this->connect_db()->prepare($sql);
        $stmt->bindValue(':table', $table, \PDO::PARAM_STR);
        $stmt->bindValue(':db_name', $db_name, \PDO::PARAM_STR);
        $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC))
        {
            $result[] = $row['column_name'];
        }
        return $result;
    }

    /* ensuite, j'insère les infos sur un nouveau item dans une table donnée */
    public function insert($table, $data)
    {
        $columns = "";
        $values = "";

        foreach ($data as $key => $value)
        {
            $columns = substr_replace($columns, " ".$key.", ", 0, 0);
            $values = substr_replace($values, "'".$value."', ", 0, 0);
        }

        $columns = substr($columns, 1, -2);
        $values = substr($values, 0, -2);
        
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        $result = $this->connect_db()->prepare($sql);
        return $result->execute();
    }

    //je mets à jour les données spécifiées d'une ligne dans un tableau
    public function update($table, $data, $id)
    {
        //je récupère les noms des colonnes de $table
        $columns = $this->columns_names($table);
        //je récupère la ligne à être modifiée
        $ligne = $this->get_one($table, $id);
        foreach ($data as $key => $new_value)
        {
            foreach ($ligne as $attribut => $value)
            {
                if ($attribut==$key)
                {
                    if ($new_value != $value AND $new_value != '')
                    {
                        $sql = "UPDATE $table SET $attribut =:new_value WHERE id=:id";
                        $result = $this->connect_db()->prepare($sql);
                        return $result->execute([':new_value'=>$new_value, ':id'=>$id]);
                    }
                }
            }
        }
        // $msg = "Vos modifications ont bien été enregistrées";
    }
    
    //je supprime les infos d'une ligne donnée (par id) dans un tableau donnée
    public function delete($table, $id)
    {
        foreach($this->whitelist as $value) {
            if ($table === $value) {
                $stmt = $this->connect_db()->prepare("DELETE FROM ".$table." WHERE id=:id");
                $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
                $stmt->execute();
                $stmt->bindValue(':id', $id);
                return $stmt->execute();
            }
        }
    }
}
?>
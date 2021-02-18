<?php
/*
UN MODEL GÉNÉRAL QUI PERMET L'ACCÈS À DES DONNÉES DIFFÉRENTES DDB MYSQL
CONTIENT L'ACCÈS À LA BASE DE DONNÉES (voir le code que m'avez montré NADIA)
"RÉCUPÉRER Ddb et Ddbconstante dans ce controler"
*/

Namespace App\Application;

class Model
{
    private $db_host = 'localhost';
    private $db_login = 'root';
    private $db_password = '';
    private $db_name = 'boutique';
    private $db_charset = 'utf8mb4';
    protected $_PDO;

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
    //le choix des variables plutôt que des constants (DEFINE) a été fait pour raison de sécurité
    // vu que les constants restent disponibles globalement

    // Informations de connexion
       
    // des variables utiles pour la construction des templates
    // déplacer vers l'intérieur d'une méthode?
    public $table;
    public $id;
    public $msg;
    
    // je récupère les colonnes d'une table informée par le Controller
    public function columns_names($table)
    {
        $db_name = $this->db_name;
        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = :table AND TABLE_SCHEMA = :db_name";
        $stmt = $this->connect_db()->prepare($sql);
        $stmt->bindValue(':table', $table, \PDO::PARAM_STR);
        $stmt->bindValue(':db_name', $db_name, \PDO::PARAM_STR);
        $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $result[] = $row['COLUMN_NAME'];
        }
        return $result;
    }

    public function get_one($table, $id)
    {
        $sql = $this->connect_db()->prepare("SELECT * FROM $table WHERE id=$id");
        $sql->execute();
        return $sql->fetch(\PDO::FETCH_OBJ);
    }
    
    /**
     * Méthode permettant d'obtenir tous les enregistrements de la table choisie
     *
     * @return void
     */
    public function get_all($table)
    {
        $sql = $this->connect_db()->prepare("SELECT * FROM $table");
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_OBJ);
    }

    public function insert($table)
    {
        for ($i=0;isset($table->id);$i++)
        {
            foreach ($table as $key => $value)
            {
                $key = $key.$i;
                var_dump($key);
                echo("<br/>");
            }
        }
        //parcourrir les données de la table
        
         // $id = $value->id;
       // $sql = $this->connect_db()->prepare("SELECT * FROM $table WHERE id=$id");
            // $sql->execute();
            // return $sql->fetch(\PDO::FETCH_OBJ);
    }
        // $this->_PDO->prepare("INSERT INTO 'table' ('a', 'b') VALUES(?, ?)");
        // $this->_PDO->execute(array($a, $b));    
        // $msg = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
}

?>
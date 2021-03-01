<?php
Namespace App\Application\Controllers;
Use App\Application\Controller;
Use App\Application\Models\ModelUser;

class ControllerUser extends Controller {

    private $id;
    private $id_droit;
    private $prenom;
    private $nom;
    private $motpasse;
    private $mail;
    protected $login;
    private $telephone;
    private $dateanniversaire;
    // il n'y a pas de colonne $adresse dans la table utilisateur;

    public function __construct()
    {
        // if (is_object($this->user_exists($_POST['login'])))
        // {
            // $this->login = $_POST['login'];
            // $this->prenom = $_POST['prenom'];
            // $this->nom = $_POST['nom'];
            // $this->motpasse = $_POST['motpasse'];
            // $this->mail = $_POST['mail'];
            // $this->telephone = $_POST['telephone'];
            // $this->dateanniversaire = $_POST['dateanniversaire'];
        // }
        if (isset($_SESSION['id']))
        {
            $this->id = $_SESSION['id'];
        }
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function mail()
    {
        return $this->mail;
    }

    public function login()
    {
        return $this->login;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getDateanniversaire()
    {
        return $this->dateanniversaire;
    }

    public function index()
    {
        echo "Je suis ControllerUser";
    }

// MÉTHODES LIÉES AUX MODELS

    public function all_users()
    {
        $all_users = new ModelUser();
        return $this->all_users->get_all_users();
    }

    // je vérifie si il y a quelqun enregistré sur la bdd avec le login renseigné
    public function user_exists($login)
    {
        $user = new ModelUser();
        return $user->get_one_user($login);
    }

    //vérifier si il y a quelqun déjà inscrit avec le même e-mail
    public function verify_email($email)
    {
        $user = new ModelUser();
    }

    public function new_user($data)
    {
        if (isset($data['motpasse']))
        {
            $data['motpasse']=password_hash($data["motpasse"], PASSWORD_DEFAULT);
        }
        $new_user = new ModelUser();
        // var_dump($data);die;
        return $new_user->insert_user($data);
    }

    public function modify_user($data)
    {
        $data = ['id'=>14, 'id_droit'=>'200', 'login'=>'tata', 'motpasse'=>'testing', 'prenom'=>'tata', 'nom'=>'tutu', 'mail'=>'titi@toto', 'telephone'=>'123456', 'dateanniversaire'=>'1978-09-12 08:00:20', 'dateinscription'=>'1978-09-12 08:00:20'];
        $id = $data['id'];
        $update = new ModelUser();
        return $this->$update->update_user($data, $id);
    }

    public function del_user($data)
    {
        $id = 14;
        $supprime_user = new ModelUser();
        return $this->supprime_user->delete_user($id);
    }

    // MÉTHODES LIÉES AUX VIEWS

    public function inscription()
    {
        if (isset($_POST['login']))
        {
            $_POST['id_droit']=1;
            $this->new_user($_POST);
        }
        $this->render('inscription');
    }

    public function connexion() {
        //vérifier si les informations sont été renseignées
        if (isset($_POST['login']))
        {
            // dans ce cas, vérifier les données renseignés
            // d'abord, vérifier si le login est enregistré sur la bdd
            $user = $this->user_exists($_POST['login']);
            // ensuite, décripter le mot de passe
            if (password_verify($_POST["motpasse"], $user->motpasse))
            {
                $_SESSION['user'] = $user;
                $this->render('accueil');
            } else
            {
                $this->render('connexion');
            }
        }
        $data = $_GET;
        extract($data);
        if ($data != null)
        {
            extract($data);
        }
        // sinon, afficher le form vide
        $this->render('connexion');
    }

    public function disconnect()
    {
        session_destroy();
        $this->render('accueil');
    }

    public function render_connexion(array $data = []){
        extract($data);

        // On démarre le buffer de sortie
        ob_start();

        // On génère la vue
        // $this->render('connexion.php')
        // require_once(ROOT.'views/'.strtolower(get_class($this)).'/'.$fichier.'.php');

        // On stocke le contenu dans $content
        // $content = ob_get_clean();

        // On fabrique le "template"
        // require_once(ROOT.'views/layout/default.php');
    }
}

?>
<?php
Namespace App\Application\Controllers;
Use App\Application\Controller;
Use App\Application\Models\ModelUser;

class ControllerUser extends Controller {

    private $id;
    private $id_droit;
    protected $prenom;
    protected $nom;
    protected $motpasse;
    protected $mail;
    protected $login;
    protected $telephone;
    protected $dateanniversaire;
    // il n'y a pas de colonne $adresse dans la table utilisateur;

    public function __construct()
    {
        $this->user = new ModelUser();
        if (isset($_SESSION['user']))
        {
            $this->id = $_SESSION['user']->id;
            $this->login = $_SESSION['user']->login;
        }
    }

    public function index()
    {
        //je vérifie si il y a quelqun connecté
        if (isset($_SESSION['user']))
        {
            $this->render('accueil', $_SESSION['user']);
        }
        else
        {
            $this->render('accueil');
        }
    }

// MÉTHODES LIÉES AUX MODELS

    public function all_users()
    {
        return $this->user->get_all_users();
    }

    // je vérifie si il y a quelqun enregistré sur la bdd avec le login renseigné
    public function user_exists($login)
    {
        return $this->user->get_one_user($login);
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
        return $this->user->insert_user($data);
    }

    public function update_profil($data)
    {
        return $this->user->update_user($data, $this->id);
    }

    public function del_user($id)
    {
        // $id = 14;
        // $supprime_user = new ModelUser();
        return $this->user->delete_user($this->id);
    }

    // MÉTHODES LIÉES AUX VIEWS

    public function inscription()
    {
        if (isset($_POST['login']))
        {
            $_POST['id_droit']=1;
            $this->new_user($_POST);
            $this->render('connexion');
        }
        $this->render('inscription');
    }

    public function connexion() {
        //vérifier si les informations ont été renseignées
        if (isset($_POST['login']))
        {
            // dans ce cas, vérifier les données renseignés
            // d'abord, vérifier si le login est enregistré sur la bdd
            $user = $this->user_exists($_POST['login']);
            // ensuite, décripter le mot de passe
            if (is_object($user))
            {
                if (password_verify($_POST["motpasse"], $user->motpasse))
                {
                    $_SESSION['user'] = $user;
                    $this->render('accueil', $_SESSION['user']);
                }
                else
                {
                    //mot de passe renseigné ne correspond pas
                }
            }
            else
            {
                $this->render('connexion');
            }
        }
        else
        {
            $this->render('connexion');
        }
    }

    public function profil()
    {
        // $data
        // $data = ['id'=>14, 'id_droit'=>'200', 'login'=>'tata', 'motpasse'=>'testing', 'prenom'=>'tata', 'nom'=>'tutu', 'mail'=>'titi@toto', 'telephone'=>'123456', 'dateanniversaire'=>'1978-09-12 08:00:20', 'dateinscription'=>'1978-09-12 08:00:20'];
        if (isset($_SESSION))
        {
            $data = $this->user;
            $data = $data->get_one('utilisateurs', $_SESSION['user']->id);
            $this->render('profil', $data);
        }
        if (isset($_POST))
        {
            // var_dump($_POST);
            $this->update_profil($_POST);
        }
    }

    public function disconnect()
    {
        $url = "http://".PATH."/ControllerUser/index";
        session_destroy();
        header("Refresh:0,url=$url");
    }
}

?>
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
            $this->message = '';
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
    public function user_exists($login, $mail=null)
    {
        return $this->user->get_one_user($login, $mail);
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
        if (isset($_POST['supprimer']))
        {
            /*$this->message = 'Souhaitez-vous confirmer la suppresion de votre compte?';
            $this->render('profil', $this->message);*/
        }
            if(isset($_POST['annuler']) AND !isset($_POST['confirmer']))
            {
                $this->message = 'Votre avez annulé la suppresion de votre compte';
                $this->render('profil', $this->message);
            }
            if(isset($_POST['confirmer']) AND !isset($_POST['annuler']))
            {
                $this->message = 'Votre compte a bien été supprimé';
                $this->render('profil', $this->message);
                $this->user->delete_user($this->id);
            }
    }
            

    // MÉTHODES LIÉES AUX VIEWS

    public function inscription()
    {
        if (isset($_POST['login']))
        {
            if (!empty($_POST['login']) AND !empty($_POST['mail']) AND !empty($_POST['motpasse']) 
            AND !empty($_POST['confirmer_motpasse']) 
            AND !empty($_POST['prenom']) AND !empty($_POST['nom']) 
            AND !empty($_POST['telephone']) AND !empty($_POST['dateanniversaire']))
            { 
                $user = $this->user_exists($_POST['login'], $_POST['mail']);
                // $user génère un objet, si pas d'objet, renvoi d'un booléen : false
                if ($user===false)
                {
                    $login = htmlspecialchars($_POST['login']);
                    /*$password = sha1($_POST['motpasse']);
                    $password2 = sha1($_POST['confirmer_motpasse']);*/
                    $loginlength = strlen($login);
            
                    if ($loginlength <= 55)
                    {
                        $user = $this->user_exists($_POST['login'], $_POST['mail']);
                            
                            if($user == 0) 
                            { 
                               if($_POST['motpasse'] ==$_POST['confirmer_motpasse'])
                               {
                                    $password = password_hash($_POST['motpasse'], PASSWORD_DEFAULT);
                                    $_POST['id_droit']=1;
                                    $this->new_user($_POST);
                                    $this->message = "Votre compte a bien été créé !";
                                    $this->render('connexion', $this->message);
                                }   
                            } 
                            else 
                            {
                                $this->message = 'Vos mots de passes ne correspondent pas';
                                return $this->render('inscription', $this->message);
                            }
                    }
                    else 
                    {
                        $this->message = 'Votre login ne doit pas dépasser 55 cractères';
                        return $this->render('inscription', $this->message);
                    }
                }   
                else 
                {
                    $this->message = 'Le mail existe déjà';
                    return $this->render('connexion', $this->message); 
                }
            }
            else 
            {
                $this->message = 'Vous devez renseigner tous les champs';
                return $this->render('inscription', $this->message); 
            }  
        }
        else 
        {
            $this->message = '';
            return $this->render('inscription', $this->message); 
        }   
        $this->render('inscription'); 
    }

    public function connexion() 
    {
        if (isset($_POST['login']))
        {
            if (!empty($_POST['login']) OR ($_POST['motpasse']))
            {
                if (isset($_POST['login']) AND isset($_POST['motpasse']))
                {
                    $user = $this->user_exists($_POST['login']);
                    if (is_object($user))
                    {
                        if (password_verify($_POST["motpasse"], $user->motpasse))
                        {
                            $_SESSION['user'] = $user;
                            $this->render('accueil', $_SESSION['user']);
                        }
                        else
                        {
                            $this->message = 'Erreur de mot de passe';
                            return $this->render('connexion', $this->message); 
                        }
                    }
                    else 
                    {
                        $this->message = 'Erreur de login';
                        return $this->render('connexion', $this->message); 
                    } 
                }
            }
            else 
            {
                $this->message = 'Vous devez renseigner tous les champs';
                return $this->render('connexion', $this->message); 
            } 
        }  
        else 
        {
            $this->message = '';
            return $this->render('connexion', $this->message); 
        }  
    }

    public function profil()
    {
        if (isset($_SESSION))
        {
            $data = $this->user;
            $data = $data->get_one('utilisateurs', $_SESSION['user']->id);
            $this->render('profil', $data);
        }

        if (isset($_POST))
        {





            $this->update_profil($_POST);
        }




    } 

    public function disconnect()
    {
        $url = "http://".PATH."/ControllerUser/index";
        session_destroy();
        header("Refresh:0,url=$url");
    }

    /**public function admin($data=null)
    {
        $this->render('administrateur', $data);
    }*/
        
}

    
?>
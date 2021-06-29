<?php
/* Permet l'accès à un page administration sur la page accueil
Et donc aux fonctions admin (supprimer un user, supprimer un message, mofifier des droits, )
Accès aux infos du users (profil, commande...)
Création du discussion sur blog
Nouvel article dans boutique
Créer un Évenement dans agenda sur plusieurs heures ou jours */

Namespace App\Application\Controllers;
Use App\Application\Controller;
use App\Application\Models\ModelProduits;
use App\Application\Models\ModelUser;
use App\Application\Models\ModelAdmin;
use DateTime;

class ControllerAdmin extends ControllerUser 
{
    private $id;
    private $id_droit;
    protected $categories;

    public function __construct()
    {
        $this->admin = new ModelUser();
        $this->adminProducts = new ModelAdmin();
        $this->droit = $this->adminProducts->get_all_droits();
        $this->categories = $this->selectCategories();
        $this->commandes = $this->adminCommandes();
        if(isset($_SESSION['user']->login) AND $_SESSION['user']->id_droit == 200 )
        {
            $this->id = $_SESSION['user']->id;
            $this->login = $_SESSION['user']->login;
            $this->id_droit = $_SESSION['user']->id_droit;
            $this->message = '';
            $this->stock = $this->sommeStock();
            $this->valeurStock = $this->valeurStock();
        }
    }

    public function adminCommandes() {
        $this->commandesAdmin = new ModelProduits;
        $now = new DateTime();
        $month = $now->format('m');
        $commandes = $this->commandesAdmin->get_all_commandes();
        $this->moisPrecedent = 0;
        $this->moisEnCours = 0;
        foreach($commandes as $commande) {
            if ($commande->datecommande < $month) {
                // var_dump($commande);
                $this->moisPrecedent += $commande->total;
            } else {
                // var_dump($commande);
                $this->moisEnCours += $commande->total;
            }
        }
    }
    
    public function admin_users()
    {
        return $this->admin->get_all_users();
    }

    public function get_droit()
    {   
        $this->droit = $this->adminProducts->get_all_droits();
        return $this->droit;
    }

    public function change_droit()
    {
        $droit['id_droit'] = $_POST['id_droit'];
        $id_utilisateur = $_POST['id'];
        if (is_integer($id_utilisateur) and is_integer($droit['id_droit'])) {
            $this->admin->update_user($droit, $id_utilisateur);
            return $this->index();
        } else {
            $this->message = "vous n'avez pas renseigné tous les champs";
            return $this->index();
        }
        
    }

    public function admin_products() {
        $this->produitsAdmin = new ModelProduits;
        return $this->produitsAdmin->get_all_produits();
    }

    public function supprimerProduit() {
        $tousLesProduits = $this->admin_products();
        foreach($_POST as $id) {
            foreach($tousLesProduits as $produit) {
                if ($id == $produit->id) {
                    $this->supprimerImageProduit($produit->imageproduit);
                }
            }
            $this->adminProducts->deleteProduct($id);
        }
        $this->index();
    }

    public function supprimerImageProduit($image) {
        $file_path = str_replace('boutique', 'boutique'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$image, realpath(''));
        unlink($file_path);
        // unlink('/var/www/html/private/unit2/boutique/images/'.$image);
    }

    public function supprimerUtilisateur() {
        foreach($_POST as $id) {
            $this->admin->delete_user($id);
        }
        $this->index();
    }

    public function nouveauProduit() {
        $data = $_POST;
        intval($data['stock']);
        if (isset($data['stock']) && $data['stock'] < 0) {
            $this->message = "la valeur renseignée pour la quantité en stock d'un produit doit être un nombre entier positif";
            return $this->index();
        }
        if ($data['prix'] == '') {
            $this->message = "la valeur renseignée pour le prix du produit doit être un chiffre positif au format X.XX ";
            return $this->index();
        } else {
            floatval($data['prix']);
            number_format($data['prix'], 2);
        }
        if (isset($_FILES)) {
            $this->upload_imageproduit($_FILES);
            $data['imageproduit'] = $_FILES['imageproduit']['name'];
        }
        $this->adminProducts->insert_product($data);
        return $this->index();
    }

    public function upload_imageproduit($image)
    {
        if (isset($image['imageproduit'])) {
            $errors= array();
            $file_name = $image['imageproduit']['name'];
            $file_size =$image['imageproduit']['size'];
            $file_tmp =$image['imageproduit']['tmp_name'];
            $file_type=$image['imageproduit']['type'];
            $file_error=$image['imageproduit']['error'];
            $file_extension = explode('.', $file_name);
            $file_ext=strtolower(end($file_extension));
            $extensions= array("jpeg","jpg","png");
            
            if ($file_error === UPLOAD_ERR_OK) {
                if ($file_size > 2097152 || $file_size === 0) {
                    $errors[]='La taille du fichier ne peut pas dépasser les 2 MB';
                    $this->message = $errors[0];
                    return $this->message;
                }
                if (in_array($file_ext, $extensions) === false) {
                    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                    $this->message = $errors[0];
                    return $this->message;
                }
                if (empty($errors)==true) {
                    $file_path = str_replace('boutique', 'boutique'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$file_name, realpath(''));
                    move_uploaded_file($file_tmp, $file_path);
                    $this->message = "Success";
                }
            } else {
                $this->message = "Échec d'insertion de l'image ";
                return $this->message;
            }
        }
    }

    public function nouvelleCategorie() {
        if (isset($_POST['titrecategorie'])) {
            $this->adminProducts->insert_categorie($_POST);
            $this->index();
        }
    }

    public function index()
    {
        if(isset($_SESSION['user']->login) AND $_SESSION['user']->id_droit == 200 )
        {
            $this->data=[];
            $this->data['user'] = $_SESSION ['user'];
            $this->data['allusers'] = $this->admin_users();
            $this->data['products'] = $this->admin_products();
            $this->data['droits'] = $this->droit;
            $this->render('administrateur', $this->data);
        }
        else
        {
            $this->render('accueil');
        }
    }

    public function selectCategories() {
        return $this->adminProducts->all_categories();
    }

    public function sommeStock() {
        $stock = $this->adminProducts->allStock();
        $result = 0;
        foreach ($stock as $value) {
            foreach($value as $quantiteStock) {
                $result += $quantiteStock;
            }            
        }
        return $result;
    }

    public function valeurStock() {
        $produits = $this->admin_products();
        $valeur = 0;
        foreach ($produits as $produit) {
            $valeur += $produit->prix * $produit->stock;
        }
        return $valeur;
    }
}        
    

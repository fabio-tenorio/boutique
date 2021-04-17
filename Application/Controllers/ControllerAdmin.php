<?php
/* Permet l'accès à un page administration sur la page accueil
Et donc aux fonctions admin (supprimer un user, supprimer un message, mofifier des droits, )
Accès aux infos du users (profil, commande...)
Création du discussion sur blog
Nouvel article dans boutique
Créer un Évenement dans agenda sur plusieurs heures ou jours */

Namespace App\Application\Controllers;
Use App\Application\Controller;
Use App\Application\Models\ModelProduit;
use App\Application\Models\ModelProduits;
use App\Application\Models\ModelUser;
use App\Application\Models\ModelAdmin;

class ControllerAdmin extends ControllerUser 
{
    private $id;
    private $id_droit;
    protected $categories;

    public function __construct()
    {
        $this->admin = new ModelUser();
        $this->adminProducts = new ModelAdmin();
        $this->categories = $this->selectCategories();
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

    public function admin_commandes() {
        $this->commandesAdmin = new ModelProduits;
        $this->commandes = $this->commandesAdmin->get_all_commandes();
    }
    
    public function admin_users()
    {
        return $this->admin->get_all_users();
    }

    public function admin_products() {
        $this->produitsAdmin = new ModelProduits;
        return $this->produitsAdmin->get_all_produits();
    }

    public function supprimerProduit() {
        foreach($_POST as $id) {
            $this->adminProducts->deleteProduct($id);
        }
        $this->index();
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
        if ($data['stock'] < 0) {
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
        $this->adminProducts->insert_product($data);
        return $this->index();
    }

    public function index()
    {
        if(isset($_SESSION['user']->login) AND $_SESSION['user']->id_droit == 200 )
        {
            $this->data=[];
            $this->data['user'] = $_SESSION ['user'];
            $this->data['allusers'] = $this->admin_users();
            $this->data['products'] = $this->admin_products();
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
    

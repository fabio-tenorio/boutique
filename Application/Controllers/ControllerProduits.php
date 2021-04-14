<?php

Namespace App\Application\Controllers;
Use App\Application\Controller;
Use App\Application\Models\ModelProduits;
Use App;

class ControllerProduits extends Controller 
{
    private $id;
    private $id_droit;
    protected $prenom;
    protected $nom;
    protected $motpasse;
    protected $mail;
    protected $login;
    protected $telephone;
    protected $dateanniversaire;
    protected $nombreDeProduits;
    // il n'y a pas de colonne $adresse dans la table utilisateur;

    public function __construct()
    {
        $this->produit = new ModelProduits;
        if (isset($_SESSION['user']))
        {
            $this->id = $_SESSION['user']->id;
            $this->login = $_SESSION['user']->login;
            $this->message = '';
        }
    }

    public function allProduits() {
        return $this->produit->get_all_produits();
    }

    public function allClients() {
        return $this->produit->get_all_clients();
    }

    public function verifierStock($produits) {
        $stock = $this->allProduits();
        $checkStock = true;
        foreach($produits as $produitDemande) {
            foreach($stock as $produitDispo) {
                // var_dump($produits);
                if ($produitDemande->id == $produitDispo->id) {
                    if ($produitDispo->stock - $produitDemande->quantite < 0) {
                        $this->message = "Désolé. On n'est dispose pas de cette quantité de produits";
                        $checkStock = false;
                    } else {
                        $checkStock = true;
                    }
                }
            }
        }
        if ($checkStock === true) {
            return true;
        } else {
            return false;
        }
    }

    public function calculerSousTotal ($prix, $fois) {
        return $this->produitTotal = $prix * $fois;
    }

    public function panier () {
        if (isset($_POST['updatepanier']) and isset($_SESSION['panier'])) {
            $panier = array();
            $index = 0;
            foreach($_POST as $key=>$value) {
                $panier[$index]['id'] = $key;
                $panier[$index]['quantite'] = $value;
                $panier[$index]=(object)$panier[$index];
                $index++;
            }
            // var_dump($panier);
            if ($this->verifierStock($panier) === true) {
                $this->panierTotal = array();
                foreach($_SESSION['panier'] as $produit) {
                    foreach($panier as $produitPost) {
                        if ($produit->id == $produitPost->id) {
                            $produit->quantite = $produitPost->quantite;
                            $this->panierTotal[$produit->id] = $this->calculerSousTotal($produit->prix, $produitPost->quantite);
                            $this->panierTotal[$produit->id] = number_format($this->panierTotal[$produit->id], 2, '.', ',');
                        }
                    }
                }
                $this->total = array_sum($this->panierTotal);
                $this->total = number_format($this->total, 2, '.', ',');
                $this->render('panier');
            } else {
                $panier = $_SESSION['panier'];
                $this->panierTotal = array();
                foreach($panier as $produit) {
                    $this->panierTotal[$produit->id] = $this->calculerSousTotal($produit->prix, $produit->quantite);
                    $this->panierTotal[$produit->id] = number_format($this->panierTotal[$produit->id], 2, '.', ',');
                }
                $this->total = array_sum($this->panierTotal);
                $this->total = number_format($this->total, 2, '.', ',');
                $this->render('panier');
            }
        } elseif (!isset($_POST['updatepanier']) and isset($_SESSION['panier'])) {
            $panier = $_SESSION['panier'];
            $this->panierTotal = array();
            foreach($panier as $produit) {
                $this->panierTotal[$produit->id] = $this->calculerSousTotal($produit->prix, $produit->quantite);
                $this->panierTotal[$produit->id] = number_format($this->panierTotal[$produit->id], 2, '.', ',');
            }
            $this->total = array_sum($this->panierTotal);
            $this->total = number_format($this->total, 2, '.', ',');
            $this->render('panier');
        } else {
            $_SESSION['panier'] = array ();
            $this->panierTotal = array ();
            $this->total = 0;
            $this->render('panier');
        }
    }

    public function ajouterAuPanier($id) {
        $this->listeDesProduits = $this->produit->get_all_produits();
        foreach ($this->listeDesProduits as $produit) {
            if ($id == $produit->id) {
                $produit->quantite = 1;
                $_SESSION['panier'][$produit->id] = $produit++;
            }
        }
        $this->nombreDeProduits = sizeof($_SESSION['panier']);
        $_SESSION['nombreDeProduits'] = $this->nombreDeProduits;
        $this->render('produits');
    }

    public function supprimerDuPanier($id) {
        foreach($_SESSION['panier'] as $produit) {
            if ($produit->id == $id) {
                unset($_SESSION['panier'][$id]);
                $_SESSION['nombreDeProduits']--;
            }
        }
        $this->panier();
    }

    public function viderPanier() {
        if (isset($_SESSION['panier'])) {
            unset($_SESSION['panier']);
            unset($_SESSION['nombreDeProduits']);
        }
        $this->render('produits');
    }

    public function commande() {
        if (isset($_SESSION['user'])) {
            if (isset($_SESSION['panier'])) {
                $this->panier = $_SESSION['panier'];
                $this->panierTotal = array();
                foreach($this->panier as $produit) {
                    $this->panierTotal[$produit->id] = $this->calculerSousTotal($produit->prix, $produit->quantite);
                    $this->panierTotal[$produit->id] = number_format($this->panierTotal[$produit->id], 2, '.', ',');
                }
                $this->total = array_sum($this->panierTotal);
                $this->total = number_format($this->total, 2, '.', ',');
            } else {
                $_SESSION['panier'] = array ();
                $this->panierTotal = array ();
                $this->total = 0;
            }
        } else {
            $this->render('connexion');
        }
    }

    public function insertClient() {
        $data = array();
        if (isset($_POST)) {
            $data = $_POST;
            unset($data['commentaire']);
            unset($data['stripeToken']);
        }
        if (isset($_SESSION['user'])) {
            $data['id_utilisateur'] = $_SESSION['user']->id;
        } else {
            $data['id_utilisateur'] = null;
        }
        $checkClient = false;
        $clients = $this->allClients();
        foreach ($clients as $client) {
            if ($client->id_utilisateur === $data['id_utilisateur']) {
                $checkClient = true;
                $this->produit->update_client($data, $client->id);
                return $this->lastId = $client->id;
            }
        }
        if ($checkClient === false) {
            $this->produit->insert_new_client($data);
            $dernierClient = $this->allClients();
            $this->lastId = 1;
            foreach($dernierClient as $key => $client) {
                $this->lastId = $client->id;
            }
            return $this->lastId;
        }
    }

    public function insertCommande($data) {
        $this->produit->insert_new_commande($data);
    }

    public function insertLigneCommande($produits) {
        $lastCommande = $this->produit->select_last_commande();
        foreach($produits as $produit) {
            $data = ['id_commande'=>$lastCommande[0]['id'], 'id_produit'=>$produit->id, 'quantiteproduit'=>$produit->quantite];
            $this->produit->insert_new_ligne_commande($data);
        }
    }

    public function updateStock($produitsPanier) {
        $stock=$this->allProduits();
        foreach($produitsPanier as $produitPanier) {
            foreach($stock as $produitStock) {
                if ($produitPanier->id === $produitStock->id) {
                    $produitStock->stock = $produitStock->stock - $produitPanier->quantite;
                    $data = ['stock'=>$produitStock->stock];
                    $this->produit->update_stock_produit($data, $produitStock->id);
                }
            }
        }
    }

    public function stripe() {
        $this->commande();
        if ($this->total <= 0) {
            $this->message = '<h1 class="my-5 text-center">Votre commande était vide</h1><h2 class="my-5 text-center">Aucun prélèvement a eu lieu</h2>';
            return $this->render('commandeconfirmation');
        } else {
            foreach($this->panier as $key=>$value) {
                if ($key == 'quantite') {
                    $data[$key] = $value;
                }
            }
            if ($this->verifierStock($this->panier)===true) {
                $total = str_replace('.', '', $this->total);
                require './vendor/autoload.php';
                \Stripe\Stripe::setApiKey('sk_test_51If0n8GAVfFRDcyqyt7RWuzbgilod4eaJWk85bXVg8xTv1nu4XqTB0qgcfdtuINm84D5Jox1VsGdhhQe2D6XcOJu005WXivVx0');
                $this->data = filter_var_array($_POST, FILTER_SANITIZE_STRING);
                $token = $this->data['stripeToken'];
                $charge = \Stripe\Charge::create([
                'amount' => $total,
                'currency' => 'eur',
                'description' => 'description',
                'source' => $token,
                ]);
                $this->charge = $charge;
                $_POST['codepostal'] = $this->charge->billing_details->address->postal_code;
                if ($this->charge->outcome->seller_message == "Payment complete.") {
                    $this->updateStock($this->panier);
                    $this->insertClient();
                    $data = ['id_client'=>$this->lastId, 'token'=>$token];
                    $this->insertCommande($data);
                    $this->insertLigneCommande($_SESSION['panier']);
                    $this->message = '<h1 class="text-center">Paiement confirmé</h1><h2 class="text-center">Merci de votre visite!</h2>';
                    $this->render('commandeconfirmation');
                } else {
                    $this->message = '<h1 class="my-5 text-center">Paiement réfusé</h1><h2 class="my-5 text-center">Désolé. Un problème est survenu lors de la procedure de paiement.</h2>';
                    $this->render('commandeconfirmation');
                }
            }
        }
    }

    public function afficherCommande() {
        $this->commande();
        $this->render('commandevalider');
    }

    public function produits()
    {
        $this->render('produits');
    }

    public function prestations() {
        $this->render('prestations');
    }

    public function produitfiche($id) {
        $this->ficheproduit = $this->produit->get_one_produit($id);
        $this->render('produitfiche');
    }
}
?>
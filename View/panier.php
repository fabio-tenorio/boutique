<?php
/*
Dernier panier
*/

function creationPanier() {
    if (isset($_SESSION['panier'])) {
        $_SESSION['panier']=array();
        $_SESSION['panier']['libelleProduti']=array();
        $_SESSION['panier']['qteProduit']=array();
        $_SESSION['panier']['prixProduit']=array();
        $_SESSION['panier']['verrou']=array();
        $select = $this->connect_db->query('SELECT tva FROM products');
        $tva = $select->fetch(PDO::FETCH_OBJ);
        $_SESSION['panier']['tva']= $tva;
    }
    return true;

    function ajouterArticle($libelleProduit, $qteProduti, $prixProduit) {
        if (creationPanier() && isVerouille()) {
            $position_produit = array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);

            if ($position_produit !== false) {
                $_SESSION['panier']['libelleProduit'];
            }
        }
    }
}
?>
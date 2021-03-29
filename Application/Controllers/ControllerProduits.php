<?php

/*
*/

Namespace App\Application\Controllers;
Use App\Application\Controller;

class ControllerProduits extends Controller {

    public function index()
    {
        //je vérifie si il y a quelqun connecté
        if (isset($_SESSION['user']))
        {
            $this->render('categoriefiche', $_SESSION['user']);
        }
        else
        {
            $this->render('categoriefiche');
        }
    }

    public function produitfiche() {
        $this->render('produitfiche');
    }
}

?>
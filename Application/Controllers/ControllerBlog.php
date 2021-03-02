<?php

/*
*/

Namespace App\Application\Controllers;
Use App\Application\Controller;

class ControllerBlog extends Controller 
{

    /*
    * Test qui marche
    */
    public function index()
    {
        echo "Je suis ControllerBlog";
    }

    /*
    * Est-ce nécessaire ?
    public function Construct()
    {

    }
    */
    
    public function select_one_conversation($id)
    {
        $conversation= new ModelConversation();
        return $this-> conversation->get_one_conversation($id);
    }

    public function insertConversation()
    {

    }

    public function updateConversation()
    {

    }

    /*
     * Supprime une conversation, ses messages, réponses, donc vues, 
     * likes et dislikes (plus tard)
     */
    public function deleteConversation()
    {

    }

    /*
     * Voir Topic Manu : c'est une recherche par mots clés dans 
     * les messages ; doit-on faire une recherche par id conv, 
     * id utilisateur...)
     */
    public function Search()
    {

    }

}

?>
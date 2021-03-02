<?php

/* 

    PENSER À DEMANDER LA CONFIRMATION D'INSCRIPTION PAR UN MAIL DE CONFIRMATION 

   Modifier une réponse par l'auteur
   Modifiers un massage par l'auteur
   Supprimer une réponse OK par auteur et admin
   Supprimer un message OK par auteur et admin

   " Penser aux réponses rattachés à un utilisateur dans un article"

   FONCTIONS ADMIN 
  
   Supprimer tous les messages et les réponses d'un utilisateur dans un ou tous les Topic

   Bloquer la possibilité pour un utlisateur de publier un message, une réponse, un avis

   Supprimer un utilisateur et tous les messages et réponses d'un utilisateurs (voir likes/dislikes et avis)
   
   Supprimer un article et donc les messages et réponses rattachés

   Supprimer un Thème et donc les articles, messages et réponses rattachés

    BOUTON SIGNALER UN ABUS

    ENVOYER UN AVERTISSEMENT

*/

Namespace App\Application\Models;
use App\Application\Model;

class ModelBlog extends Model {
    
    /* Function test
    public function connect()
    {
        // $this->connectDb();
        echo "Je suis ModelBlog ";
    }
    */
    
    public function get_one_reponse($id)
    {
        return $this->get_one('reponse',$id);
    }

    public function get_one_message($id)
    {
        return $this->get_one('message',$id);
    }

    public function delete_reponse($id)
    {
        return $this->delete('reponse',$id);
    }

    public function delete_message($id)
    {
        return $this->delete('message',$id);
    }

    /* Prévoir les réponses associées de l'utilisateur et tous les utilisateurs qui ont contribués*/

    public function get_one_article($id)
    {
        return $this->get_one('article',$id);
    }

    public function get_all_article()
    {
        return $this->get_all('article'); 
    }

    public function delete_article($id)
    {
        return $this->delete('article',$id);
    }

    /* Prévoir les messages et réponses associés*/

    public function new_article_data($data)
    {
        $insert_values = [];
        $column_names = $this->columns_names('article');
        foreach ($data as $key => $value)
        {
            for ($i=0;isset($column_names[$i]);$i++)
            {
                if ($column_names[$i]==$key)
                {
               
                    $insert_values[$key]=$value;
                }
            }
        }
        return $insert_values;
    }

    public function insert_article($data)
    {
        $data = $this->new_article_data($data);
        return $this->insert('article', $data);
    }

    public function update_article($data, $id)
    {
        return $this->update('article', $data, $id);
    }

    /* Pensez à rattacher les messages et réponses
    */

    public function get_one_theme($id)
    {
        return $this->get_one('theme',$id);
    }

    public function get_all_theme()
    {
        return $this->get_all('theme'); 
    }

    public function delete_theme($id)
    {
        return $this->delete('theme',$id);
    }

    /* Prévoir les articles, messages et réponses associés*/
}

?>
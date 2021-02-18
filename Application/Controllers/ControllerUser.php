<?php

Namespace App\Application\Controllers;
Use App\Application\Controller;
Use App\Application\Models\ModelUser;

class ControllerUser extends Controller {

    public function index()
    {
        echo "Je suis ControllerUser";
    }

    public function user_exists($id)
    {
        $user = new ModelUser();
        $this->bonne_affichage($user->get_one_user($id));
    }

    public function all_users()
    {
        $all_users = new ModelUser();
        $this->bonne_affichage($all_users->get_all_users());
    }

    public function columns_user($table)
    {
        $columns_names = new ModelUser;
        $this->bonne_affichage($columns_names->columns_names($table));
    }

    public function new_user($id)
    {
        $new_user = new ModelUser();
        $this->bonne_affichage($new_user->insert_user($id));
    }

    // public function connect_user()
    // {
    //     $user = new ModelUser();
    //     var_dump($user);
    // }
}

?>
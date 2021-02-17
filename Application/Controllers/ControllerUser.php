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
        var_dump($user->search_user($id));
    }

    public function connect_user()
    {
        $user = new ModelUser();
        var_dump($user);
    }
}

?>
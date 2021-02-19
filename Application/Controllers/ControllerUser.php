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

    public function new_user()
    {
        $data = ['id_droit'=>'100', 'login'=>'toto', 'motpasse'=>'test', 'prenom'=>'toto', 'nom'=>'titi', 'mail'=>'titi@toto', 'telephone'=>'123456', 'dateanniversaire'=>'1978-09-12 08:00:20', 'dateinscription'=>'1978-09-12 08:00:20'];
        $new_user = new ModelUser();
        $this->bonne_affichage($new_user->insert_user($data));
    }

    // public function connect_user()
    // {
    //     $user = new ModelUser();
    //     var_dump($user);
    // }
}

?>
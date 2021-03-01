<?php
Namespace App\Application\Controllers;
Use App\Application\Controller;
Use App\Application\Models\ModelUser;

class ControllerUser extends Controller {

    public function index()
    {
        echo "Je suis ControllerUser";
    }

// MÉTHODES LIÉES AUX MODELS

    public function all_users()
    {
        $all_users = new ModelUser();
        return $this->all_users->get_all_users();
    }

    public function user_exists($id)
    {
        $user = new ModelUser();
        return $this->user->get_one_user($id);
    }

    public function new_user($data)
    {
        if (isset($data['motpasse']))
        {
            $data['motpasse']=password_hash($data["motpasse"], PASSWORD_DEFAULT);
        }
        $new_user = new ModelUser();
        // var_dump($data);die;
        return $new_user->insert_user($data);
    }

    public function modify_user($data)
    {
        $data = ['id'=>14, 'id_droit'=>'200', 'login'=>'tata', 'motpasse'=>'testing', 'prenom'=>'tata', 'nom'=>'tutu', 'mail'=>'titi@toto', 'telephone'=>'123456', 'dateanniversaire'=>'1978-09-12 08:00:20', 'dateinscription'=>'1978-09-12 08:00:20'];
        $id = $data['id'];
        $update = new ModelUser();
        return $this->$update->update_user($data, $id);
    }

    public function del_user($data)
    {
        $id = 14;
        $supprime_user = new ModelUser();
        return $this->supprime_user->delete_user($id);
    }

    // MÉTHODES LIÉES AUX VIEWS

    public function inscription()
    {
        if (isset($_POST['login']))
        {
            $_POST['id_droit']=1;
            $this->new_user($_POST);
        }
        $this->render('inscription');
    }

    public function connexion() {
        $data = $_GET;
        extract($data);
        if ($data != null)
        {
            extract($data);
        }
        // var_dump($data);
        $this->render('connexion');
    }

    public function render_connexion(array $data = []){
        extract($data);

        // On démarre le buffer de sortie
        ob_start();

        // On génère la vue
        // $this->render('connexion.php')
        // require_once(ROOT.'views/'.strtolower(get_class($this)).'/'.$fichier.'.php');

        // On stocke le contenu dans $content
        // $content = ob_get_clean();

        // On fabrique le "template"
        // require_once(ROOT.'views/layout/default.php');
    }
}

?>
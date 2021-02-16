<?php

/*
*/

Namespace App\Application\Controllers;
Use App\Application\Controller;

class ControllerBlog extends Controller {

    public function test()
    {
        echo "Je suis le fils de ".$this->index();
    }
}

?>
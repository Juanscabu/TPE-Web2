<?php 
include_once('Views/home-view.php');

class HomeController {
    private $view;

    public function __construct() {
        $this->view = new HomeView ();
    }

    
    public function mostrarHome() {
        $this->view->mostrarHome();
    }

}


?>
<?php 
include_once('Views/home-view.php');
include_once('Helpers/sessionHelper.php');

class HomeController {
    private $view;
    private $administrador;
    

    public function __construct() {
        $this->view = new HomeView ();
        $sessionHelper = new SessionHelper();
        $this->administrador = $sessionHelper->checkAdministrador();
    }

    
    public function mostrarHome() {
        $this->view->mostrarHome($this->administrador);
    }

    public function mostrarRegistro() {
        $this->view->mostrarRegistro();
    }

}
?>
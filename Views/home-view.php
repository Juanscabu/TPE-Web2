<?php
require_once('libs/Smarty.class.php');





class HomeView {
  private $smarty;
  
  public function __construct() {
    $this->smarty = new Smarty();
    $this->smarty->assign('basehref', BASE_URL);
}

  public function mostrarHome($administrador) {
    $this->smarty->assign('titulo',"Home");
    $this->smarty->assign('administrador',$administrador);
    $this->smarty->display('templates/home.tpl');
  }

  public function mostrarRegistro() {
    $this->smarty->assign('titulo',"Registro");
    $this->smarty->display('templates/registro.tpl');
  }
}

?>
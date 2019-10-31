<?php
require_once('libs/Smarty.class.php');





class HomeView {
  private $smarty;
  
  public function __construct() {
    $this->smarty = new Smarty();
    $this->smarty->assign('basehref', BASE_URL);
}



  public function mostrarHome() {
    $this->smarty->assign('titulo',"Home");
    $this->smarty->display('templates/home.tpl');
  }




}

?>
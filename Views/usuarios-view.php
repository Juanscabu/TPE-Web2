<?php
require_once('libs/Smarty.class.php');





class UsuariosView {
  private $smarty;
  
  public function __construct() {
    $this->smarty = new Smarty();
    $this->smarty->assign('basehref', BASE_URL);
}


 public function mostrarUsuarios($usuarios) {
    $this->smarty->assign('titulo',"Usuarios");
    $this->smarty->assign('usuarios',$usuarios);
    $this->smarty->display('templates/usuarios.tpl');
  }

  public function mostrarEditarUsuario($usuario,$id) {
    $this->smarty->assign('titulo',"editar usuario");
    $this->smarty->assign('usuario',$usuario);
    $this->smarty->assign('id',$id);
    $this->smarty->display('templates/editarUsuario.tpl');

  }

}

?>
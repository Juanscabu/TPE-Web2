<?php
require_once('libs/Smarty.class.php');

class ProductosView {
  private $smarty;
  
  public function __construct() {
    $this->smarty = new Smarty();
    $this->smarty->assign('basehref', BASE_URL);
  }

  public function mostrarProductos($productos,$loggeado) {
    $this->smarty->assign('titulo',"Productos");
    $this->smarty->assign('productos',$productos);
    $this->smarty->assign('loggeado',$loggeado);
    $this->smarty->display('templates/productos.tpl');
  }  

  public function mostrarEditarProducto($producto,$id) {
    $this->smarty->assign('titulo',"editar productos");
    $this->smarty->assign('producto',$producto);
    $this->smarty->assign('id',$id);
    $this->smarty->display('templates/editarProducto.tpl');
  }  

}
?>
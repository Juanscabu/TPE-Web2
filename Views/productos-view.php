<?php
require_once('libs/Smarty.class.php');

class ProductosView {
  private $smarty;
  
  public function __construct() {
    $this->smarty = new Smarty();
    $this->smarty->assign('basehref', BASE_URL);
  }

  public function mostrarError($msgError) {
    echo "<h1>ERROR!</h1>";
    echo "<h2>{$msgError}</h2>";
}

  public function mostrarProductos($productos,$administrador) {
    $this->smarty->assign('titulo',"Productos");
    $this->smarty->assign('productos',$productos);
    $this->smarty->assign('loggeado',$administrador);
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
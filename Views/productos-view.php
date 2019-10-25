<?php
require('libs/Smarty.class.php');





class View {
  private $smarty;
  
  public function __construct() {
    $this->smarty = new Smarty();
    $this->smarty->assign('basehref', BASE_URL);
}



  public function mostrarPedidos($pedidos,$productos) {
    $this->smarty->assign('titulo',"Pedidos");
    $this->smarty->assign('pedidos',$pedidos);
    $this->smarty->assign('productos',$productos);
    $this->smarty->display('templates/pedidos.tpl');
  }

  public function mostrarProductos($productos,$loggeado) {
    $this->smarty->assign('titulo',"Productos");
    $this->smarty->assign('productos',$productos);
    $this->smarty->assign('loggeado',$loggeado);
    $this->smarty->display('templates/productos.tpl');
  }  

  public function mostrarEditarProducto($producto) {
    $this->smarty->assign('titulo',"Editar Producto");
    $this->smarty->assign('producto',$producto);
    $this->smarty->display('templates/editarProducto.tpl');
  }  


}
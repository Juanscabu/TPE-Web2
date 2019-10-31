<?php
require_once('libs/Smarty.class.php');


class PedidosView {
  private $smarty;
  
  public function __construct() {
    $this->smarty = new Smarty();
    $this->smarty->assign('basehref', BASE_URL);
}

public function mostrarPedidos($pedidos,$productos,$loggeado) {
    $this->smarty->assign('titulo',"Pedidos");
    $this->smarty->assign('pedidos',$pedidos);
    $this->smarty->assign('productos',$productos);
    $this->smarty->assign('loggeado',$loggeado);
    $this->smarty->display('templates/pedidos.tpl');
  }

public function mostrarError($msgError) {
    echo "<h1>ERROR!</h1>";
    echo "<h2>{$msgError}</h2>";
}

public function mostrarEditarPedido($pedido,$id) {
    $this->smarty->assign('titulo',"editar pedidos");
    $this->smarty->assign('pedido',$pedido);
    $this->smarty->assign('id',$id);
    $this->smarty->display('templates/editarPedido.tpl');
}  

public function mostrarDetallePedido($pedido) {
    $this->smarty->assign('titulo',"editar pedido");
    $this->smarty->assign('pedido',$pedido);
    $this->smarty->display('templates/detallePedido.tpl');
}  
}
?>
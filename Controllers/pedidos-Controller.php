<?php 
include_once('Models/pedidos-Model.php');
include_once('Views/productos-View.php');
include_once('Views/pedidos-View.php');
include_once('Controllers/productos-Controller.php');
include_once('Controllers/login-Controller.php');

class PedidosController {
    private $pedidosModel;
    private $pedidosView;
    private $productosController;
    private $session;

    public function __construct() {
    $this->pedidosModel = new PedidosModel ();
    $this->productosModel = new ProductosModel ();
    $this->productosController = new ProductosController ();
    $this->pedidosView = new PedidosView ();
    $this->session = new LoginController();
    } 


    public function mostrarPedidosOrdenados() {
        $pedidos = $this->pedidosModel->getPedidosOrdenados();
        $productos = $this->productosModel->getProductos();
        $loggeado = $this->session->checkLoggedIn();
        $this->pedidosView->mostrarPedidos($pedidos,$productos,$loggeado);
    }

    public function mostrarPedidos() {
        $pedidos = $this->pedidosModel->getPedidos();
        $productos = $this->productosModel->getProductos();
        $loggeado = $this->session->checkLoggedIn();
        $this->pedidosView->mostrarPedidos($pedidos,$productos,$loggeado);
    }


    

    public function cargaPedidos () {
        $cliente = $_GET["inputName"] . " ". $_GET["inputLastname"] ;
        $direccion = $_GET["inputAddress"];
        $producto =  $_GET["inputPedido"];
        $cantidad =  $_GET["inputCantidad"];
        if (!empty($cliente) && !empty($direccion) && !empty($producto) && !empty($cantidad)) {
            $this->pedidosModel->addPedido($cliente,$direccion,$producto,$cantidad);
            header("Location: " . PEDIDOS);
        } else 
        {  header("location: mostrarProductos");
        }
}


    public function borrarPedido($params = null) {
        $id = $params[':ID'];
        $this->pedidosModel->borrarPedido($id);
        header("Location: " . PEDIDOS);
    }

    public function detallePedido ($params=null) {
        $id = $params[':ID'];
        $pedido = $this->pedidosModel->getPedido($id);
        if ($pedido)
            $this->pedidosView->mostrarDetallePedido($pedido);
    }  

    public function editarPedido ($params = null) {
        $id = $params[':ID'];
        $pedido = $this->pedidosModel->getPedido($id);
        $this->pedidosView->mostrarEditarPedido($pedido,$id);
    }


    public function pedidoEditado () {
        $cliente = $_GET["nombrePedidoEditado"];
        $direccion = $_GET["direccionPedidoEditado"];
        $cantidad = $_GET["cantidadPedidoEditado"];
        $entregado = $_GET["entregadoPedidoEditado"];
        $id = $_GET["idPedidoEditado"];
        if (!empty($cliente) && !empty($direccion) && !empty($cantidad)) {
            $this->pedidosModel->agregaPedidoEditado($cliente,$direccion,$cantidad,$entregado,$id);
            header("Location: " . PEDIDOS);
        } else 
        {  
        }
    }

}




?>
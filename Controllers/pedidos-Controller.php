<?php 
include_once('Models/pedidos-Model.php');
include_once('Views/productos-View.php');
include_once('Views/pedidos-View.php');
include_once('Helpers/sessionHelper.php');

class PedidosController {
    private $pedidosModel;
    private $pedidosView;
    private $productosModel;
    private $permiso;
    private $administrador;

    public function __construct() {
    $this->pedidosModel = new PedidosModel ();
    $this->productosModel = new ProductosModel ();
    $this->pedidosView = new PedidosView ();
    $sessionHelper = new SessionHelper();
    $this->permiso = $sessionHelper->checkPermiso();
    $this->administrador = $sessionHelper->checkAdministrador();
    } 


    public function mostrarPedidosOrdenados() {
        $pedidos = $this->pedidosModel->getPedidosOrdenados();
        $productos = $this->productosModel->getProductos();
        $this->pedidosView->mostrarPedidos($pedidos,$productos,$this->permiso);
    }

    public function mostrarPedidos() {
        $pedidos = $this->pedidosModel->getPedidos();
        $productos = $this->productosModel->getProductos();
        $this->pedidosView->mostrarPedidos($pedidos,$productos,$this->permiso);
    }


    

    public function cargaPedidos () {
        $cliente = $_GET["inputName"] . " ". $_GET["inputLastname"] ;
        $direccion = $_GET["inputAddress"];
        $producto =  $_GET["inputPedido"];
        $cantidad =  $_GET["inputCantidad"];
        if (!empty($cliente) && !empty($direccion) && !empty($producto) && !empty($cantidad)) {
            $this->pedidosModel->addPedido($cliente,$direccion,$producto,$cantidad);
            header("Location: " . PEDIDOS);
        } else {  
            $this->pedidosView->mostrarError("Faltan campos obligatorios");
        }
}


    public function borrarPedido($params = null) {
        if ($this->permiso) {
        $id = $params[':ID'];
        $this->pedidosModel->borrarPedido($id);
        header("Location: " . PEDIDOS);
    }
    }

    public function detallePedido ($params=null) {
        $id = $params[':ID'];
        $pedido = $this->pedidosModel->getPedido($id);
        if ($pedido)
            $this->pedidosView->mostrarDetallePedido($pedido);
    }  

    public function editarPedido ($params = null) {
        if ($this->permiso) {
            $id = $params[':ID'];
            $pedido = $this->pedidosModel->getPedido($id);
            $this->pedidosView->mostrarEditarPedido($pedido,$id);
        }
    }


    public function pedidoEditado () {
        if ($this->permiso) {
        $cliente = $_POST["nombrePedidoEditado"];
        $direccion = $_POST["direccionPedidoEditado"];
        $cantidad = $_POST["cantidadPedidoEditado"];
        $entregado = $_POST["entregadoPedidoEditado"];
        $id = $_POST["idPedidoEditado"];
        if (!empty($cliente) && !empty($direccion) && !empty($cantidad)) {
            if($_FILES['imagenPedido']['type'] == "image/jpg" || $_FILES['imagenPedido']['type'] == "image/jpeg" 
        || $_FILES['imagenPedido']['type'] == "image/png" ) { 
            $this->pedidosModel->agregaPedidoEditado($cliente,$direccion,$cantidad,$entregado,$_FILES['imagenPedido'],$id);
            header("Location: " . PEDIDOS);
        } else { $this->pedidosModel->agregaPedidoEditado($cliente,$direccion,$cantidad,$entregado,null,$id);
            header("Location: " . PEDIDOS);}
        } else {   
            $this->pedidosView->mostrarError("Faltan campos obligatorios");
        }
    }
    }

    public function borrarImagen($params = null) {
        if ($this->administrador) {
        $id = $params[':ID'];
        $pedido = $this->pedidosModel->getPedido($id);
        unlink($pedido->imagen);
        $this->pedidosModel->borrarImagen($id);

        header("Location: " . PEDIDOS);
    }
    }

}




?>
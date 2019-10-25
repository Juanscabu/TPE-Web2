<?php 
include_once('Models/pedidos-Model.php');
include_once('Views/productos-View.php');
include_once('Controllers/productos-Controller.php');

class PedidosController {
    private $pedidosModel;
    private $pedidosView;
    private $productosController;

    public function __construct() {
    $this->pedidosModel = new PedidosModel ();
    $this->productosModel = new ProductosModel ();
    $this->productosController = new ProductosController ();
    $this->pedidosView = new View ();
    } 

    public function mostrarPedidos() {
        $pedidos = $this->pedidosModel->getPedidos();
        $productos = $this->productosModel->getProductos();
        $this->pedidosView->mostrarPedidos($pedidos,$productos);
    }

    

    public function cargaPedidos () {
        $nombre = $_GET["inputName"] . " ". $_GET["inputLastname"] ;
        $direccion = $_GET["inputAddress"];
        $producto =  $_GET["inputPedido"];
        $cantidad =  $_GET["inputCantidad"];
        if (!empty($nombre) && !empty($direccion) && !empty( $producto) && !empty( $cantidad)) {
            $this->pedidosModel->addPedido($nombre,$direccion,$producto,$cantidad);
            header("location: mostrarPedidos");
            die();
        } else 
        {  header("location: mostrarProductos");
        }

   
}

public function editarPedidos () {
        
}  


}




?>
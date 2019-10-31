<?php
include_once('Models/productos-Model.php');
include_once('Views/productos-View.php');
include_once('Controllers/login-Controller.php');

class ProductosController{
    
    private $model;
    private $productosView;
    private $session;

    public function __construct() {
        $this->model = new ProductosModel();
        $this->productosView = new ProductosView();
        $this->session = new LoginController();
    }

    public function mostrarProductos() {
        $productos = $this->model->getProductos();
        $loggeado = $this->session->checkLoggedIn();
        $this->productosView->mostrarProductos($productos,$loggeado);
    }



    public function cargaProductos () {
        $nombre = $_POST["nombreProducto"];
        $descripcion = $_POST["descripcionProducto"];
        $precio = $_POST["precioProducto"];
        if (!empty($nombre) && !empty($descripcion) && !empty($precio)) {
            $this->model->addProducto($nombre,$descripcion,$precio);
            header("Location: " . PRODUCTOS);
        } else {  
        $this->productosView->mostrarError("Faltan campos obligatorios");
        }
    }

    public function editarProducto ($params = null) {
        $id = $params[':ID'];
        $producto = $this->model->getProducto($id);
        $this->productosView->mostrarEditarProducto($producto,$id);
    }

    public function productoEditado () {
        $nombre = $_GET["nombreProductoEditado"];
        $descripcion = $_GET["descripcionProductoEditado"];
        $precio = $_GET["precioProductoEditado"];
        $id = $_GET["idProductoEditado"];
        if (!empty($nombre) && !empty($descripcion) && !empty($precio)) {
            $this->model->agregaProductoEditado($nombre,$descripcion,$precio,$id);
            header("Location: " . PRODUCTOS);
        } else { 
            $this->productosView->mostrarError("Faltan campos obligatorios");
        }
    }

        public function borrarProducto($params = null) {
        $id = $params[':ID'];
        $this->model->borrarProducto($id);
        header("Location: " . PRODUCTOS);
    }



}
?>
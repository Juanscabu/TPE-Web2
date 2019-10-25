<?php
include_once('Models/productos-Model.php');
include_once('Views/productos-View.php');
include_once('Controllers/login-Controller.php');

class ProductosController{
    
    private $model;
    private $view;
    private $session;

    public function __construct() {
        $this->model = new ProductosModel();
        $this->view = new View();
        $this->session = new LoginController();
    }

    public function mostrarProductos() {
        $productos = $this->model->getProductos();
        $loggeado = $this->session->checkLoggedIn();
        $this->view->mostrarProductos($productos,$loggeado);
    }


    public function cargaProductos () {
        $nombre = $_POST["nombreProducto"];
        $descripcion = $_POST["descripcionProducto"];
        $precio = $_POST["precioProducto"];
        if (!empty($nombre) && !empty($descripcion) && !empty($precio)) {
            $this->model->addProducto($nombre,$descripcion,$precio);
            header("Location: HOME");
            die();
        } else 
        {  $this->view->showError("Faltan datos obligatorios");

        }
    }

    public function editarProducto () {
        $id = $params[0];
        $producto = $this->model->getProducto($id);
        $this->view->mostrarEditarProducto($producto);
    }

    public function productoEditado () {
        $nombre = $_GET["NombreProductoEditado"];
        $descripcion = $_GET["descripcionProductoEditado"];
        $precio = $_GET["precioProductoEditado"];
        if (!empty($nombre) && !empty($descripcion) && !empty($precio)) {
            $this->model->agregaProductoEditado($nombre,$descripcion,$precio);
            header("Location: HOME");
           die();
        } else 
        {  $this->view->showError("Faltan datos obligatorios");

        }
    }
      

}
?>
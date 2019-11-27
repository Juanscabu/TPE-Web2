<?php
include_once('Models/productos-Model.php');
include_once('Views/productos-View.php');
include_once('Helpers/sessionHelper.php');

class ProductosController{
    
    private $model;
    private $productosView;
    private $permiso;

    public function __construct() {
        $this->model = new ProductosModel();
        $this->productosView = new ProductosView();
        $sessionHelper = new SessionHelper();
        $this->permiso = $sessionHelper->checkPermiso();
    }

    public function mostrarProductos() {
        $productos = $this->model->getProductos();
        $this->productosView->mostrarProductos($productos,$this->permiso);
    }

    public function cargaProductos () {
        if ($this->permiso) {
        $nombre = $_POST["nombreProducto"];
        $descripcion = $_POST["descripcionProducto"];
        $precio = $_POST["precioProducto"];
        if (!empty($nombre) && !empty($descripcion) && !empty($precio)) {
          $this->model->addProducto($nombre,$descripcion,$precio);
          header("Location: " . PRODUCTOS);
        }
     else {  
        $this->productosView->mostrarError("Faltan campos obligatorios");
        }
   }
    }

    public function editarProducto ($params = null) {
        if ($this->permiso) {
        $id = $params[':ID'];
        $producto = $this->model->getProducto($id);
        $this->productosView->mostrarEditarProducto($producto,$id);
        }
    }

    public function productoEditado () {
        if ($this->permiso) {
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
    }

        public function borrarProducto($params = null) {
        if ($this->permiso) {
        $id = $params[':ID'];
        $this->model->borrarProducto($id);
        header("Location: " . PRODUCTOS);
    }
}



}
?>
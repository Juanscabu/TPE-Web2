<?php
include_once('Tpe_Model/tp-Model.php');
include_once('Tpe_View/tp.View.php');

class TpeController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new TpeModel();
        $this->view = new TpeView();
    }

    public function mostrarProductos() {
        $productos = $this->model->getProductos();
        $this->view->mostrarProductos($productos);
    }
}
?>
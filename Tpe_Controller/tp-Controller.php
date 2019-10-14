<?php
include_once('models/task.model.php');
include_once('views/task.view.php');

include_once ('prueba.php');

$productos = getProductos();

foreach($productos as $producto) {
    echo $producto->nombre;
}



?>
<?php
    require_once('Controllers/productos-Controller.php');
    require_once('Controllers/pedidos-Controller.php');
    require_once('Controllers/login-Controller.php');
    require_once('Router.php');


    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", BASE_URL . 'login');
    define("HOME", BASE_URL . 'home');

    $r = new Router();
   
    $r->addRoute("verifica", "POST", "LoginController", "verificaUsuario");
    $r->addRoute("enviarPedido", "GET", "PedidosController", "cargaPedidos");
    $r->addRoute("addProducto", "POST", "ProductosController", "cargaProductos");
    $r->addRoute("logout", "GET", "LoginController", "logout");
    $r->addRoute("home", "GET", "ProductosController", "mostrarProductos");
    $r->addRoute("login", "GET", "PedidosController", "mostrarPedidos");
    $r->addRoute("mostrarProductos", "GET", "ProductosController", "mostrarProductos");
    $r->addRoute("mostrarPedidos", "GET", "PedidosController", "mostrarPedidos");
    $r->addRoute("editarProducto/2", "GET", "ProductosController", "editarProducto");
    $r->addRoute("productoEditado", "GET", "ProductosController", "productoEditado");
    $r->addRoute("borrarProducto", "GET", "ProductosController", "borrarProducto");
   
    $r->setDefaultRoute("PedidosController", "mostrarPedidos");
    $r->route($_GET["action"], $_SERVER['REQUEST_METHOD']); 

?>

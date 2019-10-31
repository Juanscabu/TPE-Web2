<?php
    require_once('Controllers/productos-Controller.php');
    require_once('Controllers/pedidos-Controller.php');
    require_once('Controllers/login-Controller.php');
    require_once('Controllers/home-Controller.php');
    require_once('Router.php');


    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("PEDIDOS", BASE_URL . 'mostrarPedidos');
    define("PRODUCTOS", BASE_URL . 'mostrarProductos');
    define("HOME", BASE_URL . 'mostrarHome');

    $r = new Router();
   
    $r->addRoute("verifica", "POST", "LoginController", "verificaUsuario");
    $r->addRoute("enviarPedido", "GET", "PedidosController", "cargaPedidos");
    $r->addRoute("addProducto", "POST", "ProductosController", "cargaProductos");
    $r->addRoute("logout", "GET", "LoginController", "logout");
    $r->addRoute("mostrarHome", "GET", "HomeController", "mostrarHome");
    $r->addRoute("login", "GET", "PedidosController", "mostrarPedidos");
    $r->addRoute("mostrarProductos", "GET", "ProductosController", "mostrarProductos");
    $r->addRoute("mostrarPedidos", "GET", "PedidosController", "mostrarPedidos");
    $r->addRoute("editarPedido/:ID", "GET", "PedidosController", "editarPedido");
    $r->addRoute("pedidoEditado", "GET", "PedidosController", "pedidoEditado");
    $r->addRoute("editarProducto/:ID", "GET", "ProductosController", "editarProducto");
    $r->addRoute("productoEditado", "GET", "ProductosController", "productoEditado");
    $r->addRoute("borrarProducto/:ID", "GET", "ProductosController", "borrarProducto");
    $r->addRoute("detallePedido/:ID", "GET", "PedidosController", "detallePedido");
    $r->addRoute("borrarPedido/:ID", "GET", "PedidosController", "borrarPedido");
    $r->addRoute("mostrarPedidosOrdenados", "GET", "PedidosController", "mostrarPedidosOrdenados");
    
   
    $r->setDefaultRoute("HomeController", "mostrarHome");
    $r->route($_GET["action"], $_SERVER['REQUEST_METHOD']); 

?>

<?php
    require_once('Router.php');
    require_once('./api/comentarios.api.controller.php');
    
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $router = new Router();

    $router->addRoute("/comentarios/:ID", "GET", "ComentariosApiController", "getComentarios");
    $router->addRoute("/comentarios/:ID", "DELETE", "ComentariosApiController", "borrarComentario");
    $router->addRoute("/comentarios", "POST", "ComentariosController", "addComentario");
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 
?>
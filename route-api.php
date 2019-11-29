<?php
    require_once('Router.php');
    require_once('./api/comentarios-api-Controller.php');
    
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $router = new Router();

    $router->addRoute("/comentarios/:ID", "GET", "ComentariosApiController", "getComentarios");
    $router->addRoute("/comentarios/:ID", "DELETE", "ComentariosApiController", "borrarComentario");
    $router->addRoute("/comentarios/:ID", "POST", "ComentariosApiController", "agregaComentario");
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 
?>
Como poner botones para editar o deletear R) agregarle un link al button
como mostrar la pagina del administrador R) usar botones o template que se muestran si esta loggeado
Tengo que separar mas el MVC ? R) si una clase para pedidos, otra para productos y otra para usuarios
Ordenero los items desde el model o con algo del controller? R) con el controller
detalle del item, que quiere decir? R) que muestre mas detalles en otra pagina o con un template


Como llamar al model de otro controlador ?
como hacer varios views?problema con smarty
preguntar si esta bien la variable?


Preguntar como se hace el update de un producto?
Como paso el id del producto en la url?
Como controlo si edito o borro un producto no se rompa pedidos?

En donde poner el template del home?? // home controller
como paso el id del producto que edito al controller que lo manda a la base de datos?? // input escondido de id
Como es la entrega? //git 
Esta bien que el editar sea solamente poner entregado?? //Edicion completa 
Esta bien que este al reves el detalle?? // no, cambiarlo
Ordenar por categoria lo hago desde la base de datos, lo cambio o esta bien asi? //separar pedidos por producots o mostrar pedidos de ciertos
Como paso la base de datos para la entrega? Como inicio la base de datos?
Acomodar los else de las cosas !!!

Borrar no redirecciona bien
ordenar desde el controller

Tabla de usuarios y administradores?? o una sola con boolean de si es administrador o no;
Porque va el if antes de la imagen en el Model? si lo saco me anda.

//GET API /comentarios ? id= producto = X

Productos/2/comentarios
fetch (aps/productos/8/comentarios,function(e))

Route php
$router->add(get, productos/:id/comentarios, productosApiController,mostrarComentarios)

Productos APIcontroller extends APIController 

function mostrarComentarios ($params) {
$id = $params[":ID"];
$comentarios = $this->ModelComentarios->>getComentarios($id);
$this->View->response($comentarios,Poo)
}

ComentariosModel

getComentarios ($id)
$this->db->prepare("SELECT FROM comentarios WHERE id_Producto = ?")

usar input escondido para pasar id del usuario que comenta y producto


Como organizo el login, helper?
Esta bien como estoy preguntando?
No me carga la imagen en la carpeta asignada
Como muestro el view de los comentarios?

 <button class="btn btn-primary" v-on:click="ordenar">Ordenar Puntaje</button>
              <button class="btn btn-primary" v-on:click="ordenar">Ordenar Usuario</button> 
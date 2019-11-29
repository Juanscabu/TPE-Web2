<?php
require_once("./models/comentarios-Model.php");
require_once("./api/json-view.php");
include_once('Helpers/sessionHelper.php');

class ComentariosApiController {

    private $comentariosModel;
    private $comentariosView;
    private $data;
    private $permiso;
    private $administrador;

    public function __construct() {
        $this->comentariosModel = new ComentariosModel();
        $this->comentariosView = new JSONView();
        $this->data = file_get_contents("php://input");
        $sessionHelper = new SessionHelper();
        $this->permiso = $sessionHelper->checkPermiso();
        $this->administrador = $sessionHelper->checkAdministrador();
    }


    private function getData() {
        return json_decode($this->data);
    }

    public function  getComentarios($params = null) {
        
        $id = $params[":ID"];
        $comentarios = $this->comentariosModel->getComentarios($id);
        $this->comentariosView->response($comentarios,200);
    }


    public function borrarComentario($params = null) {
        if ($this->administrador) {
        $id = $params[':ID'];
        $comentario = $this->comentariosModel->getComentario($id);
        if ($comentario) {
            $this->comentariosModel->delete($id);
            $this->comentariosView->response("El comentario fue borrado con exito.", 200);
        } else {
            $this->comentariosView->response("El comentario no existe", 404);
        }
    }
    }

    public function agregaComentario($params = null) {
        if ($this->permiso) {
        $comentarioAgregado = $this->getData();
        $id = $this->comentariosModel->agregarComentario($comentarioAgregado->comentario,$comentarioAgregado->puntaje,$comentarioAgregado->id_usuario,$comentarioAgregado->id_pedido);
        $nuevoComentario = $this->comentariosModel->get($id);
        if ($nuevoComentario) {
            $this->comentariosView->response($nuevoComentario, 200);
        }
        else {
            $this->comentariosView->response("el comentario no fue creado", 500);
        }

    }
}
}
?>


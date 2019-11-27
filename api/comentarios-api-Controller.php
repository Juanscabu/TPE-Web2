<?php
require_once("./models/task.model.php");
require_once("./api/json.view.php");

class ComentariosApiController {

    private $comentariosModel;
    private $comentariosView;
    private $data;

    public function __construct() {
        $this->comentariosModel = new ComentariosModel();
        $this->comentariosView = new JSONView();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function  getComentarios($params = null) {
        $id = $params[":ID"];
        $comentarios = $this->comentariosModel->getComentarios($id);
        $this->comentariosView->response($comentarios,Poo);
    }


    public function borrarComentario($params = null) {
        $id = $params[':ID'];
        $comentario = $this->comentariosModel->get($id);
        if ($comentario) {
            $this->comentariosModel->delete($id);
            $this->comentariosView->response("El comentario fue borrado con exito.", 200);
        } else
            $this->comentariosView->response("El comentario no existe", 404);
    }

    public function agregarComentario($params = null) {
        $data = $this->getData();

        $id = $this->comentariosModel->save(//);
        
        $comentario = $this->comentariosModel->get($id);
        if ($comentario)
            $this->comentariosView->response($comentario, 200);
        else
            $this->comentariosView->response("el comentario no fue creado", 500);

    }
}
?>


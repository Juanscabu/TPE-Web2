<?php

class ComentariosModel {

    private $db;

public function __construct() {
    $this->db = new PDO('mysql:host=localhost;dbname=db_negocio;charset=utf8', 'root', '');
    }


    function getComentarios($id) {
        $sentencia = $this->db->prepare('SELECT * FROM comentarios WHERE id_pedido = ?');
        $sentencia->execute(array($id));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getComentario($id) {
        $sentencia = $this->db->prepare('SELECT * FROM comentarios WHERE id_comentario = ?');
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    
    function agregarComentario ($comentario,$puntaje,$id_usuario, $id_pedido) {
        $sentencia = $this->db->prepare('INSERT INTO comentarios (comentario,puntaje,id_usuario,id_pedido) VALUES(?,?,?,?)');
        $sentencia->execute(array($comentario,$puntaje,$id_usuario,$id_pedido));
        return $this->db->lastInsertId();
    }

    public function borrarComentario($id) {
        $sentencia = $this->db->prepare('DELETE FROM comentarios WHERE id_comentario = ?' );
        $sentencia->execute(array($id));
        }
    

}
?>
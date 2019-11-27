<?php

class ComentariosModel {

    private $db;

public function __construct() {
    $this->db = new PDO('mysql:host=localhost;dbname=db_negocio;charset=utf8', 'root', '');
    }


    function getComentarios($id) {
        $sentencia = $this->db->prepare('SELECT * FROM comentarios WHERE id_producto = ?');
        $sentencia->execute($id);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    
    function agregarComentario ($cliente,$direccion,$producto,$cantidad) {
        $sentencia = $this->db->prepare('INSERT INTO comentarios (cliente,direccion,id_producto,cantidad) VALUES(?,?,?,?)');
        $sentencia->execute(array($cliente,$direccion,$producto,$cantidad));
    }

    public function borrarPedido($id) {
        $sentencia = $this->db->prepare('DELETE FROM comentarios WHERE pedidos.id_pedido = ?' );
        $sentencia->execute(array($id));
        }
    }

}
?>
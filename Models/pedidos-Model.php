<?php 
class PedidosModel {
   private $db;

public function __construct() {
    $this->db = new PDO('mysql:host=localhost;dbname=db_negocio;charset=utf8', 'root', '');
    }


function getPedidos() {
    $sentencia = $this->db->prepare('SELECT pedidos.*,productos.nombre FROM pedidos INNER JOIN productos ON pedidos.id_producto = productos.id_producto');
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
}

function getPedidosOrdenados() {
    $sentencia = $this->db->prepare('SELECT pedidos.*,productos.nombre FROM pedidos INNER JOIN productos ON pedidos.id_producto = productos.id_producto ORDER BY id_producto asc');
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
}

function getPedido ($id) {
    $sentencia = $this->db->prepare('SELECT pedidos.*, productos.nombre FROM pedidos INNER JOIN productos ON pedidos.id_producto = productos.id_producto where id_pedido= ?');
    $sentencia->execute(array($id));
    return $sentencia->fetch(PDO::FETCH_OBJ);
}

function addPedido ($cliente,$direccion,$producto,$cantidad) {
    $sentencia = $this->db->prepare('INSERT INTO pedidos (cliente,direccion,id_producto,cantidad) VALUES(?,?,?,?)');
    $sentencia->execute(array($cliente,$direccion,$producto,$cantidad));
}


function  agregaPedidoEditado ($cliente,$direccion,$cantidad,$entregado,$id) {
        $sentencia = $this->db->prepare('UPDATE pedidos SET cliente=?,direccion=?,cantidad=?,entregado=? WHERE id_pedido = ?' );
        $sentencia->execute(array($cliente,$direccion,$cantidad,$entregado,$id));
    }    

public function borrarPedido($id) {
    $sentencia = $this->db->prepare('DELETE FROM pedidos WHERE pedidos.id_pedido = ?' );
    $sentencia->execute(array($id));
    }
}

?>
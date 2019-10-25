<?php 
class PedidosModel {
   private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_negocio;charset=utf8', 'root', '');
        }


function getPedidos() {
    $sentencia = $this->db->prepare('SELECT * FROM pedidos ORDER BY producto asc');
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
}

function addPedido ($nombre,$direccion,$producto,$cantidad) {
    $sentencia = $this->db->prepare('INSERT INTO pedidos (nombre,direccion,producto,cantidad) VALUES(?,?,?,?)');
    $sentencia->execute(array($nombre,$direccion,$producto,$cantidad));
}

function editarPedido() {

}
}

?>
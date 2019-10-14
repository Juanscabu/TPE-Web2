<?php
class TpeModel {
    private $db;

public function __construct() {
    $this->db = new PDO('mysql:host=localhost;dbname=db_tareas;charset=utf8', 'root', '');
    }

function getProductos() {
        $sentencia = $this->$db->prepare('SELECT * FROM productos ORDER BY nombre asc');
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }


}

?>
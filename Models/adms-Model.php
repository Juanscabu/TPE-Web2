<?php 
class AdmsModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_negocio;charset=utf8', 'root', '');
    }

    function getUsuario($usuario) {
        $sentencia = $this->db->prepare('SELECT * FROM administradores WHERE usuario = ?');
        $sentencia->execute(array($usuario));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

}
?>
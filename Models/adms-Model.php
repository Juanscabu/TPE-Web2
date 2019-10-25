<?php 
class AdmsModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_negocio;charset=utf8', 'root', '');
    }

    function getUsuario($username) {
        $query = $this->db->prepare('SELECT * FROM administradores WHERE usuario = ?');
        $query->execute(array($username));
        return $query->fetch(PDO::FETCH_OBJ);
    }

}
?>
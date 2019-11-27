<?php 
class UsuariosModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_negocio;charset=utf8', 'root', '');
    }

    function getUsuario($usuario) {
        $sentencia = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $sentencia->execute(array($usuario));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function getUsuarios() {
        $sentencia = $this->db->prepare('SELECT * FROM usuarios');
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function registrarUsuario($usuario,$contraseña) {
        $sentencia = $this->db->prepare('INSERT INTO usuarios(usuario,contraseña)  VALUES(?,?)');
        $sentencia->execute(array($usuario,$contraseña));
    }

    function  agregaUsuarioEditado ($permiso,$id) {
        $sentencia = $this->db->prepare('UPDATE usuarios SET permiso=? WHERE id_usuario = ?' );
        $sentencia->execute(array($permiso,$id));
    }

      
    public function borrarUsuario($id) {
        $sentencia = $this->db->prepare('DELETE FROM usuarios WHERE id_usuario= ?');
        $sentencia->execute(array($id));
        }
}
?>
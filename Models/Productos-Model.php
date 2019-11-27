<?php
class ProductosModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_negocio;charset=utf8', 'root', '');
        }

    function getProductos() {
            $sentencia = $this->db->prepare('SELECT * FROM productos ORDER BY nombre asc');
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }


    function getProducto ($id) {
            $sentencia = $this->db->prepare('SELECT * FROM productos where id_producto= ?');
            $sentencia->execute(array($id));
            return $sentencia->fetch(PDO::FETCH_OBJ);
        }
    function addProducto ($nombre,$descripcion,$precio) {
        $sentencia = $this->db->prepare('INSERT INTO productos(nombre,descripcion,precio) VALUES(?,?,?)');
        $sentencia->execute(array($nombre,$descripcion,$precio));
    }

    function  agregaProductoEditado ($nombre,$descripcion,$precio,$id) {
        $sentencia = $this->db->prepare('UPDATE productos SET nombre=?,descripcion=?,precio=? WHERE id_producto = ?' );
        $sentencia->execute(array($nombre,$descripcion,$precio,$id));
    }

      
    public function borrarProducto($id) {
        $sentencia = $this->db->prepare('DELETE FROM productos WHERE productos.id_producto = ?' );
        $sentencia->execute(array($id));
        }

   
}
?>
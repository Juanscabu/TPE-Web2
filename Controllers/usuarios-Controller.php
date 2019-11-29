<?php 
include_once('Models/usuarios-Model.php');
include_once('Views/usuarios-view.php');
include_once('Helpers/sessionHelper.php');

class UsuariosController {

    private $usuariosModel;
    private $usuariosView;
    private $sessionHelper;
    private $administrador;

    public function __construct() {
        $this->usuariosModel = new UsuariosModel();
        $this->usuariosView = new  UsuariosView();
        $this->sessionHelper = new SessionHelper();
        $this->administrador = $this->sessionHelper->checkAdministrador();
    }

        
    public function verificaUsuario() {
        $usuario = $_POST['username'];
        $password = $_POST['password'];
        $user = $this->usuariosModel->getUsuario($usuario);
        if (!empty($user) && password_verify($password, $user->contraseña)) {
            $this->sessionHelper->login($user);
            header("Location: " . HOME);
            
        } else {
        }
    }

    public function registrarUsuario() {
        $usuario = $_POST['username'];
        $password = password_hash( $_POST['password'], PASSWORD_DEFAULT);
            $this->usuariosModel->registrarUsuario($usuario,$password);
            $this->sessionHelper->login($usuario);
            header("Location: " . HOME);
    }

    public function logout() {
        $this->sessionHelper->logout();
        header('Location: ' . HOME);
    }

    public function mostrarUsuarios (){
        $usuarios = $this->usuariosModel->getUsuarios();
        $this->usuariosView->mostrarUsuarios($usuarios);
    }

    public function borrarUsuario($params = null) {
        if ($this->administrador) {
        $id = $params[':ID'];
        $this->usuariosModel->borrarUsuario($id);
        header("Location: " . HOME);
    }
    }

    public function editarUsuario ($params = null) {
        if ($this->administrador) {
            $user = $params[':USUARIO'];
            $usuario = $this->usuariosModel->getUsuario($user);
            $id = $usuario->id_usuario;
            $this->usuariosView->mostrarEditarUsuario($usuario,$id);
        }
    }

    public function usuarioEditado () {
        if ($this->administrador) {
        $permiso = $_GET["permisoEditado"];
        $id = $_GET["idUsuarioEditado"];
            $this->usuariosModel->agregaUsuarioEditado($permiso,$id);
            header("Location: " . HOME);
    }
    }
}
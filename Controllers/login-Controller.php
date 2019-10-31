<?php 
include_once('Models/adms-Model.php');

class LoginController {

  
    private $view;
    private $model;

    public function __construct() {
        $this->model = new AdmsModel();
    }

    public function checkLoggedIn() {
        session_start();
        if (!isset($_SESSION['ID_USER'])) {
            return false;
        }  else {return true;}
    }
        
    public function verificaUsuario() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = $this->model->getUsuario($username);
        if (!empty($user) && password_verify($password, $user->contraseña)) {
            $this->login($user);
            header("Location: " . HOME);
        } else {
          
        }
    }

    public function login($user) {
        session_start();
        $_SESSION['ID_USER'] = $user->id;
        $_SESSION['USERNAME'] = $user->usuario;
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . HOME);

    } 


}


?>

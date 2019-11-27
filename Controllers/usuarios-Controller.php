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

    public function olvideMiContraseña (){
            if(!empty($_POST['email'])){
               $usuario = $this->usuariosModel->getUsuario($mail);
                    if (isset($usuario)) {     
                        $to = $usuario->mail;
                        $subject = "Reseteo de Password";
                        /*
                        $mailContent = 'Hola, '. $usuario->usuario;
                        '<br/>Se solicito reestablecer la contraseña de tu cuenta. Si fue un error ignora este mail.
                        <br/>Para reestablecer tu contraseña, visita el siguiente link: <a href="formularioContraseña/$usuario->usuario"</a>
                        <br/>Saludos<br/>'
                        $headers = "MIME-Version: 1.0" . "rn";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "rn";
                        $headers .= 'From: Tu<[email protected]>' . "rn";
                        mail($to,$subject,$mailContent,$headers);
                                   */          
            }
        }
    }
          
    public function formularioContraseña() {
        $this->usuariosView->formularioContraseña();
        }
    
    
    /*public function cambiarContraseña
    
    header("Location:forgotPassword.php");
        }elseif(isset($_POST['resetSubmit'])){
            $fp_code = '';
            if(!empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['fp_code'])){
                $fp_code = $_POST['fp_code'];
                //password and confirm password comparison
                if($_POST['password'] !== $_POST['confirm_password']){
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Confirm password must match with the password.'; 
                }else{
                    //check whether identity code exists in the database
                    $prevCon['where'] = array('forgot_pass_identity' => $fp_code);
                    $prevCon['return_type'] = 'single';
                    $prevUser = $user->getRows($prevCon);
                    if(!empty($prevUser)){
                        //update data with new password
                        $conditions = array(
                            'forgot_pass_identity' => $fp_code
                        );
                        $data = array(
                            'password' => md5($_POST['password'])
                        );
                        $update = $user->update($data, $conditions);
                        if($update){
                            $sessData['status']['type'] = 'success';
                            $sessData['status']['msg'] = 'Your account password has been reset successfully. Please login with your new password.';
                        }else{
                            $sessData['status']['type'] = 'error';
                            $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                        }
                    }else{
                        $sessData['status']['type'] = 'error';
                        $sessData['status']['msg'] = 'You does not authorized to reset new password of this account.';
                    }
                }
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields.'; 
            }
            //store reset password status into the session
            $_SESSION['sessData'] = $sessData;
            $redirectURL = ($sessData['status']['type'] == 'success')?'index.php':'resetPassword.php?fp_code='.$fp_code;
            //redirect to the login/reset pasword page
            header("Location:".$redirectURL);
        }
    } 

*/
}
?>

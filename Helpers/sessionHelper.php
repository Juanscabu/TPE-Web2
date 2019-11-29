<?php

class SessionHelper {
    public function __construct() {
        session_start();
    }

    public function login($user) {
       
        $_SESSION['ID_USER'] = $user->id_usuario;
        $_SESSION['USERNAME'] = $user->usuario;
        $_SESSION['PERMISO'] = $user->permiso;
        $_SESSION['ADMINISTRADOR'] = $user->administrador;
        
    }

    public function logout() {
        session_destroy();
    }

    public function checkLoggeado() {
        if (isset($_SESSION['ID_USER'])) 
            return true;
            else
                return false;
    }

    public function checkAdministrador() {

        if (isset($_SESSION['ID_USER'])) {
            if ($_SESSION['ADMINISTRADOR'])
            return true;
            else {
                return false;
            }
        }       
        return false;
    }

    public function checkPermiso() {
        if (isset($_SESSION['ID_USER'])) {
            if ($_SESSION['PERMISO'])
            return true;
            else
                return false;
        }       
        return false;
    }

    public function getLoggedUserName() {
        if (session_status() != PHP_SESSION_ACTIVE)
        return $_SESSION['USERNAME'];
    }

    public function getIdUsuario() {
        if (isset($_SESSION['ID_USER'])) {
        return $_SESSION['ID_USER'];
        }
    }
}

<?php

class AuthHelper {

    public function loguear($usuario) {
        // INICIO LA SESSION Y LOGUEO AL USUARIO
         session_start();
        $_SESSION['ID_USER'] = $usuario->id;
        $_SESSION['USERNAME'] = $usuario->username;
        $_SESSION['ROL']=$usuario->rol;
    

    }

    public function desloguear(){
        $_SESSION['ROL']='usuario';
        unset($_SESSION);
        session_destroy();
    
    }


    function chequearSesion() {
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
          }
    }
        
    
   
     function chequearAdmin(){
        if($_SESSION['rol']=="admin"){
            return true;
        }
        else{
            return false;
        }
    } 
} 
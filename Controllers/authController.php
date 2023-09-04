<?php
require_once 'libs/Smarty.class.php';
require_once 'Models\authModel.php';
require_once 'helpers/authHelper.php';
class authController
{
    private $smarty;
    private $modelo;
    private $authHelper;

    function __construct()
    {
        $this->smarty = new Smarty();
        $this->modelo = new authModel();
        $this->authHelper=new authHelper();
    }

    function iniciarSesion()
    {
        echo 'llegue a iniciar sesion';
        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];
        $user = $this->modelo->obtenerUsuario($usuario);
         $usuario1=$user;
        if (!$user = null && password_verify($contrasenia, $user->pass)) {
            session_start();
          $_SESSION['ID_USER'] = $usuario1->id;
            $_SESSION['USERNAME'] = $usuario1->username;
            $_SESSION['ROL']=$usuario1->rol;
            header('location:'.BASE_URL);
        } else {
      
           header("location:".BASE_URL."vinilos");
            die();
        }
    }
   

    function registro()
    {
        $this->modelo->registro();
    }

    function mostrarRegistro()
    {
        $this->smarty->display('register.tpl');
    }

   function mostrarLogin(){
    $this->smarty->display("login.tpl");
   }
}

<?php
require_once 'Controllers\indexController.php';
require_once 'Controllers\vinilosController.php';
require_once 'Controllers\formController.php';
require_once 'Controllers\authController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
// leemos la accion que viene por parametro
$action = 'inicio'; // acción por defecto

if (!empty($_GET['action'])) { // si viene definida la reemplazamos
    $action = $_GET['action'];
}

//inicializo los controladores para posteriormente llamarlos en el switch.
$formController= new formularioController();
$indexController = new indexController();
$vinilosController = new vinilosController();
$authController=new authController();
// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);


switch ($params[0]) {
    case 'inicio':
        $indexController->mostrarInicio();
        break;
    case 'vinilos':
        if(!isset($params[1])){   
             $vinilosController->mostrarVinilos();
        }
    elseif(isset($params[1])&&isset($params[2]) ){
        if($params[2]=="eliminar"){
            $vinilosController->borrarVinilo($params[1]);
        }
        else if($params[2]=="editar"){
            $vinilosController->mostrarForm($params[1]);
        }
    }
        
       else{
            $vinilosController->obtenerVinilo($params[1]);
        }
        break;
    case 'form':
        $vinilosController->mostrarForm();
        break;
    case 'insert':
        $vinilosController->añadirVinilo();
        header("Location:".BASE_URL."vinilos");
        break;
    case 'actualizar':
        $vinilosController->actualizarVinilo($params[1]);
        header("Location:".BASE_URL."vinilos");
        break;
    case 'iniciarsesion':
        $authController->mostrarLogin();
        break;
    case 'iniciars':
        $authController->iniciarSesion();
        break;
    case 'registrarse':
        $authController->mostrarRegistro();
        break;
    case 'Registrar':
        $authController->registro();
        header("location:".BASE_URL."vinilos");
        break;
    case 'desloguearse':
        $authController->desloguearse();
        break;
    default:
        echo 'error 404';
}

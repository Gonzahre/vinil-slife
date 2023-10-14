<?php
require_once 'Controllers\indexController.php';
require_once 'Controllers\vinilosController.php';
require_once 'Controllers\authController.php';
require_once 'Controllers/autoresController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
// leemos la accion que viene por parametro
$action = 'inicio'; // acción por defecto

if (!empty($_GET['action'])) { // si viene definida la reemplazamos
    $action = $_GET['action'];
}

//inicializo los controladores para posteriormente llamarlos en el switch.
$indexController = new indexController();
$vinilosController = new vinilosController();
$authController = new authController();
$autoresController = new autoresController();
// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);


switch ($params[0]) {
    case 'inicio':
        $indexController->mostrarInicio();
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
        header("location:" . BASE_URL . "vinilos");
        break;
    case 'desloguearse':
        $authController->desloguearse();
        break;
    case 'vinilos':
        if (!isset($params[1])) {
            $vinilosController->mostrarVinilos();
        } 
        elseif (isset($params[1]) && !isset($params[2]) && $params[1] == "añadir") {
        $vinilosController->mostrarForm();
        }
        elseif (isset($params[1]) && !isset($params[2]) && $params[1] == "aniadir") {
            $vinilosController->añadirVinilo();
            header("Location:" . BASE_URL . "vinilos");
        } 
        elseif (isset($params[1]) && isset($params[2]) && $params[1] == "editar") {
            $vinilosController->actualizarVinilo($params[2]);
            header("Location:" . BASE_URL . "vinilos");
        } elseif (isset($params[1]) && isset($params[2]) && $params[1] == "filtrar") {
            $vinilosController->mostrarFiltro($params[2]);
        } elseif (isset($params[1]) && isset($params[2])) {
            if ($params[2] == "eliminar") {
                $vinilosController->borrarVinilo($params[1]);
            } else if ($params[2] == "editar") {
                $vinilosController->mostrarForm($params[1]);
            }
        } else {
            $vinilosController->obtenerVinilo($params[1]);
        }
        break;
    case 'autores':
        if (!isset($params[1])) {
            $autoresController->mostrarAutores();
        } 
        elseif (isset($params[1]) && !isset($params[2]) && $params[1] == "añadir"){
            $autoresController->mostrarForm();}

        elseif (isset($params[1]) && !isset($params[2]) && $params[1] == "aniadir"){
            $autoresController->aniadirAutor();
            header("Location:" . BASE_URL . "autores");
        }
         
            elseif (isset($params[1]) && isset($params[2]) && $params[1] == "editar"){
            $autoresController->actualizarAutor($params[2]);
            header("Location:" . BASE_URL . "autores");}
          
        elseif (isset($params[1]) && isset($params[2])) {
            if ($params[2] == "eliminar") {
                $autoresController->borrarAutor($params[1]);
            } else if ($params[2] == "editar") {
                $autoresController->mostrarForm($params[1]);
            }
        } else {
            $autoresController->mostrarAutor($params[1]);
        }
        break;
    default:
        echo 'error 404';
}

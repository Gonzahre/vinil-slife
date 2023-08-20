<?php
require_once 'Controllers\indexController.php';
require_once 'Controllers\vinilosController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
// leemos la accion que viene por parametro
$action = 'home'; // acción por defecto

if (!empty($_GET['action'])) { // si viene definida la reemplazamos
    $action = $_GET['action'];
}
$indexController=new indexController();
// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);
$vinilosController=new vinilosController();
switch($params[0]){
    case 'inicio':
        $indexController->mostrarInicio();
        break;
    case 'vinilos':
        $vinilosController->mostrarVinilos();
        break;
}
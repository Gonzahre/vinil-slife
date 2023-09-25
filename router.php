<?php
require_once 'libs/Router.php';
require_once 'api/Controllers/vinilosApiController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$Router=new Router();

//$Router->setDefaultRoute();
//$Router->addRoute()
$Router->setDefaultRoute('vinilosApiController', 'obtenerVinilos');
$Router->addRoute("categorias", "GET", "categoriasApiController", "obtenerCategorias");
$Router->addRoute("vinilos", "GET", "vinilosApiController", "obtenerVinilos");
$Router->addRoute("vinilos/:ID", "GET", "vinilosApiController", "obtenerVinilos");
$Router->addRoute("vinilos/:ID", "DELETE", "vinilosApiController", "eliminarVinilo");
$Router->addRoute("vinilos/:ID", "PUT", "vinilosApiController", "editarVinilo");
$Router->addRoute("vinilos", "POST", "vinilosApiController", "aniadirVinilo");

//rutea
$Router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
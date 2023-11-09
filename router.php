<?php
require_once 'libs/Router.php';
require_once 'api/Controllers/vinilosApiController.php';
require_once 'api/Controllers/autoresApiController.php';
require_once 'api/Controllers/authApiController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$Router=new Router();

//$Router->setDefaultRoute();
//$Router->addRoute()
$Router->setDefaultRoute('vinilosApiController', 'obtenerVinilos');
//$Router->addRoute("categorias", "GET", "categoriasApiController", "obtenerCategorias");
$Router->addRoute('vinilos/filtro', 'GET', 'vinilosApiController', 'filtrarporcampos');
$Router->addRoute("vinilos", "GET", "vinilosApiController", "obtenerVinilos");
$Router->addRoute("vinilos/:ID", "GET", "vinilosApiController", "obtenerVinilos");
$Router->addRoute("vinilos/:ID", "DELETE", "vinilosApiController", "eliminarVinilo");
//(Parece haber problemas de una parte del router hacia abajo).
$Router->addRoute("vinilos/:ID", "PUT", "vinilosApiController", "editarVinilo");
$Router->addRoute("vinilos", "POST", "vinilosApiController", "aniadirVinilo");
$Router->addRoute('vinilos/ordenar/:CAMPO', 'GET', 'vinilosApiController', 'ordenarPorCampo');

$Router->addRoute('auth/token', 'GET', 'AuthApiController', 'getToken');


$Router->addRoute("autores", "GET", "autoresApiController", "obtenerAutores");
$Router->addRoute("autores/:ID", "GET", "autoresApiController", "obtenerAutores");
$Router->addRoute("autores/:ID", "DELETE", "autoresApiController", "eliminarAutor");
$Router->addRoute("autores/:ID", "PUT", "autoresApiController", "editarAutor");
$Router->addRoute("autores/:ID", "PATCH", "autoresApiController", "editarAutor");
$Router->addRoute("autores", "POST", "autoresApiController", "aniadirAutor");

//rutea
$Router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
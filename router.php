<?php
require_once 'libs/Router.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$Router=new Router();

//$Router->setDefaultRoute();
//$Router->addRoute()
$Router->addRoute("categorias", "GET", "categoriasApiController", "obtenerCategorias");
$Router->addRoute("vinilos", "GET", "vinilosApiController", "obtenerVinilos");

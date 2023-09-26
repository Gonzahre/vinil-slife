<?php

require_once 'Models/autoresModel.php';
require_once 'libs/Smarty.class.php';
require_once 'Models/vinilosModel.php';

class autoresController{

    private $model;
    private $smarty;
    private $modelVinilos;

    function __construct(){
        $this->smarty=new Smarty();
        $this->model=new autoresModel();
        $this->modelVinilos=new vinilosModel();
    }

    function mostrarAutores(){
        $autores=$this->model->obtenerAutores();
        $this->smarty->assign('autores', $autores);
        $this->smarty->display('autores.tpl');

    }

    function mostrarAutor($id){
        $autor=$this->model->obtenerAutor($id);
        $vinilos=$this->modelVinilos->obtenerVinilosPorAutor($id);
        $this->smarty->assign('autor', $autor);
        $this->smarty->assign('vinilos', $vinilos);
        $this->smarty->display('autor.tpl');
    }

}
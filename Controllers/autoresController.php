<?php

require_once 'Models/autoresModel.php';
require_once 'libs/Smarty.class.php';
require_once 'Models/vinilosModel.php';

class autoresController{

    private $model;
    private $smarty;
    private $modelVinilos;
    private $authHelper;

    function __construct(){
        $this->smarty=new Smarty();
        $this->model=new autoresModel();
        $this->modelVinilos=new vinilosModel();
        $this->authHelper=new AuthHelper();
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
    function aniadirAutor(){
        $this->model->aniadirAutor();
    }

    function actualizarAutor($id)
    {
        $this->model->actualizarAutor($id);
    }

    function borrarAutor($id)
    {
        $this->authHelper->chequearSesion();
        if (isset($_SESSION['ROL']) && $_SESSION['ROL'] == "admin") {
            $autor = $this->model->obtenerAutor($id);
            if ($autor!=null) {
                $siElimino=$this->model->eliminarAutor($id);
              if($siElimino!=null){
                echo 'El autor tiene vinilos asociados, pruebe borrando los vinilos primero';
              }
              else{
                header("Location:".BASE_URL."autores");
              }
            }
      
        } else {
            header("Location:" . BASE_URL . "iniciarsesion");
        }
    }

    function mostrarForm($id = null)
    {

        if (isset($_SESSION['ROL']) && $_SESSION['ROL'] = "admin") {
            if ($id == null) {
                $autor = null;
                echo $id;
                $this->smarty->assign("autor", $autor);
                $this->smarty->display('insertAutor.tpl');
            } else {
                echo $id;
                $autor = $this->model->obtenerAutor($id);
                $this->smarty->assign("autor", $autor);
                $this->smarty->display('insertAutor.tpl');
            }
        }
    }
}
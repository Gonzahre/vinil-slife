<?php

require_once 'libs\Smarty.class.php';
require_once 'Models\vinilosModel.php';
require_once 'Models\autoresModel.php';

class vinilosController
{
    private $model;
    private $smarty;
    private $autoresModel;

    function __construct()
    {
        $this->smarty = new Smarty();
        $this->model = new vinilosModel();
        $this->autoresModel=new autoresModel();
    }

    function borrarVinilo($id){
        echo "LA ID ES:".$id;
        $disco=$this->model->obtenerVinilo($id);
        if(!empty($disco)){
            $this->model->borrarVinil($id);
        }
    else{ 
     header("Location:".BASE_URL."vinilos");
    }
       
    }

    function obtenerVinilo($id)
    {
        $vinilo = $this->model->obtenerVinilo($id);
       
        $autor=$this->autoresModel->obtenerAutor($vinilo->idAutor);
        echo "El autor es: ". $autor->nombreAutor;
        $this->smarty->assing("autor", $autor);
     
        $this->smarty->assign("vinilo", $vinilo);
        $this->smarty->display("vinilo.tpl");
    }

    function añadirVinilo()
    {
        $this->model->añadirVinilo();
    }

    function mostrarVinilos()
    {
        $vinilos = $this->model->obtenerVinilos();
        $this->smarty->assign("vinilos", $vinilos);
        $this->smarty->display('vinilos.tpl');
    }
}

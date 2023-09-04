<?php

require_once 'libs\Smarty.class.php';
require_once 'Models\vinilosModel.php';
require_once 'Models\autoresModel.php';
require_once 'helpers/authHelper.php';

class vinilosController
{
    private $modelo;
    private $smarty;
    private $autoresModel;
    private $authHelper;

    function __construct()
    {
        $this->smarty = new Smarty();
        $this->modelo = new vinilosModel();
        $this->autoresModel=new autoresModel();
        $this->authHelper=new AuthHelper();
    }

    function borrarVinilo($id){
        echo "LA ID ES:".$id;
        $disco=$this->modelo->obtenerVinilo($id);
        if(!empty($disco)){
            $this->modelo->borrarVinil($id);
        }
    else{ 
     header("Location:".BASE_URL."vinilos");
    }
       
    }

    function obtenerVinilo($id)
    {
        $vinilo = $this->modelo->obtenerVinilo($id);
        $autor=$this->autoresModel->obtenerAutor($vinilo->idAutor);
   
        $this->smarty->assign("vinilo", $vinilo);
        $this->smarty->assign("autor", $autor);
        $this->smarty->display("vinilo.tpl");
    }

    function añadirVinilo()
    {
        $this->modelo->añadirVinilo();
    }

    function mostrarVinilos()
    {
        $this->authHelper->desloguear();
        $vinilos = $this->modelo->obtenerVinilos();
        $this->smarty->assign("vinilos", $vinilos);
        $this->smarty->display('vinilos.tpl');
    }
}

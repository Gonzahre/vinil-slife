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
        $this->authHelper->chequearSesion();
        if($_SESSION['ROL']){
        $disco=$this->modelo->obtenerVinilo($id);
        if(!empty($disco)){
            $this->modelo->borrarVinil($id);
        }}
    else{ 
     header("Location:".BASE_URL."vinilos");
    }}

    function actualizarVinilo($id){
        $this->modelo->actualizarVinilo($id);
  
    }

    function obtenerVinilo($id)
    {
        $vinilo = $this->modelo->obtenerVinilo($id);

        if($vinilo!=null){
            
        $this->smarty->assign("vinilo", $vinilo);

        $this->smarty->display("vinilo.tpl");

        }
    }

    function añadirVinilo()
    {
        $this->modelo->añadirVinilo();
    }

    function mostrarVinilos()
    {
        $vinilos = $this->modelo->obtenerVinilos();
        $this->smarty->assign("vinilos", $vinilos);
        $this->smarty->display('vinilos.tpl');
    }

    function mostrarForm($id=null)
    {
        $autores=$this->autoresModel->obtenerAutores();
        if($id==null){
            $vinilo=null;
            $this->smarty->assign("autores, $autores");
            $this->smarty->assign("vinilo", $vinilo);
            $this->smarty->display('insert.tpl');
        }
       else{
        $vinilo=$this->modelo->obtenerVinilo($id);
        $this->smarty->assign("vinilo", $vinilo);
        $this->smarty->display('insert.tpl');
       }
    }
}

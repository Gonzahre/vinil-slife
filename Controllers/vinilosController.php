<?php

require_once 'libs\Smarty.class.php';
require_once 'Models\vinilosModel.php';

class vinilosController
{
    private $model;
    private $smarty;
    function __construct()
    {
        $this->smarty = new Smarty();
        $this->model=new vinilosModel();
    }

    function mostrarVinilos()
    {
        $vinilos=$this->model->obtenerVinilos();
        $this->smarty->assign("vinilos", $vinilos);
        $this->smarty->display('vinilos.tpl');
    }
}

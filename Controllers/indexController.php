<?php
require_once 'libs/Smarty.class.php';
class indexController{
    private $smarty;

    function __construct(){
        $this->smarty=new Smarty();
    }

    function mostrarInicio(){
        $this->smarty->display('index.tpl');
    }
}
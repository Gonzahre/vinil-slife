<?php
require_once 'libs/Smarty.class.php';
require_once 'helpers\authHelper.php';

class indexController
{
    private $smarty;
    private $authHelper;


    function __construct()
    {
        $this->smarty = new Smarty();
        $this->authHelper = new authHelper();
        $this->authHelper->chequearSesion();
    }

    function mostrarInicio()
    {
            $this->smarty->display('index.tpl');
        
    }
}

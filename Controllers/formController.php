<?php
require_once 'libs/Smarty.class.php';
class formularioController
{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function mostrarForm()
    {
        $this->smarty->display('insert.tpl');
    }
}
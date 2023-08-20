<?php
require_once 'Views\indexView.php';
class indexController{
    private $view;
    function __construct(){
        $this->view=new indexView();
    }

    function mostrarInicio(){
        $this->view->showIndex();
    }
}
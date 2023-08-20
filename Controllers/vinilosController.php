<?php

require_once 'Views\vinilosView.php';
class vinilosController{
    private $view;
    function __construct(){
        $this->view=new vinilosView();
    }

    function mostrarVinilos(){
        $this->view->showVinilos();
    }
}
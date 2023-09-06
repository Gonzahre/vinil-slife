<?php
require_once 'Models/vinilosApiModel.php';
class vinilosApiController{

    private $model;
    
    function __construct(){
        $this->model=new vinilosApiModel();
    }
    function obtenerVinilos(){
    $this->model->obtenerVinilos();
    
    }


}
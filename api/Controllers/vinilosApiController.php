<?php
require_once 'api\Models\vinilosApiModel.php';
require_once 'api\Views\apiView.php';
class vinilosApiController{

    private $model;
    private $view;
    
    function __construct(){
        $this->model=new vinilosApiModel();
        $this->view=new apiView();
    }


    
    
    function obtenerVinilos($params = null){
       
        if(empty($params)){
            $Vinilos = $this->model->obtenerVinilos();
            return $this->view->response($Vinilos,200);
      
          }
          else {
            echo 'hi';
            echo $params[":ID"];
            $vinilo = $this->model->obtenerVinilo($params[":ID"]);
            if(!empty($vinilo)) {
              return $this->view->response($vinilo,200);
            }
          
          }
    
    }


}
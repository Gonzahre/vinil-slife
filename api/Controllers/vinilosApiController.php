<?php
require_once 'api\Models\vinilosApiModel.php';
require_once 'api\Views\apiView.php';
class vinilosApiController{

    private $model;
    private $view;
    private $data;
    
    public function __construct(){
        $this->model=new vinilosApiModel();
        $this->view=new apiView();
        $this->data = file_get_contents("php://input");
    }


    
    public function getData()
    {
      $this->data = file_get_contents("php://input");
      return json_decode($this->data);
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

    


  public function aniadirVinilo(){
    $data=$this->getData();
    if($data!=null){
    $id=$this->model->guardarVinilo($data->imagen, $data->nombreDisco, $data->fechaDisco, $data->idAutor);
    $vinilo=$this->model->obtenerVinilo($id);
    $this->view->response($vinilo,201);

      }  }
}
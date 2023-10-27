<?php
require_once 'api\Models\autoresApiModel.php';
require_once 'api\Views\apiView.php';
class autoresApiController{

    private $model;
    private $view;
    private $data;
    
    public function __construct(){
        $this->model=new autoresApiModel();
        $this->view=new apiView();
        $this->data = file_get_contents("php://input");
    }


    
    public function getData()
    {
      $this->data = file_get_contents("php://input");
      return json_decode($this->data);
    }


    function eliminarAutor($params=null){
      if(!empty($params[":ID"])){
        $vinilo=$this->model->obtenerAutor($params[":ID"]);
        $this->model->eliminarAutor($params[":ID"]);
        $this->view->response($vinilo,200);
      }
    }
    
    function obtenerAutores($params = null){
       
        if(empty($params)){
            $autores = $this->model->obtenerAutores();
            return $this->view->response($autores,200);
      
          }
          else {
            $autor = $this->model->obtenerAutor($params[":ID"]);
            if(!empty($autor)) {
              return $this->view->response($autor,200);
            }
          
          }
    
    }

    


  public function aniadirAutor(){
    $data=$this->getData();
    if($data!=null){
    $id=$this->model->guardarAutor($data->Imagen, $data->nombreAutor, $data->anioAutor);
    $autor=$this->model->obtenerAutor($id);
    $this->view->response($autor,201);

      }  }

  public function editarAutor($params = null){
    $data=$this->getData();
    if($data!=null && !empty($params[":ID"])){
      $this->model->editarAutor($data->Imagen, $data->nombreAutor, $data->anioAutor, $params[":ID"]);
      $autor=$this->model->obtenerAutor($params[":ID"]);
      $this->view->response($autor,201);
    }
}
}
<?php
require_once 'api\Models\autoresApiModel.php';
require_once 'api\Helper\authApiHelper.php';
require_once 'api\Views\apiView.php';
class autoresApiController
{

  private $model;
  private $AuthAPIhelper;
  private $view;
  private $data;

  public function __construct()
  {
    $this->model = new autoresApiModel();
    $this->AuthAPIhelper = new AuthApiHelper();
    $this->view = new apiView();
    $this->data = file_get_contents("php://input");
  }



  public function getData()
  {
    $this->data = file_get_contents("php://input");
    return json_decode($this->data);
  }


  function eliminarAutor($params = null)
  {
    if ($this->AuthAPIhelper->isLoggedIn()) {
      if (!empty($params[":ID"])) {
        $vinilo = $this->model->obtenerAutor($params[":ID"]);
        $this->model->eliminarAutor($params[":ID"]);
        $this->view->response($vinilo, 200);
      }
    } else {
      $this->view->response("Debes loguearte primero", 401);
    }
  }

  function obtenerAutores($params = null)
  {

    if (empty($params)) {
      $autores = $this->model->obtenerAutores();
      return $this->view->response($autores, 200);
    } else {
      $autor = $this->model->obtenerAutor($params[":ID"]);
      if (!empty($autor)) {
        return $this->view->response($autor, 200);
      }
    }
  }




  public function aniadirAutor()
  {
    if ($this->AuthAPIhelper->isLoggedIn()) {
      $data = $this->getData();
      if ($data != null) {
        $id = $this->model->guardarAutor($data->Imagen, $data->nombreAutor, $data->anioAutor);
        $autor = $this->model->obtenerAutor($id);
        $this->view->response($autor, 201);
      }
      else{
        $this->view->response("Datos mal cargados", 401);
      }
    } else{
      $this->view->response("Debes loguearte primero", 401);
    }
  }

  public function editarAutor($params = null){
    if ($this->AuthAPIhelper->isLoggedIn()) {
      $data = $this->getData();
      if ($data != null && !empty($params[":ID"])) {
        $this->model->editarAutor($data->Imagen, $data->nombreAutor, $data->anioAutor, $params[":ID"]);
        $autor = $this->model->obtenerAutor($params[":ID"]);
        $this->view->response($autor, 201);
      }
    } else {
      $this->view->response("Debes loguearte primero", 401);
    }
  }

  public function filtrarporcampos($params = null)
  {
    if (isset($_GET['nombre'])) {
      $nombreAutor = $_GET['nombre'];
      $nombreAutor = preg_replace('([^A-Za-z])', '', $nombreAutor);
      $nombreAutor = "$nombreAutor%";
    } else {
      $nombreAutor = null;
    }
    if (isset($_GET['anio'])) {
      if (is_numeric($_GET['anio'])) {
        $anio =  filter_var($_GET['anio'], FILTER_SANITIZE_NUMBER_INT);
        $anio = "$anio%";
      } else {
        $anio = null;
      }
    } else {
      $anio = null;
    }
    $autores = $this->model->filtrarPorCampos($nombreAutor, $anio);

    if (!$autores == []) {
      return $this->view->response($autores, 200);
    } else {
      return $this->view->response("Not found", 404);
    }
  }

  public function ordenarPorCampo($params = null)
  {
    
    if (isset($_GET['order']) && !(is_numeric($_GET['order']))) {
      $orden = $_GET['order'];
    
      if ($orden == "ASC" || $orden == "asc") {
        $orden = "ASC";
      } else {
        $orden = "DESC";
      }

      switch ($params[":CAMPO"]) {
        case "nombre":
          $autores = $this->model->ordenarAutores("db_autor.nombreAutor", $orden);
          return $this->view->response($autores, 200);
          break;
       
        case "anio":
          $autores = $this->model->ordenarAutores("db_autor.anioAutor", $orden);
          return $this->view->response($autores, 200);
          break;
        default:
          return $this->view->response("Bad Request", 400);
          break;
      }
    } else {

      return $this->view->response("Bad Request", 400);
    }
  }
}

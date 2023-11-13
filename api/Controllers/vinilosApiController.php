<?php
require_once 'api\Models\vinilosApiModel.php';
require_once 'api\Helper\authApiHelper.php';
require_once 'api\Views\apiView.php';
require_once 'api\Helper\authApiHelper.php';

class vinilosApiController
{

  private $model;
  private $view;
  private $data;
  private $AuthAPIhelper;

  public function __construct()
  {
    $this->model = new vinilosApiModel();
    $this->view = new apiView();
    $this->AuthAPIhelper = new AuthApiHelper();
    $this->data = file_get_contents("php://input");
  }



  public function getData()
  {
    $this->data = file_get_contents("php://input");
    return json_decode($this->data);
  }


  function obtenerVinilos($params = null)
  {

    if (empty($params)) {
      $Vinilos = $this->model->obtenerVinilos();
      return $this->view->response($Vinilos, 200);
    } else {
      $vinilo = $this->model->obtenerVinilo($params[":ID"]);
      if (!empty($vinilo)) {
        return $this->view->response($vinilo, 200);
      }
    }
  }


  public function filtrarporcampos($params = null)
  {

    if (isset($_GET['nombre'])) {
      $nombreDisco = $_GET['nombre'];
      $nombreDisco = preg_replace('([^A-Za-z])', '', $nombreDisco);
      $nombreDisco = "$nombreDisco%";
    } else {
      $nombreDisco = null;
    }
    if (isset($_GET['autor'])) {
      $autor = $_GET['autor'];
      $autor = preg_replace('([^A-Za-z])', '', $autor);
      $autor = "$autor%";
    } else {
      $autor = null;
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
    if (isset($_GET['genero'])) {
      $genero = $_GET['genero'];
      $genero = preg_replace('([^A-Za-z])', '', $genero);
      $genero = "$genero%";
      echo $genero;
    } else {
      $genero = null;
    }
    $vinilos = $this->model->filtrarPorCampos($nombreDisco, $autor, $anio, $genero);

    if (!$vinilos == []) {
      return $this->view->response($vinilos, 200);
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
          $vinilos = $this->model->ordenarVinilos("db_discos.nombreDisco", $orden);
          return $this->view->response($vinilos, 200);
          break;
        case "autor":
          $vinilos = $this->model->ordenarVinilos("db_autor.nombreAutor", $orden);
          return $this->view->response($vinilos, 200);
          break;
        case "anio":
          $vinilos = $this->model->ordenarVinilos("db_discos.fechaDisco", $orden);
          return $this->view->response($vinilos, 200);
          break;
        case "genero":
          $vinilos = $this->model->ordenarVinilos("db_discos.genero", $orden);
          return $this->view->response($vinilos, 200);
          break;
        default:

          return $this->view->response("Bad Request", 400);
          break;
      }
    } else {

      return $this->view->response("Bad Request", 400);
    }
  }




  public function aniadirVinilo()
  {
    if ($this->AuthAPIhelper->isLoggedIn()) {
    $data = $this->getData();
    if ($data != null) {
      $id = $this->model->guardarVinilo($data->imagen, $data->nombreDisco, $data->fechaDisco, $data->idAutor);
      $vinilo = $this->model->obtenerVinilo($id);
      $this->view->response($vinilo, 201);
    }
    else{
      $this->view->response("Datos mal cargados", 401);
    }
  }
  else{
    $this->view->response("Debes loguearte primero", 401);
  }
  }

  function eliminarVinilo($params = null)
  {
    if ($this->AuthAPIhelper->isLoggedIn()) {
    if (!empty($params[":ID"])) {
      $vinilo = $this->model->obtenerVinilo($params[":ID"]);
      $this->model->eliminarVinilo($params[":ID"]);
      $this->view->response($vinilo, 200);
    }
  }
  else{
    $this->view->response("Debes loguearte primero", 401);
  }
  }

  function editarVinilo($params = null)
  {
    if ($this->AuthAPIhelper->isLoggedIn()) {
    $data = $this->getData();
    if ($data != null && !empty($params[":ID"])) {
      try {
        $this->model->editarVinilo($data->imagen, $data->nombreDisco, $data->fechaDisco, $data->genero, $data->idAutor, $params[":ID"]);
      } catch (error $e) {
        $vinilo = $this->model->obtenerVinilo($params[":ID"]);
        $this->view->response($vinilo, 201);
      }
    }
  }
else{
  $this->view->response("Debes loguearte primero", 401);
}
}
}

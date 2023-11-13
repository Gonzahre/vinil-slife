<?php
require_once 'api/Models/authModel.php';
require_once 'api/Helper/authApiHelper.php';

class AuthApiController {
    private $model;
    private $view;
    private $authHelper;
    private $data;

    public function __construct() {
        $this->view = new ApiView();
        $this->model=new authModel();
        $this->authHelper=new AuthApiHelper();

        // Lee el body del request
        $this->data = file_get_contents("php://input");
    }

    public function getToken() {
        $basic = $this->authHelper->getAuthHeader();
        if(empty($basic)){
            $this->view->response('No autorizado', 401);
            return;
        };
        $basic = explode(" ",$basic);
        if($basic[0]!="Basic"){
            $this->view->response('La autenticación debe ser Basic', 401);
            return;
        };

        $userpass = base64_decode($basic[1]);
        $userpass = explode(":", $userpass);
        $user = $userpass[0];
        $pass = $userpass[1];
        $userdb=$this->model->buscarUsuario($user);
        if($userdb!=null){
        if(password_verify($pass, $userdb->pass)){
            $header = array(
                'alg' => 'HS256',
                'typ' => 'JWT'
            );
            $payload = array(
                'id' => 1,
                'name' => "Admin",
                'exp' => time()+3600
            );
            $header =$this->base64UrlEncode(json_encode($header));
            $payload =$this->base64UrlEncode(json_encode($payload));
            $signature = hash_hmac('SHA256', "$header.$payload", "Clave1234", true);
            $signature =$this->base64UrlEncode($signature);
            $token = "$header.$payload.$signature";
             $this->view->response($token,200);
        } else {
            $this->view->response('No autorizado', 401);
        };}
        else{
            $this->view->response('No se encontró un usuario con el nombre proporcionado', 404);
        }
    }

    private function base64UrlEncode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
}

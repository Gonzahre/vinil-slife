<?php
class authModel{
    private $dbname = "vinyls";
    function conectar(){
        $db = new PDO('mysql:host=localhost;' . 'dbname=' . $this->dbname . ';charset=utf8', 'root', '');
        return $db;
    }

    function buscarUsuario($nombre){
            $_con = $this->conectar();
            $sentencia = $_con->prepare('SELECT * FROM usuarios where username=?');
            $sentencia->execute([$nombre]);
            $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
            return $usuario; 
    }
}
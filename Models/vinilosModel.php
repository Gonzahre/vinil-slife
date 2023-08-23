<?php
class vinilosModel{
    private $host="localhost";
    private $dbname="vinyls";

    function conectar(){
    try{
        $db = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8'
        , 'root', '');
        return $db;
    }
    catch(exception $e){
        error_log(...);
        return null;
    }
    }

    function obtenerVinilos(){
        $_con=$this->conectar();
        $sentencia=$_con->prepare("SELECT * FROM db_discos");
        $sentencia->execute();
        $vinilos=$sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vinilos;
    }
}
<?php
class autoresModel{
    private $host="localhost";
    private $dbname="vinyls";

    function conectar(){
        try{ $db = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8'
            , 'root', '');
        return $db;}

       catch(exception $e){
        error_log(...);
        return null;
       }

    }

    function obtenerAutores(){
        $_con=$this->conectar();
        $sentencia=$_con->prepare("SELECT * FROM db_autor");
        $sentencia->execute();
        $autores=$sentencia->fetchAll(PDO::FETCH_OBJ);
        return $autores;
    }

    function obtenerAutor($id){
        $_con=$this->conectar();
        $sentencia=$_con->prepare("SELECT * FROM db_autor where id=?");
        $sentencia->execute([$id]);
        $autor=$sentencia->fetchAll(PDO::FETCH_OBJ);
        return $autor;
    }
}
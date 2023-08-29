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

    function borrarVinil($id){
        try{
        $_con=$this->conectar();
        $sentencia = $_con->prepare('DELETE FROM db_discos WHERE id=?');
        $sentencia->execute([$id]);
      /*  $sentencia=$_con->prepare("DELETE FROM db_discos where id=?");
        $sentencia->execute([$id]);*/
    }
        catch(Exception $e){
            $error = $e->getMessage();
            return $error;
        }
    }

    function obtenerVinilo($id){
        $_con=$this->conectar();
        $sentencia=$_con->prepare("SELECT * FROM db_discos where id=?");
        $sentencia->execute([$id]);
        $vinilo=$sentencia->fetch(PDO::FETCH_OBJ);
        return $vinilo;
    }

    function añadirVinilo(){

         $db = $this->conectar();
        $sentencia = $db->prepare("INSERT INTO db_discos(nombreDisco, fechaDisco, idAutor, imagen) VALUES(?,?,?,?)");
        
        $sentencia->execute(array($_POST['nombreV'],$_POST['añoV'], $_POST['idA'], $_POST['imagen']));
        header("Location: inicio");
    
    }

    function actualizarVinilo(){
        $db=$this->conectar();
        $sentencia = $this->$db->prepare("UPDATE db_discos SET nombreV=?,`añoV`=?,`idAutor`=? WHERE id=?");
        
    }
}
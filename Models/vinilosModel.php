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
        return null;
    }
    }

    function obtenerVinilos(){
        $_con=$this->conectar();
        $sentencia=$_con->prepare("SELECT * FROM db_discos JOIN db_autor ON db_discos.idAutor = db_autor.id");
        $sentencia->execute();
        $vinilos=$sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vinilos;
    }

    
    function obtenerVinilo($id){
        $_con=$this->conectar();
        $sentencia=$_con->prepare("SELECT * FROM db_discos JOIN db_autor ON db_discos.idAutor = db_autor.id WHERE idVin=?;");
        $sentencia->execute([$id]);
        $vinilo=$sentencia->fetch(PDO::FETCH_OBJ);
        return $vinilo;
        /* $aidi = (int)$id;
        $db = $this->conectar();
        $sentencia = $db->prepare("SELECT * FROM db_discos WHERE id=$aidi");
        $sentencia->execute();
        $vinilo = $sentencia->fetch(PDO::FETCH_OBJ);
        return $vinilo; */
    }

    function borrarVinil($id){
        try{
        $_con=$this->conectar();
        $sentencia = $_con->prepare('DELETE FROM db_discos where idVin=?');
        $sentencia->execute([$id]);
      /*  $sentencia=$_con->prepare("DELETE FROM db_discos where id=?");
        $sentencia->execute([$id]);*/
    }
        catch(Exception $e){
            $error = $e->getMessage();
            return $error;
        }
    }


    function añadirVinilo(){

         $db = $this->conectar();
        $sentencia = $db->prepare("INSERT INTO db_discos(nombreDisco, fechaDisco, idAutor, imagen) VALUES(?,?,?,?)");
        
        $sentencia->execute(array($_POST['nombreV'],$_POST['añoV'], $_POST['idA'], $_POST['imagen']));
        header("Location: inicio");
    
    }

    function actualizarVinilo($id){
        
        $db=$this->conectar();
        $nombreDisco=$_POST['nombreV'];
        $idAutor=$_POST['idA'];
        $fechaDisco=$_POST['añoV'];
        $imgDisco=$_POST['imagen'];
        $sentencia = $db->prepare("UPDATE `db_discos` SET `nombreDisco`=?, `fechaDisco`=?, `idAutor`=? WHERE idVin=$id");
        $sentencia->bindValue(1, $nombreDisco, PDO::PARAM_STR);
        $sentencia->bindValue(2, $fechaDisco, PDO::PARAM_STR);
        $sentencia->bindValue(3, $idAutor, PDO::PARAM_INT);
        $sentencia->execute();
    }
}
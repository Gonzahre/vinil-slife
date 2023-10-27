<?php
class vinilosApiModel
{
    private $db_name = 'vinyls';
    private $host = 'localhost';

    function conectar()
    {
        try {
            $_con = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name . ';charset=utf8;', 'root', '');

            return $_con;
        } catch (exception $e) {
            return null;
        }
    }

    function obtenerVinilos()
    {
        $db = $this->conectar();
        $sentencia = $db->prepare("SELECT * FROM db_discos");
        $sentencia->execute();
        $vinilos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vinilos;
    }

    function obtenerVinilo($id)
    {
        $aidi = (int)$id;
        $db = $this->conectar();
        $sentencia = $db->prepare("SELECT * FROM db_discos WHERE idVin=$aidi");
        $sentencia->execute();
        $vinilo = $sentencia->fetch(PDO::FETCH_OBJ);
        return $vinilo;
    }

    function eliminarVinilo($id){
        $_con=$this->conectar();
        $sentencia=$_con->prepare("DELETE from db_discos where idVin=?");
        $sentencia->execute([$id]);
    }

    function guardarVinilo($imagen, $nombreD, $fechaD, $autorD)
    {
        $_con=$this->conectar();
        $sentencia=$_con->prepare('INSERT INTO db_discos(imagen, nombreDisco, fechaDisco, idAutor) VALUES(?,?,?,?)');
        //$sentencia->execute([$imagen, $nombreD, $fechaD, $autorD]);
        $sentencia->execute([$imagen, $nombreD, $fechaD, $autorD]);
        return $_con->lastInsertId();
    }

    function editarVinilo($imagen, $nombreD, $fechaD, $genero, $autorD, $id){
        $_con=$this->conectar();
        $sentencia = $_con->prepare("UPDATE `db_discos` SET `imagen`=?, `nombreDisco`=?, `fechaDisco`=?, `genero`=?, `idAutor`=? WHERE idVin=?");
        $sentencia->execute([$imagen, $nombreD, $fechaD, $genero, $autorD, $id]);
        
    }
}

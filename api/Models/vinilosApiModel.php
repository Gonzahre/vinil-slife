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
        $sentencia = $db->prepare("SELECT * FROM db_discos WHERE id=$aidi");
        $sentencia->execute();
        $vinilo = $sentencia->fetch(PDO::FETCH_OBJ);
        return $vinilo;
    }

    function guardarVinilo($imagen, $nombreD, $fechaD, $autorD)
    {
        $_con=$this->conectar();
        $sentencia=$_con->prepare("INSERT INTO db_discos(imagen, nombreDisco, fechaDisco, idAutor) VALUES(?,?,?,2");
        //$sentencia->execute([$imagen, $nombreD, $fechaD, $autorD]);
        $sentencia->execute([$imagen, $nombreD, $fechaD, $autorD]);

    }
}

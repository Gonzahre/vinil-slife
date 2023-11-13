<?php

class autoresApiModel{
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

    function obtenerAutores()
    {
        $db = $this->conectar();
        $sentencia = $db->prepare("SELECT * FROM db_autor");
        $sentencia->execute();
        $autores = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $autores;
    }

    function obtenerAutor($id)
    {
        $aidi = (int)$id;
        $db = $this->conectar();
        $sentencia = $db->prepare("SELECT * FROM db_autor WHERE id=$aidi");
        $sentencia->execute();
        $autor = $sentencia->fetch(PDO::FETCH_OBJ);
        return $autor;
    }

    function guardarAutor($imagen, $nombreAutor, $anioautor){
        $_con=$this->conectar();
        $sentencia=$_con->prepare("INSERT into db_autor(Imagen, nombreAutor, anioAutor) VALUES(?,?,?)");
       $sentencia->execute([$imagen, $nombreAutor, $anioautor]);
        return $_con->lastInsertId();
    }

    function eliminarAutor($id){
        $_con=$this->conectar();
        $sentencia=$_con->prepare("DELETE from db_autor where id=?");
        $sentencia->execute([$id]);
    }

    function editarAutor($imagen, $nombreAutor, $anioautor, $id){
        $_con=$this->conectar();
        $sentencia = $_con->prepare("UPDATE `db_autor` SET `Imagen`=?, `nombreAutor`=?, `anioAutor`=? WHERE id=?");
        $sentencia->execute([$imagen, $nombreAutor, $anioautor, $id]);
        
    }

    function filtrarPorCampos($nombreAutor, $anio){

        $db=$this->conectar();
        $sentencia = $db->prepare('SELECT * FROM db_autor WHERE nombreAutor LIKE "'.$nombreAutor.'" OR anioAutor LIKE "'.$anio.'"');
        $sentencia->execute();
       
        $autores = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $autores;
    }
    function ordenarAutores($columna, $orden){
        $db=$this->conectar();
        $sentencia = $db->prepare('SELECT * FROM db_autor ORDER BY '.$columna.' '.$orden.'');
        $sentencia->execute();

        $autores = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $autores;
    }


}
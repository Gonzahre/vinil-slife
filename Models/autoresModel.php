<?php
class autoresModel
{
    private $host = "localhost";
    private $dbname = "vinyls";

    function conectar()
    {
        try {
            $db = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8',
                'root',
                ''
            );
            return $db;
        } catch (exception $e) {

            return null;
        }
    }

    function obtenerAutores()
    {
        $_con = $this->conectar();
        $sentencia = $_con->prepare("SELECT * FROM db_autor");
        $sentencia->execute();
        $autores = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $autores;
    }

    function obtenerAutor($id)
    {
        $_con = $this->conectar();
        $sentencia = $_con->prepare("SELECT * FROM db_autor where id=?");
        $sentencia->execute([$id]);
        $autor = $sentencia->fetch(PDO::FETCH_OBJ);
        return $autor;
    }

    function eliminarAutor($id)
    {
        try {
          
            $_con = $this->conectar();
            $sentencia = $_con->prepare('DELETE FROM db_autor where id=?');
            $sentencia->execute([$id]);
            /*  $sentencia=$_con->prepare("DELETE FROM db_discos where id=?");
        $sentencia->execute([$id]);*/
        } catch (Exception $e) {
            $error = $e->getMessage();
            return $error;
        }
    }

    function actualizarAutor($id)
    {
        $db = $this->conectar();
        $Imagen = $_POST['Imagen'];
        $nombreAutor = $_POST['nombreAutor'];
        $anioAutor = $_POST['anioAutor'];
        $sentencia = $db->prepare("UPDATE `db_autor` SET `Imagen`=?, `nombreAutor`=?, `anioAutor`=? WHERE id=$id");
        $sentencia->bindValue(1, $Imagen, PDO::PARAM_STR);
        $sentencia->bindValue(2, $nombreAutor, PDO::PARAM_STR);
        $sentencia->bindValue(3, $anioAutor, PDO::PARAM_INT);
        $sentencia->execute();
    }

    
    function aniadirAutor()
    {
        $db = $this->conectar();
        $sentencia = $db->prepare("INSERT INTO db_autor(Imagen, nombreAutor, anioAutor) VALUES(?,?,?)");
        $sentencia->execute(array($_POST['Imagen'], $_POST['nombreAutor'], $_POST['anioAutor']));
        header("Location: inicio");
    }
}

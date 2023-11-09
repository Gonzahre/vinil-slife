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

    public function filtrarPorCampos($nombre, $autor, $anio, $genero){
        $_con=$this->conectar();
        $sentencia = $_con->prepare('SELECT db_discos.*, db_autor.nombreAutor FROM db_discos JOIN db_autor ON db_discos.idAutor = db_autor.id WHERE db_discos.nombreDisco LIKE :nombre OR db_discos.fechaDisco LIKE :anio OR db_discos.genero LIKE :genero OR db_autor.nombreAutor LIKE :autor');
        $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $sentencia->bindParam(':anio', $anio, PDO::PARAM_INT);
        $sentencia->bindParam(':genero', $genero, PDO::PARAM_STR);
        $sentencia->bindParam(':autor', $autor, PDO::PARAM_STR);
        $sentencia->execute();
        echo $genero;
       
        $vinilos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vinilos;
     }

     public function ordenarVinilos($columna, $orden=null){
        $_con=$this->conectar();
        $sentencia = $_con->prepare('SELECT  db_discos.*, db_autor.nombreAutor FROM db_discos JOIN db_autor ON db_discos.idAutor = db_autor.id ORDER BY '.$columna.' '.$orden);
        $sentencia->execute();
        $ejercicios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $ejercicios;
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

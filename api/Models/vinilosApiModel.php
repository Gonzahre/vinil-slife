<?php
    class vinilosApiModel{
        private $db_name='vinyls';
        private $host='localhost';

        function conectar(){
            try{
                $_con=new PDO('mysql:host:'.$this->host.'; dbname='.$this->db_name.'; charset=utf-8;', 'root', '');
                return $_con;
            }
            catch(exception $e){
                error_log(...);
            }
        }

        function obtenerVinilos(){
            $db=$this->conectar();
            $sentencia=$db->prepare("SELECT * FROM db_vinilos");
            $sentencia->execute();
            $vinilos=$sentencia->fetchAll(PDO::FETCH_OBJ);
            return $vinilos;
        }

        function obtenerVinilo($id){
            $db=$this->conectar();
            $sentencia=$db->prepare("SELECT * FROM db_vinilos WHERE id=?");
            $sentencia->execute($id);
            $vinilo=$sentencia->fetch(PDO::FETCH_OBJ);
            return $vinilo;
        }

        
    }
<?php
class authModel
{
    private $dbname = "vinyls";

    function conectar()
    {
        try {
            $db = new PDO('mysql:host=localhost;' . 'dbname=' . $this->dbname . ';charset=utf8', 'root', '');

            return $db;
        } catch (exception $e) {
            return null;
        }
    }
    function obtenerUsuarios()
    {
        $_con = $this->conectar();
        $sentencia = $_con->prepare("SELECT * FROM usuarios");
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    }

    function obtenerUsuario($userEmail)
    {

        try {
            $_con = $this->conectar();
            $sentencia = $_con->prepare('SELECT * FROM usuarios where username=?');
            $sentencia->execute([$userEmail]);
            $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
            return $usuario;
        } catch (exception $e) {
            return null;
        }
    }

    function registro()
    {
        if (!empty($_POST['usuario']) && !empty($_POST['contrasenia'])) {
            $userEmail = $_POST['usuario'];

            $userPassword = password_hash($_POST['contrasenia'], PASSWORD_ARGON2ID);
            if ($this->obtenerUsuario($userEmail) == null) {
                $_con = $this->conectar();
                $query = $_con->prepare('INSERT INTO usuarios (username, pass, rol) VALUES (? , ?, ?)');
                $query->execute([$userEmail, $userPassword, 'usuario']);
            }
        }
    }
}

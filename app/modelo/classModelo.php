<?php

class Modelo extends PDO
{
    protected $conexion;

    public function __construct()
    {  
        $this->conexion = new PDO('mysql:host=' . Config::$bd_hostname . ';dbname=' . Config::$bd_nombre . '', Config::$bd_usuario, Config::$bd_clave);
        // Realiza el enlace con la BD en utf-8
        $this->conexion->exec("set names utf8");
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
?>

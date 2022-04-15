<?php

class Config {
    static public $bd_hostname = "localhost";
    static public $bd_nombre = "moviedatabase";
    static public $bd_usuario = "root";
    static public $bd_clave = "";
    static public $vis_css = "estilo.css";
    static public $vis_resetcss = "reset.css";
    static public $vis_bootstrap = "bootstrap.min.css";
    static public $extensionesVal = ["jpg", "png", "gif", "tif", "jpeg"];       
    static public $vista = __DIR__ . '/../templates/inicio.php';
    static public $menu = __DIR__ . '/../templates/menu.php';
}

?>
<?php

require_once __DIR__ . '/../app/libs/Config.php';
require_once __DIR__ . '/../app/libs/utils.php';
require_once __DIR__ . '/../app/modelo/classModelo.php';
require_once __DIR__ . '/../app/modelo/classUsuarios.php';
require_once __DIR__ . '/../app/controlador/Controller.php';


//Iniciamos las sessiones
session_start();

// Creamos array de enrutamiento
$map = array(
    'inicio' => array('controller' =>'Controller', 'action' =>'inicio', 'admin' => 0),
    'error' => array('controller' =>'Controller', 'action' =>'error', 'admin' => 0),
    'registrar' => array('controller' => 'Controller', 'action' => 'registrar', 'admin' => 0),
    'login' => array('controller' => 'Controller', 'action' => 'login', 'admin' => 0),
    'logout' =>array('controller' => 'Controller', 'action' => 'logout', 'admin' => 1)
);
/* Comprobamos que existe ctl y que su valor es correcto
** en caso de error mostramos pagina de error dentro de nuestra web
*/
if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {
        $params['mensaje'] = 'No puedes acceder a está zona de la web';
        $ruta = 'error';
    }
} else {
    $ruta = 'inicio';
}
$controlador = $map[$ruta];
/* Compruebo si el usuario tiene la sesion iniciada comprobando si existe el array de session con sus datos
 * en caso contrario le asignamos nivel 0 o invitado
*/
if(!isset($_SESSION['datos']['admin'])){
    $_SESSION['datos']['admin'] =0;
}

/*
 * Comprobamos que existe la clase y el metodo seleccionado y despues comprobamos si el usuario tiene los permisos de acceso
 */
if (method_exists($controlador['controller'],$controlador['action'])) {
    if($controlador['admin'] <= $_SESSION['datos']['admin']){
        call_user_func(array(new $controlador['controller'],
            $controlador['action']));
    }else {
        $params['mensaje'] = "No tienes suficentes permisos para realizar esa accion. Contacta con soporte técnico.";
        require '../app/templates/error.php';
    }
} else {
    $params['mensaje'] = "No existe la web a la que intentas acceder.";
    require '../app/templates/error.php';
}

?>
<?php

class Controller
{

    public function inicio()
    {
        $params = array(
            'mensaje' => 'Bienvenid@',
        );
      
        require __DIR__.'/../templates/inicio.php';
    }

    public function error()
    {
        require __DIR__ . '/../templates/error.php';
    }
    
    
    public function registrar()
    {
        try {
           $params = array (
                'usuario' => '',
                'password' => ''
            );
           $error = false;
            
            if(isset($_POST["registro"])){
                $usuario = recoge("usuario");
                $password = recoge("password");
                
                if(!cTexto($usuario,'usuario',$params,2,"",true)){
                    $error = true;
                    $params ['mensaje'] = "Los datos introducidos en el campo usuario no son validos"; 
                };
                
                if(!cTexto($password,'password',$params,3,"",true)){
                    $error = true;
                    $params ['mensaje'] = "Los datos introducidos en el campo password no son validos"; 
                };
                
                if(!$error){       
                    $params = array (
                        'usuario' => $usuario,
                        'password' => $password
                   );
                    
                    
                    // despues de validar creo objeto para insertar el nuevo usuario
                    $nU = new Usuarios();
                    if($nU->registrarUsuario($params)){  
                        $params ['mensajeok'] = "Registro realizado correctamente, ya puedes iniciar sesion, $usuario"; 
                       //$_SESSION['mensajeok'] = "Registro realizado correctamente, ya puedes iniciar sesion, $usuario";
                        //header('Location: index.php?ctl=login');
                        
                    }else {
                        $params = array (
                            'usuario' => $usuario,
                            'password' => $password                     
                        ); 
                        $params['mensaje'] = 'No se ha podido insertar el usuario. Revisa el formulario';
                    }
                }
            }            
            
        }catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        
      require __DIR__ . '/../templates/registrar.php';
    }
    
    
    public function login()
    {
        try{
            $params = array(
                'usuario' => '',
                'password' => ''            
            );
            
            if (isset($_POST['login'])) {
                $usuario = recoge('usuario');
                $password = recoge('password');
                $error = false;
                
                
                if(!cTexto($usuario, "usuario", $params, 2,"", true)){
                    $error = true; 
                }
                
                if(!cTexto($password, "password", $params, 3,"", true)){
                    $error = true;
                }
                //Si no hay errores de validacion creo objeto y realizo consulta
                if(!$error){                     
                    $u = new Usuarios();
                    $datosUsuario = $u->login($usuario, $password);               
                    
                    if(!is_array($datosUsuario)){ 
                        $params ['mensaje'] = "Usuario y/o contraseña incorrectos";
                    }else{
                        print_r($datosUsuario);
                
                        if(($datosUsuario['usuario']== $usuario) && ($datosUsuario['password'] == $password)){
                            $_SESSION['datos'] = $datosUsuario;                
                            $_SESSION['menu'] = 'menu.php';
                            
                            header('Location: index.php?ctl=inicio');
                            
                        }else {
                            $params = array(
                                'usuario' => $usuario,
                                'password' => $password, 
                            );
                        $params['mensaje'] = 'Error al iniciar sesión, los datos que no son correctos.';   
                        }
                    }
                }
             
            }
        }catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/../templates/login.php';
    }
    
    public function logout()
    {  
        session_destroy();
        $params = array (
            'mensaje' => $_SESSION['datos']['usuario'].", tu sesión se ha cerrado correctamente. ¡Hasta la próxima!",
         );                      
        
        unset($_SESSION);
        require __DIR__ . '/../templates/inicio.php';
    }
 
}

?>
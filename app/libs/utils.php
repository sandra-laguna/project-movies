<?php
function recoge($var)
{
    if (isset($_REQUEST[$var]))
        $tmp=strip_tags(sinEspacios($_REQUEST[$var]));
        else
            $tmp= "";
            
            return $tmp;
}

function sinEspacios($frase) {
    $texto = trim(preg_replace('/ +/', ' ', $frase));
    return $texto;
}

/*
 * Funcion para validad distintos tipos de textos, usuarios y contraseñas
*/
function cTexto (string $text, string $campo, &$params, int $condicion, string $espacios = "", bool $requerido = FALSE, int $max = 30, int $min = 1)
{
    if(($requerido) && empty($text)){
        $params ['mensaje'] = "No has introducido el campo $campo.";
        return false;
    }
    
    if(!empty($text)){
        switch ($condicion){
            case (1) : //Generico solo letras y maximo 30 caracteres
                if (preg_match("/^[A-Za-zÑñ$espacios]+$/", $text)){
                    if ((mb_strlen($text) >=$min && mb_strlen($text)<=$max)) {
                        return true;
                        break;
                    }$params ['mensaje'] = "Los datos introducidos en $campo son demasiado largos, deben tener entre $min y $max caracteres";
                    return false;
                }else
                    $params ['mensaje'] = "Los datos introducidos en $campo no son validos";
                    return false;
                    
            case (2) : //Para validar nombre de usuario. Permite letras,numeros,_,$,& Inicio letra o _. Maximo 12 caracteres.
                if (preg_match("/^[A-Za-z_][\w\$\&]*/", $text)){
                    if ((mb_strlen($text) >=$min && mb_strlen($text)<=$max)) {
                        return true;
                        break;
                    }$params ['mensaje'] = "Los datos introducidos en $campo son demasiado largos, deben tener entre $min y $max caracteres";
                    return false;
                }else
                    $params ['mensaje'] = "Los datos introducidos en $campo no son validos";
                    return false;
                    
            case (3) : //Para validar contraseña. Permite letras,numeros,*,_,-,$,&,/,\,+ Inicio letra o _. Maximo 15 caracteres.
                if (preg_match("/^[\w\$\&\*\-\\\+\/]{1,15}$/", $text)){
                    if ((mb_strlen($text) >=$min && mb_strlen($text)<=$max)) {
                        return true;
                        break;
                    }$params ['mensaje'] = "Los datos introducidos en $campo son demasiado largos, deben tener entre $min y $max caracteres";
                    return false;
                }else
                    $params ['mensaje'] = "Los datos introducidos en $campo no son validos";
                    return false;        
        }
    }
    return true;
}
?>
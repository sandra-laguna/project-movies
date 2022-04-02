<?php 

class Usuarios extends Modelo
{
 
    public function login(string $usuario, string $password)
    {
        $consulta = "SELECT * FROM usuarios WHERE usuario=:usuario and password=:password";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':usuario', $usuario);
        $result->bindParam(':password', $password);        
        $result->execute();
        $final = $result->fetch(PDO::FETCH_ASSOC); 
        return $final;
    }
    
    public function registrarUsuario (array $usuario)
    {
        print_r($usuario);
        $consulta = "INSERT into usuarios (usuario, password) values (?,?)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $usuario["usuario"]);
        $result->bindParam(2, $usuario["password"]);
        if($result->execute()){
            return true;
        }          
        
    }
}

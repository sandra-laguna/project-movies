
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

    public function registrarUsuario(array $usuario, $imgPerfil)
    {
        print_r($usuario);
        $consulta = "INSERT into usuarios (usuario, password) values (?,?)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $usuario["usuario"]);
        $result->bindParam(2, $usuario["password"]);
        if ($result->execute()) {
            if ($this->insertaImgPerfil($this->conexion->lastInsertId(), $imgPerfil)) {
                return true;
            }
        }
    }

    public function insertaImgPerfil(string $idUsuario, $imgPerfil)
    {
        $consulta = "UPDATE usuarios SET imgperfil=:imgperfil WHERE id=:id";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id', $idUsuario);
        $result->bindParam(':imgperfil', $imgPerfil);
        $result->execute();
        if ($result->execute()) {
            return true;
        }
    }

    public function buscarImgPerfil(string $idUsuario)
    {
        $consulta = "SELECT imgperfil FROM usuarios Where id=:id";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id', $idUsuario);
        $result->execute();
        $salida = $result->fetch(PDO::FETCH_ASSOC);
        // print_r($salida);
        if ($salida) {
            return $salida;
        }
    }
}
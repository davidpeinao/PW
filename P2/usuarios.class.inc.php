<?php
require_once("dataObject.class.inc.php");
class Usuario extends DataObject {
    protected $datos = array( 
        "nombre" => null, 
        "password" => null,
        "email" => null, 
        "ciudad" => null,
        "frase_perfil" => null,
        "imagen_perfil" => null,
        ); 
    public static function getUsuario($nombre) {
        $conexion = parent::conectar();
        $sql = "SELECT * FROM " . TABLA_USUARIOS . " WHERE nickname = :nombre";
        try {
            $st = $conexion->prepare($sql);
            $st->bindValue(":nombre", $nombre);
            $st->execute();
            $fila = $st->fetch();
            parent::desconectar($conexion);
            if ($fila) return new Usuario ($fila);
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: ".$e->getMessage());
        }
    }
    public static function crearUsuario($datosUsuario) {
        $conexion = parent::conectar();
        $sql = "INSERT INTO " . TABLA_USUARIOS . " VALUES (:nombre, :password, :email, :ciudad,
            :frase_perfil, :imagen_perfil)";
        $sentencia = $conexion->prepare($sql);
        try {
            $sentencia->bindValue(":nombre", $datosUsuario["usuario"]);
            $sentencia->bindValue(":password", hash('sha512', $datosUsuario["password"]));
            $sentencia->bindValue(":email", "");
            $sentencia->bindValue(":ciudad", "");
            $sentencia->bindValue(":frase_perfil", "");
            $sentencia->bindValue(":imagen_perfil", $datosUsuario["urlimagen"]);
            
            $sentencia->execute();
            parent::desconectar($conexion);
        } catch (PDOException $e){
            parent::desconectar($conexion);
            die("Petición fallida: ".$e->getMessage());
        }
    }
    public static function validarLogin($usuario, $password) {
        $conexion = parent::conectar();
        $sql = "SELECT * FROM " . TABLA_USUARIOS . " WHERE nickname = :nombre AND password = :password";
        try {
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindValue(":nombre", $usuario);
            $sentencia->bindValue(":password", hash('sha512', $password));
        
            $sentencia->execute();
            $filas = $sentencia->rowCount();
            
            if ($filas == 1){
                parent::desconectar($conexion);
                return true;
            }
            else {
                parent::desconectar($conexion);
                return false;
            }
        } catch (PDOException $e){
            parent::desconectar($conexion);
            die("Petición fallida: ".$e->getMessage());
        }
        
    }
    public static function actualizarDatos($usuario, $datosUsuario) {
        $conexion = parent::conectar();
        if(empty($datosUsuario["newpassword"])){
        $sql = "UPDATE " . TABLA_USUARIOS . " SET email = :email,
                                            ciudad = :ciudad,
                                            frase_perfil = :frase_perfil
                                            WHERE nickname = :nombre";
        }
        else {
        $sql = "UPDATE " . TABLA_USUARIOS . " SET password = :newpassword,
                                        email = :email,
                                        ciudad = :ciudad,
                                        frase_perfil = :frase_perfil
                                        WHERE nickname = :nombre";
        }
        try {
            $sentencia = $conexion->prepare($sql);           
            $sentencia->bindValue(":nombre", $usuario);
            if(!empty($datosUsuario["newpassword"]))
                $sentencia->bindValue(":newpassword", hash('sha512', $datosUsuario["newpassword"]));
            $sentencia->bindValue(":email", $datosUsuario["email"]);
            $sentencia->bindValue(":ciudad", $datosUsuario["ciudad"]);
            $sentencia->bindValue(":frase_perfil", $datosUsuario["frase_perfil"]);
            
            $sentencia->execute();
            parent::desconectar($conexion);
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Petición fallida: ".$e->getMessage());
        }
    }
}
?>
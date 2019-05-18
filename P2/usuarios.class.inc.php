<?php
require_once("dataObject.class.inc.php");
class Usuario extends DataObject {
    protected $datos = array( 
        "nickname" => null, 
        "password" => null,
        "email" => null, 
        "ciudad" => null,
        "frase_perfil" => null,
        "imagen_perfil" => null,
        ); 
    public static function getUsuario($nickname) {
        $conexion = parent::conectar();
        $sql = "SELECT * FROM " . TABLA_USUARIOS . " WHERE nickname = :nickname";
        try {
            $st = $conexion->prepare($sql);
            $st->bindValue(":nickname", $nickname);
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
        $sql = "INSERT INTO " . TABLA_USUARIOS . " VALUES (:nickname, :password, :email, :ciudad,
            :frase_perfil, :imagen_perfil)";
        $sentencia = $conexion->prepare($sql);
        try {
            foreach($datosUsuario as $key => $value) {
                if (!empty($value)){
                    if ($key == "password")
                        $value = hash('sha512', $value);
                    $sentencia->bindValue(":".$key, $value);
                }else{
                    $sentencia->bindValue(":".$key, 0);
                }
            }
            
            $sentencia->execute();
            parent::desconectar($conexion);
        } catch (PDOException $e){
            parent::desconectar($conexion);
            die("Petición fallida: ".$e->getMessage());
        }
    }
    public static function validarLogin($usuario, $password) {
        $conexion = parent::conectar();
        $sql = "SELECT * FROM " . TABLA_USUARIOS . " WHERE nickname = :nickname AND password = :password";
        try {
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindValue(":nickname", $usuario);
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
        $sql = "UPDATE " . TABLA_USUARIOS . " SET email = :email,
                                            ciudad = :ciudad,
                                            frase_perfil = :frase_perfil,
                                            imagen_perfil = :imagen_perfil
                                            WHERE nickname = :nickname";
        try {
            $sentencia = $conexion->prepare($sql);           
            $sentencia->bindValue(":nickname", $usuario);
            foreach($datosUsuario as $key => $value) {
                if (!empty($value)){
                    $sentencia->bindValue(":".$key, $value);
                }
                else{
                    $sentencia->bindValue(":".$key, null);
                }
                
            }
            $sentencia->execute();
            parent::desconectar($conexion);
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Petición fallida: ".$e->getMessage());
        }
    }
}
?>
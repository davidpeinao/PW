<?php
require_once("dataObject.class.inc.php");
class Libro extends DataObject {
    protected $datos = array( 
        "titulo" => null, 
        "autor" => null,
        "editorial" => null, 
        "anio" => null,
        "edicion" => null,
        "descripcion" => null,
        "opinion" => null,
        "valoracion" => null,
        "creador" => null,
        ); 
    public static function getLibros() {
        $conexion = parent::conectar();
        $sql = "SELECT * FROM " . TABLA_LIBROS . "";
        try {
            $st = $conexion->prepare($sql);
            $st->execute();
            $filas = $st->fetchAll();
            parent::desconectar($conexion);
            return $filas;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: ".$e->getMessage());
        }
    }

    public static function getLibro($tituloLibro) {
      $conexion = parent::conectar();
      $sql = "SELECT * FROM " . TABLA_LIBROS . " WHERE titulo = :tituloLibro ";
      try {
          $st = $conexion->prepare($sql);
          $st->bindValue(":tituloLibro", $tituloLibro);
          $st->execute();
          $fila = $st->fetch();
          parent::desconectar($conexion);
          if ($fila) return new Libro ($fila);
      } catch (PDOException $e) {
          parent::desconectar($conexion);
          die("Consulta fallida: ".$e->getMessage());
      }
  }

    public static function getLibrosUsuario($usuario) {
      $conexion = parent::conectar();
      $sql = "SELECT * FROM " . TABLA_LIBROS . " WHERE creador = :usuario ";
      try {
          $st = $conexion->prepare($sql);
          $st->bindValue(":usuario", $usuario);
          $st->execute();
          $filas = $st->fetchAll();
          parent::desconectar($conexion);
          return $filas;
      } catch (PDOException $e) {
          parent::desconectar($conexion);
          die("Consulta fallida: ".$e->getMessage());
      }
  }
    
    public static function crearLibro($datosLibro) {
        $conexion = parent::conectar();
        $sql = "INSERT INTO " . TABLA_LIBROS . " VALUES (:titulo, :autor, :editorial, :anio,
            :edicion, :descripcion, :opinion, :valoracion, :creador)";
        $sentencia = $conexion->prepare($sql);
        try {
            $sentencia->bindValue(":titulo", $datosLibro["titulo"]);
            $sentencia->bindValue(":autor", $datosLibro["autor"]);
            $sentencia->bindValue(":editorial", $datosLibro["editorial"]);
            $sentencia->bindValue(":anio", $datosLibro["anio"]);
            $sentencia->bindValue(":edicion", $datosLibro["edicion"]);
            $sentencia->bindValue(":descripcion", $datosLibro["descripcion"]);
            $sentencia->bindValue(":opinion", $datosLibro["opinion"]);
            $sentencia->bindValue(":valoracion", $datosLibro["valoracion"]);
            $sentencia->bindValue(":creador", $datosLibro["creador"]);
            
            $sentencia->execute();
            parent::desconectar($conexion);
        } catch (PDOException $e){
            parent::desconectar($conexion);
            die("Petición fallida: ".$e->getMessage());
        }
    }
    
    public static function actualizarDatos($usuario, $datosLibro) {
        $conexion = parent::conectar();
        if($datosLibro["newpassword"] == ""){
        $sql = "UPDATE " . TABLA_LIBROS . " SET email = :email,
                                            ciudad = :ciudad,
                                            frase_perfil = :frase_perfil,
                                            WHERE nombre = :nombre";
        }
        else {
        $sql = "UPDATE " . TABLA_LIBROS . " SET password = :newpassword,
                                        email = :email,
                                        ciudad = :ciudad,
                                        frase_perfil = :frase_perfil,
                                        WHERE nombre = :nombre";
        }
        try {
            $sentencia = $conexion->prepare($sql);           
            $sentencia->bindValue(":nombre", $usuario);
            $sentencia->bindValue(":newpassword", hash('sha512', $password));
            foreach($datosLibro as $key => $value) {
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

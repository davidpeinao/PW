<?php
require_once("configuracion.inc");
abstract class DataObject {
    
    protected $datos = array();
    
    public function __construct($datos) {
        foreach($datos as $key => $value){
            if (array_key_exists($key, $this->datos)) $this->datos[$key] = $value; 
        }
    }
    public function getValor($key) {
        if (array_key_exists($key, $this->datos)) return $this->datos[$key];
        else die ("Campo no encontrado");
    }
    protected static function conectar() {
        try {
            $conexion = new PDO(DB_DSN, DB_USUARIO, DB_PASSWORD);
            $conexion->query('SET NAMES utf8');
            $conexion->setAttribute(PDO::ATTR_PERSISTENT, true);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die ("Conexión fallida: ".$e->getMessage());
        }
        return $conexion;
    }
    protected static function desconectar($conexion) {
        $conexion = null;
    }
}
?>
<?php

//conexión utilizando programación orientada a objetos
class Conexion {
    //propiedades de la clase
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasenia = "";
    private $conexion="";

    
    public function __construct() {
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor; dbname=automotriz", $this->usuario,$this->contrasenia);
            $this->conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            

        } catch(PDOException $e) { 
            throw new Exception("Falla de conexión. ".$e->getMessage());
        }
            
    }

        // acceso
        public function obtenerConexion() {
            return $this->conexion;
        }

    //función para ejecutar consulta, donde tenemos 2 parámetros, la consulta de sql y el array de parámetros
    public function ejecutarConsulta($consulta, $parametros = array()) {
        $sentencia = $this->conexion->prepare($consulta);
        foreach ($parametros as $nombre => $valor) {
            $sentencia->bindParam($nombre, $valor);
        }
        
        $sentencia->execute();
        $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
    

    public function login($consulta, $parametros = array()) {
        $sentencia = $this->conexion->prepare($consulta);
        foreach ($parametros as $nombre => $valor) {
            $sentencia->bindParam($nombre, $parametros[$nombre]);
        }
        $sentencia->execute();
        $resultados = $sentencia->fetch();
        return $resultados;
    }
}
?>
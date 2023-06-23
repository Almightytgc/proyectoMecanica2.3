<?php

//conexión utilizando programación orientada a objetos
class Conexion {
    //propiedades de la clase
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasenia = "";
    private $conexion="";

    //función constructora de la conexión a la base de datos
    public function __construct() {
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor; dbname=prueba", $this->usuario,$this->contrasenia);
            $this->conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<h1>Conexión a la bd exitosa</h1>";
            // Con setAttribute(), establecemos el valor de un atributo en la conexión PDO. PDO::ATTR_ERRMODE es 
            // el nombre del atributo que queremos establecer y PDO::ERRMODE_EXCEPTION es el 
            // valor que queremos asignarle. en este caso buscamos establecer un atrbituto de error

        } catch(PDOException $e) { 
            throw new Exception("Falla de conexión. ".$e->getMessage());
        }
            
    }

        // método público para acceder a la propiedad privada $conexion
        public function obtenerConexion() {
            return $this->conexion;
        }

        //RECEPCIÓN DE IMÁGENES EN LA FUNCIÓN DE EJECUTAR CONSULTA

        //     //obtenemos la fecha
    //     $fecha = new dateTime();

    //     //Necesitamos la recepción de nombre de imagen y 
    //     //usamos la funcion getTimestamp para obtener la hora a la que se sube para que 
    //     //se distinga de las otras yluego concatenamos el _ con el nombre de la imagen

    //     $imagen = $fecha->getTimestamp()."_".$_FILES['archivo']['name'];


    //     //añadimos nombre temporal
    //     $imagen_temporal = $_FILES['archivo']['tmp_name'];

    
    //     //movemos la imagen recibida a la carpeta "imagenes"
    //     move_uploaded_file($imagen_temporal,"imagenes/".$imagen);

    //     //por ende necesitamos crear una carpeta donde se almacenen las imágenes que se 
    //     //recepcionen

    //función para ejecutar consulta, donde tenemos 2 parámetros, la consulta de sql y el array de parámetros
    public function ejecutarConsulta($consulta, $parametros = array()) {
        $sentencia = $this->conexion->prepare($consulta);
        foreach ($parametros as $nombre => $valor) {
            $sentencia->bindParam($nombre, $valor);
        }
        $sentencia->execute();
        $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        //  var_dump($sentencia->errorInfo());
        return $resultados;
    }
    

    public function login($consulta, $parametros = array()) {
        $sentencia = $this->conexion->prepare($consulta);
        foreach ($parametros as $nombre => $valor) {
            $sentencia->bindParam($nombre, $parametros[$nombre]);
        }
        $sentencia->execute();
        $resultados = $sentencia->fetch();
        // var_dump($sentencia->errorInfo());
        return $resultados;
    }
}
?>
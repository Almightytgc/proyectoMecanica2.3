<?php 
session_start();
include("util.php");

if ($_POST) {
  $nombre = (isset($_POST['nombre']) ? $_POST["nombre"]:"");
  $apellido = (isset($_POST['apellido']) ? $_POST["apellido"]:"");
  $usuario = (isset($_POST['usuario']) ? $_POST["usuario"]:"");
  $password = (isset($_POST['password']) ? $_POST["password"]:"");
  $modeloVehiculo = (isset($_POST['modeloVehiculo']) ? $_POST["modeloVehiculo"]:"");
  $yearVehiculo = (isset($_POST['yearVehiculo']) ? $_POST["yearVehiculo"]:"");
  $marcaVehiculo = (isset($_POST['marcaVehiculo']) ? $_POST["marcaVehiculo"]:"");
  $idRol = 2;
  $error = " ";



  $conexionBD = new Conexion();
  $conexion = $conexionBD->obtenerConexion();

  $resultados = $conexionBD->insertar
      ("INSERT INTO cliente (idCliente, Nombre, Apellido, Usuario, Contraseña, modeloAuto, añoAuto, marcaCarro, idRol) 
      VALUES (null, :nombre, :apellido, :usuario, :password, :modeloVehiculo, :yearVehiculo, :marcaVehiculo, :idRol )",
       
       array(':nombre' => $nombre, ':apellido' => $apellido, ':usuario' => $usuario, ':password' =>
       $password, ':modeloVehiculo' => $modeloVehiculo, ':yearVehiculo' => $yearVehiculo, ':marcaVehiculo' => $marcaVehiculo,
        ':idRol' => $idRol) );

        $error = $resultados->errorCode();

        if ($error === '00000') {

          $error = " ";
          header("location: index.php");
        }
        else {

          $error = "ha ocurrido un error";
          

        }
       
        
        
        

        
        
        


        

}

if(!$_POST){
  $error = " ";

}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <meta charset="utf-8">
    <title>taller mecánico</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="center">
      

    

    <div class="card text-center m-auto p-3">
    
        <div class="card-body">
        <?php if($error !== " " && $_POST){ ?>
        <div class="alert alert-danger" role="alert">
            <strong><?php echo $error;?></strong>
        </div>
    <?php } ?>
          <br>
    <h1>Registro</h1>
      <form method="post" action="">

      <div class="txt_field">
          <input type="text" require name="nombre">
          <span></span>
          <label>Nombres</label>
        </div>

        <div class="txt_field">
          <input type="text" required name="apellido">
          <span></span>
          <label>Apellidos</label>
        </div>

        <div class="txt_field">
          <input type="text" required name="marcaVehiculo">
          <span></span>
          <label>Marca vehiculo</label>
        </div>

        <div class="txt_field" >
          <input type="text" required name="modeloVehiculo">
          <span></span>
          <label>Modelo vehiculo</label>
        </div>

        <div class="txt_field" >
          <input type="text" required name="yearVehiculo">
          <span></span>
          <label>Año vehiculo</label>
        </div>

        <div class="txt_field">
          <input type="text" required name="usuario">
          <span></span>
          <label>Usuario</label>
        </div>

        <div class="txt_field">
          <input type="password" required name="password">
          <span></span>
          <label>Contraseña</label>
        </div>
        

        <input type="submit" value="registrate">
        <div class="signup_link">
        <a href="index.php"> ¿Ya tienes una cuenta? Inicia sesión</a>
        </div>
      </form>
    </div>

  </body>
</html>
<?php
session_start();
include("util.php");


$_SESSION['logueado'] = false;
$error = " ";

if ($_POST) {
    $usuario = (isset($_POST['usuario']) ? $_POST["usuario"]:"");
    $password = (isset($_POST['password']) ? $_POST["password"]:"");

    $conexionBD = new Conexion();
    $conexion = $conexionBD->obtenerConexion();

    $resultados = $conexionBD->login
        ('SELECT *, count(*) as n_usuarios FROM mecanico WHERE usuario=:usuario
         AND contraseña=:password'
        , 
         array(':usuario' => $usuario, ':password' => $password));

         if (intval($resultados['n_usuarios']) >= 1) {
         
          $error = " ";
          $_SESSION['logueado'] = true;
          
          $id_USER= $resultados['idMecanico'];

          $_SESSION['idMecanico'] = $id_USER;
          
          header("location: indexMecanico.php");


          

        } else {

            $error = "no se ha encontrado tu usuario";
            

        }

}

if(!$_POST){
  $error = " ";

}




?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>taller mecánico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
  </head>
  <body>
    <div class="center">
      <h1>Iniciar sesión</h1>
      <div class="card text-center m-auto p-3">
        <div class="card-body">
        <?php if($error !== " " && $_POST){ ?>
        <div class="alert alert-danger" role="alert">
            <strong><?php echo $error;?></strong>
        </div>
    <?php } ?>
</div>

      <form method="post">
        <div class="txt_field">
          <input type="text" required name="usuario">
          <span></span>
          <label>Nombre</label>
        </div>
        <div class="txt_field">
          <input type="password" required name="password">
          <span></span>
          <label>Password</label>
        </div>
        <input type="submit" value="Login">
        <div class="signup_link">
        <a href="index.php" class="mecanico"> iniciar como cliente</a>
        </div>
      </form>
    </div>

  </body>
</html>


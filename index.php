<?php
session_start();
include("conexion.php");


$_SESSION['logueado'] = false;

if ($_POST) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $conexionBD = new Conexion();
    $conexion = $conexionBD->obtenerConexion();

    $resultados = $conexionBD->login
        ('SELECT *, count(*) as n_usuarios FROM usuarios WHERE usuario=:usuario AND contraseña=:password', 
         array(':usuario' => $usuario, ':password' => $password));

         if (intval($resultados['n_usuarios']) > 0) {
            echo "Hola";
        } else {
            echo "aaa";
        }
        
    var_dump($usuario);
    var_dump($password);

}




?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>taller mecánico</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="center">
      <h1>Iniciar sesión</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" value="Login">
        <div class="signup_link">
        <a href="registro.php"> ¿No tienes una cuenta? Regístrate</a>
        </div>
      </form>
    </div>

  </body>
</html>

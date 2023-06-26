<?php 
include("util.php");
session_start();
protegerHome($_SESSION["idMecanico"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container abs-center" >
  <div class="row">
    <div class="col-md-3">
      <!-- Contenido de la columna izquierda -->
    </div>
    <div class="col-md-6 mx-auto text-center">
      <!-- Contenido de la columna central -->
      <div class="alert bg-secondary text-white mt-5" role="alert">
            <strong><h2>Hola ¿qué deseas hacer hoy?</h2></strong>
        </div>      
      
      <div class="card-group mt-5 text-center">


  <div class="card p-3">
    <a href="crearDiagnostico.php" class="text-decoration-none">
    <img src="../../../img/agregar.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Agregar diagnostico</h5>
    </div>
    </a>
  </div>




  <div class="card p-3">
    <a href="cerrar.php" class="text-decoration-none">
    <img src="../../../img/cerrar.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Cerrar sesión</h5>
    </div>
    </a>

  </div>
</div>


    </div>
    <div class="col-md-3">
      <!-- Contenido de la columna derecha -->
    </div>
  </div>
</div>
</body>
</html>

<?php 
include("footer.php");
?>





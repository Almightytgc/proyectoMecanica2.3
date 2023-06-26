<?php 

session_start();

if(!isset($_SESSION["idCliente"])){
    header("location: index.php");
}




?>

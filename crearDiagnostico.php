<?php 
include("util.php");
session_start();
protegerHome($_SESSION["idMecanico"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="diagnostico.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex justify-center items-center h-screen bg-indigo-50">  
        <div class="w-96 p-6 shadow-lg bg-white rounded-md">
            <h1 class="text-3xl block text-center">Diagnostico</h1>
            <hr class="mt-3">
            <form action="">
                <div class="mt-3">
                    <label class="block text-base mb-2" for="desc">Descripcion del diagnostico:</label>
                    <textarea class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600" id="myTextarea" rows="4" cols="50" placeholder="Escribe tu comentario aquí..."></textarea>
                </div>
                <hr class="mt-3">
                <hr class="mt-3">
                <div class="flex items-center">
                    <input type="checkbox" id="si" class="form-checkbox">
                    <label for="myCheckbox" class="ml-2">Cambio de aceite y filtro</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="si" class="form-checkbox">
                    <label for="myCheckbox" class="ml-2">Cambio de frenos:</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="si" class="form-checkbox">
                    <label for="myCheckbox" class="ml-2">Cambio de llantas</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="si" class="form-checkbox">
                    <label for="myCheckbox" class="ml-2">Reemplazo de bateria</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="si" class="form-checkbox">
                    <label for="myCheckbox" class="ml-2">Reparación de sistemas eléctricos</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="si" class="form-checkbox">
                    <label for="myCheckbox" class="ml-2">Cambio de correas</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="si" class="form-checkbox">
                    <label for="myCheckbox" class="ml-2">Reparación del sistema de escape</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="si" class="form-checkbox">
                    <label for="myCheckbox" class="ml-2">Cambio de amortiguadores</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="si" class="form-checkbox">
                    <label for="myCheckbox" class="ml-2">Reparación de sistemas de seguridad</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="si" class="form-checkbox">
                    <label for="myCheckbox" class="ml-2">Reparación de sistema de climatización</label>
                </div> 

                <hr class="mt-3">
                <button class=" border-2 border-indigo-300 px-5 bg-center py-1 w-full hover:bg-indigo-300 text-black bold" type="submit">Enviar</button>
            </form>
        </div>
    </div>    
</body>
</html>
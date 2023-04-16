<?php

    include("../includes/navbarEmpleado.php");
    include("../includes/conexion.php");


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/productos.css">
</head>
<body>

    <section class="home" style="display: flex; justify-content: center; align-items: center; background-image: url(../img/fondoAddProducto.png); background-size: cover; ">

    <div class="caja-form">
        <form action="addProducto.php" method="POST" onsubmit="return validar()" enctype="multipart/form-data" >
        <div class="datos-form">
            
            <h1 class="titulo-form">Añadir Producto</h1>

            <div class="input">
                <label for="">Nombre:</label>
                <input type="text" id="nombre" name="nombre">
                <label for="" id="errorNombre" style="color: red; font-weight: 500"></label>
            </div>

            <div class="input">
                <label for="">Precio:</label>
                <input type="text" id="precio" name="precio">
                <label for="" id="errorPrecio" style="color: red; font-weight: 500"></label>
            </div>

            <div class="input">
                <label for="">Foto:</label>
                <input type="file" name="foto" style="color: #4CAF50; font-weight: 500; font-family: Poppins; border: none;">
            </div>

            <div class="input">
                <button type="submit">Enviar</button>
            </div>
            
        </div>
        </form>
    </div>
    </section>
    

    <script>
        function validar() {
            
            var formvalido = true;
            let usuario = document.getElementById("nombre");
            if (usuario.value == "") {
              document.getElementById("errorNombre").innerHTML = "Es necesario escribir el campo Nombre";
              formvalido = false;
            }

            let usuario = document.getElementById("precio");
            if (usuario.value == "") {
              document.getElementById("errorPrecio").innerHTML = "Es necesario establecer un precio";
              formvalido = false;
            }
  
          return formvalido;
          
          }
    </script>
</body>
</html>
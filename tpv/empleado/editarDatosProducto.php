<?php
  session_start();
?>

<?php
        include("../includes/navbarEmpleado.php");
        include("../includes/conexion.php");
             
        $id = $_GET['id'];

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
    
    <section class="home" style="display: flex; justify-content: center; align-items: center; background-image: url(../img/fondoEditarProductos.jpg); background-size: cover; ">

    <div class="caja-form">
        <form action="editarProducto.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <div class="datos-form">
            
            <h1 class="titulo-form" style="color: #0ea822">Editar Producto</h1>

            <div class="input">
                <label for="" style="font-weight: bold; color: white">Nombre:</label>
                <input type="text" name="nombre" style="font-weight: bold; color: black">
            </div>

            <div class="input">
                <label for="" style="font-weight: bold; color: white">Precio:</label>
                <input type="text" id="precio" name="precio" style="font-weight: bold; color: black">
            </div>

            <div class="input">
                <label for="" style="font-weight: bold; color: white">Foto:</label>
                <input type="file" name="foto" style="color: white; font-weight: 500; font-family: Poppins; border: none;">
            </div>

            <div class="input">
                <button type="submit">Enviar</button>
            </div>
            
        </div>
        </form>
    </div>
    </section>
</body>
</html>
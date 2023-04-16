<?php

include("../includes/conexion.php");

$id = $_GET['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];

if (isset($_FILES['foto'])) {
    // Obtener información del archivo de imagen
    $imagen_nombre = $_FILES['foto']['name'];
    $imagen_tipo = $_FILES['foto']['type'];
    $imagen_tamaño = $_FILES['foto']['size'];
    $imagen_temporal = $_FILES['foto']['tmp_name'];

    if ($imagen_tamaño > 0) {
        // Leer contenido del archivo de imagen
        $contenido_imagen = file_get_contents($imagen_temporal);

        // Escapar contenido de imagen y nombre de la imagen
        $contenido_imagen = mysqli_real_escape_string($conectar, $contenido_imagen);
        $imagen_nombre = mysqli_real_escape_string($conectar, $imagen_nombre);
    } else {
        $contenido_imagen = null;
        $imagen_nombre = null;
        $imagen_tipo = null;
    }
}



if ($nombre != "") {
   if ($precio != "") {
        if ($contenido_imagen !== null) {

            $editar = "UPDATE `tpv`.`producto` SET `nombreProducto` = '$nombre', `precio` = '$precio', `foto` = '$contenido_imagen', `nombreFoto` = '$imagen_nombre', `tipoFoto` = '$imagen_tipo' WHERE (`id` = '$id');";
            $resultado = mysqli_query($conectar, $editar);

            header("location: ./productos.php");

        } else{

            $editar = "UPDATE `tpv`.`producto` SET `nombreProducto` = '$nombre', `precio` = '$precio' WHERE (`id` = '$id');";
            $resultado = mysqli_query($conectar, $editar);

            header("location: ./productos.php");

        }
   } else {
        if ($contenido_imagen !== null) {
            
            $editar = "UPDATE `tpv`.`producto` SET `nombreProducto` = '$nombre', `foto` = '$contenido_imagen', `nombreFoto` = '$imagen_nombre', `tipoFoto` = '$imagen_tipo' WHERE (`id` = '$id');";
            $resultado = mysqli_query($conectar, $editar);

            header("location: ./productos.php");

        } else {

            $editar = "UPDATE `tpv`.`producto` SET `nombreProducto` = '$nombre' WHERE (`id` = '$id');";
            $resultado = mysqli_query($conectar, $editar);

            header("location: ./productos.php");

        }
   }
} else{
    if ($precio != "") {
        if ($contenido_imagen !== null) {
            
            $editar = "UPDATE `tpv`.`producto` SET `precio` = '$precio', `foto` = '$contenido_imagen', `nombreFoto` = '$imagen_nombre', `tipoFoto` = '$imagen_tipo' WHERE (`id` = '$id');";
            $resultado = mysqli_query($conectar, $editar);

            header("location: ./productos.php");

        } else{

            $editar = "UPDATE `tpv`.`producto` SET `precio` = '$precio' WHERE (`id` = '$id');";
            $resultado = mysqli_query($conectar, $editar);

            header("location: ./productos.php");

        }
    } else {
        if ($contenido_imagen !== null) {
            
            $editar = "UPDATE `tpv`.`producto` SET `foto` = '$contenido_imagen', `nombreFoto` = '$imagen_nombre', `tipoFoto` = '$imagen_tipo' WHERE (`id` = '$id');";
            $resultado = mysqli_query($conectar, $editar);

            header("location: ./productos.php");

        } else{
            header("location: ./productos.php");
        }
    }
}

?>
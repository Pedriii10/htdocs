<?php

    session_start();

   include("../includes/conexion.php");

   $nombre = $_POST['nombre'];
   $pass = $_POST['password'];
   $rol = $_POST['rol'];

   // Obtener información del archivo de imagen
    $imagen_nombre = $_FILES['foto']['name'];
    $imagen_tipo = $_FILES['foto']['type'];
    $imagen_tamaño = $_FILES['foto']['size'];
    $imagen_temporal = $_FILES['foto']['tmp_name'];

    // Leer contenido del archivo de imagen
    $contenido_imagen = file_get_contents($imagen_temporal);

    // Escapar contenido de imagen y nombre de la imagen
    $contenido_imagen = mysqli_real_escape_string($conectar, $contenido_imagen);
    $imagen_nombre = mysqli_real_escape_string($conectar, $imagen_nombre);

    $insertar = "INSERT INTO `empleado` (`nombre`, `contraseña`, `rol`, `foto`, `nombreFoto`, `tipoFoto`) VALUES ('$nombre', '$pass', '$rol', '$contenido_imagen', '$imagen_nombre', '$imagen_tipo');";
    $query = mysqli_query($conectar, $insertar);

    if ($query) {
        header("location: ./administracion.php");
    }
 

?>
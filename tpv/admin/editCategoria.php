<?php

include("../includes/conexion.php");

$id = $_GET['id'];
$nombre = $_POST['nombre'];

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
    if ($contenido_imagen !== null) {
        /*Hacer consulta de todo, nombre y foto*/
            $editar = "UPDATE `tpv`.`categoria` SET `nombre` = '$nombre', `foto` = '$contenido_imagen', `nombreFoto` = '$imagen_nombre', `tipoFoto` = '$imagen_tipo' WHERE (`id` = '$id');";
            $resultado = mysqli_query($conectar, $editar);

        header("location: ./categorias.php");
    } else {
        /*Hacer consulta solo de nombre*/
            $editar = "UPDATE `tpv`.`categoria` SET `nombre` = '$nombre' WHERE (`id` = '$id');";
            $resultado = mysqli_query($conectar, $editar);

        header("location: ./categorias.php");
    }
} else {
    if ($contenido_imagen !== null) {
        /*Hacer consulta solo de foto*/
            $editar = "UPDATE `tpv`.`categoria` SET `foto` = '$contenido_imagen', `nombreFoto` = '$imagen_nombre', `tipoFoto` = '$imagen_tipo' WHERE (`id` = '$id');";
            $resultado = mysqli_query($conectar, $editar);

        header("location: ./categorias.php");
    } else {
        /*No hacer consulta*/

        header("location: ./categorias.php");
    }
}

?>
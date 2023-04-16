<?php
        include("../includes/conexion.php");


        $titulo = $_POST['nombre'];

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

        // Construir consulta SQL para insertar los datos en la tabla "categoria"
        $insertar = "INSERT INTO `categoria` (`nombre`, `foto`, `nombreFoto`, `tipoFoto`)
                        VALUES ('$titulo', '$contenido_imagen', '$imagen_nombre', '$imagen_tipo')";
        $resultado = mysqli_query($conectar , $insertar);

        header("location: ./categorias.php");
        
?>



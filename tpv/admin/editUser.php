<?php


include("../includes/conexion.php");

$id = $_GET['id'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$rol = $_POST['rol'];

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



if ($password != "") {
    if ($nombre != "") {
        if ($contenido_imagen !== null) {
            /* Existe todo; Hacer consulta respectivamente.*/
            $editar = "UPDATE `tpv`.`empleado` SET `nombre` = '$nombre', `contraseña` = '$password', `rol` = '$rol', `foto` = '$contenido_imagen', `nombreFoto` = '$imagen_nombre',`tipoFoto` = '$imagen_tipo'  WHERE (`id` = '$id');";
            $resultado = mysqli_query($conectar, $editar);

            header("location: ./administracion.php");
            
         } else {
            /* Existe la contraseña y el nombre pero NO la foto; Hacer consulta respectivamente.*/
            $editar = "UPDATE `tpv`.`empleado` SET `nombre` = '$nombre', `contraseña` = '$password', `rol` = '$rol' WHERE (`id` = '$id');";
            $resultado = mysqli_query($conectar, $editar);

            header("location: ./administracion.php");

         }

     } else{
        if ($contenido_imagen !== null) {
                    /* Existe foto y la contraseña pero NO el nombre; Hacer consulta respectivamente.*/
                    $editar = "UPDATE `tpv`.`empleado` SET `contraseña` = '$password', `rol` = '$rol', `foto` = '$contenido_imagen', `nombreFoto` = '$imagen_nombre',`tipoFoto` = '$imagen_tipo' WHERE (`id` = '$id');";
                    $resultado = mysqli_query($conectar, $editar);

                    header("location: ./administracion.php");

                } else {
                    /* Existe la contraseña pero NO el nombre ni la foto; Hacer consulta respectivamente.*/

                    $editar = "UPDATE `tpv`.`empleado` SET `contraseña` = '$password', `rol` = '$rol' WHERE (`id` = '$id')";
                    $resultado = mysqli_query($conectar, $editar);

                    header("location: ./administracion.php");
                    
            }
        }

    }   else {
            if ($nombre != "") {
                if ($contenido_imagen !== null) {
                                /* Existe nombre y foto, pero NO contraseña; Hacer consulta respectivamente.*/
                                    $editar = "UPDATE `tpv`.`empleado` SET `nombre` = '$nombre', `rol` = '$rol', `foto` = '$contenido_imagen', `nombreFoto` = '$imagen_nombre',`tipoFoto` = '$imagen_tipo' WHERE (`id` = '$id');";
                                    $resultado = mysqli_query($conectar, $editar);

                                    header("location: ./administracion.php");
                                    
                                } else {
                                    /* Existe nombre, pero NO contraseña ni foto; Hacer consulta respectivamente.*/
                                    $editar = "UPDATE `tpv`.`empleado` SET `nombre` = '$nombre', `rol` = '$rol' WHERE (`id` = '$id');";
                                    $resultado = mysqli_query($conectar, $editar);

                                    header("location: ./administracion.php");
                                }
                            } else  {
                                if ($contenido_imagen !== null) {
                                    
                                            /* Existe foto, pero NO contraseña ni nombre; Hacer consulta respectivamente.*/
                                            $editar = "UPDATE `tpv`.`empleado` SET `rol` = '$rol', `foto` = '$contenido_imagen', `nombreFoto` = '$imagen_nombre',`tipoFoto` = '$imagen_tipo' WHERE (`id` = '$id');";
                                            $resultado = mysqli_query($conectar, $editar);

                                            header("location: ./administracion.php");

                                            }  else {
                                                if (isset($rol)) {
                                                    /* Solor existe el rol */
                                                    $editar = "UPDATE `tpv`.`empleado` SET `rol` = '$rol' WHERE (`id` = '$id');";
                                                    $resultado = mysqli_query($conectar, $editar);

                                                    header("location: ./administracion.php");

                                                }else{
                                                    header("location: ./administracion.php");
                                                }
                                            

                                            }
                                    }  
                            }
                
            


?>


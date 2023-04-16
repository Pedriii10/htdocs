<?php

   
    session_start();

   include("includes/conexion.php");

   if (isset($_POST['usuario'])) {
        if (isset($_POST['contrasena'])) {
            if (strlen($_POST['usuario'])) {
                if (strlen($_POST['contrasena'])) {
                    $usuario = $_POST["usuario"];
                    $pass = $_POST["contrasena"];

                    $query = " select *
                            from empleado e
                            where e.nombre  LIKE ? and e.contraseña LIKE ?";

                    $stmt = mysqli_prepare($conectar, $query);
                    mysqli_stmt_bind_param($stmt, "ss", $usuario, $pass);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if (mysqli_num_rows($result) > 0) {
                        $usuario = $_POST['usuario'];

                        $queryRol = " select rol from empleado where (`nombre` = '$usuario')";
                        $resultado = mysqli_query($conectar, $queryRol);

                        if ($fila = mysqli_fetch_assoc($resultado)) {
                            $rol = $fila["rol"];
                            if ($rol == "administrador" || $rol == "Administrador") {
                                $_SESSION["nombre"] = $usuario;
                                $_SESSION["validar"] = "true";
                                header("location: admin/inicio.php");
                            } else {
                                $_SESSION["nombre"] = $usuario;
                                $_SESSION["validar"] = "true";
                                header("location: empleado/inicio.php");
                            }
                        
                    } else {
                        $_SESSION["error"] = "El usuario o la contraseña son incorrectos";
                        header("location: login.php");
                    }
                } else {
                    $_SESSION["errorContra"] = "La contraseña no puede estar vacia";
                    header("location: login.php");
                }
            } else {
                if (strlen($_POST['contrasena'])) {
                    $_SESSION["errorUsuario"] = "El Usuario no puede estar vacio";
                    header("location: login.php");
                } else {
                    $_SESSION["errorUsuario"] = "El Usuario no puede estar vacio";
                    $_SESSION["errorContra"] = "La contraseña no puede estar vacia";
                    header("location: login.php");
                }
            }
        } else {
            $_SESSION["errorContra"] = "La contraseña no puede estar vacia";
            header("location: login.php");
        }
   } else {
        if (isset($_POST['contrasena'])) {
           $_SESSION["errorUsuario"] = "El Usuario no puede estar vacio";
           header("location: login.php");
        } else {
            $_SESSION["errorUsuario"] = "El Usuario no puede estar vacio";
            $_SESSION["errorContra"] = "La contraseña no puede estar vacia";
            header("location: login.php");
        }
   }
}
    
?>
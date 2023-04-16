<?php
  session_start();
?>

<?php
        include("../includes/navbarEmpleado.php");
        include("../includes/conexion.php");
             
        $consulta = "SELECT id, nombre, contraseña, rol, foto, nombreFoto, tipoFoto FROM empleado";
        $resultado = mysqli_query($conectar , $consulta);

        

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/administracion.css">
    <style>
    </style>
</head>
<body>
    
    <section class="home" >
        <div class="header">
            <div class="titulo">
                <h1>
                    Panel Administracion
                </h1>
            </div>
        </div>

        <div class="container">
          <?php while ($rows = mysqli_fetch_assoc($resultado)) { ?>

                <div class="usuario">
                    <div class="carta">
                      <div class="usuario-carta">
                          <div class="imagen">
                              <img src="<?php echo 'data:'.$rows['tipoFoto'].';base64,'.base64_encode($rows['foto']); ?>" alt="">
                          </div>

                          <div class="datos">
                              <span class="nombre"><?php echo $rows['nombre']; ?> </span>
                              <span class="pass">"<?php echo $rows['contraseña']; ?>"</span>
                          </div>

                          <div class="rol">
                              <span><?php echo $rows['rol']; ?></span>
                          </div>

                      </div>
                  </div>
                </div>

            <?php } ?>
          </div>
    </section>
    
    <script>
      var boton = document.getElementById("abrir-formulario");
      var formulario = document.getElementById("formulario");
      
      boton.addEventListener("click", function(event) {
        event.preventDefault();
        formulario.classList.toggle("mostrar");
      });

      var cerrarBoton = document.getElementById("cerrar-formulario");

      cerrarBoton.addEventListener("click", function(event) {
      event.preventDefault();
      formulario.classList.remove("mostrar");
      });


    </script>

    <script>
        function validar() {
            
          var formvalido = true;
          let usuario = document.getElementById("nombre");
          if (usuario.value == "") {
            document.getElementById("errorNombre").innerHTML = "Es necesario escribir el campo Nombre";
            formvalido = false;
          }

          let contra = document.getElementById("password");
          if (contra.value == "") {
            document.getElementById("errorPass").innerHTML = "Es necesario escribir el campo Contraseña";
            formvalido = false;
        }

        let option = document.getElementById("rol");
          if (option.value == "") {
            document.getElementById("errorOption").innerHTML = "Es necesario elegir una opción";
            formvalido = false;
        }

        

        return formvalido;
        
        }


    </script>
</body>
</html>
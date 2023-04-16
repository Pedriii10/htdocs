<?php
  session_start();
?>

<?php
        include("../includes/navbar.php");
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
            <div class="botones">
                <div class="boton">
                  <a href="#" id="abrir-formulario"><button >Añadir</button></a>
                </div>
                <div class="boton">
                  <a href="borrarUser.php"><button >Borrar</button></a>
                </div>
                <div class="boton">
                  <a href="editarUser.php"><button >Editar</button></a>
                </div>
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

        <div id="formulario" id="formularioAdd">
        <h2 class="titulo-addUsu">Añadir Usuario</h2>
                <form action="./addUser.php" method="POST" onsubmit="return validar()" enctype="multipart/form-data">
                    <span class="cerrar" id="cerrar-formulario"><button class='bx bx-x ' style="background-color: #161718; border: none;"></button></span>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" />
                    <label for="" id="errorNombre" style="color: red"></label>
                    
                    <label for="password">Contraseña:</label>
                    <input type="text" id="password" name="password">
                    <label for="" id="errorPass" style="color: red"></label>
                    
                    <label for="rol">Rol:</label>
                    <select id="rol" name="rol" >
                        <option value="administrador" class="option">Administrador</option>
                        <option value="empleado" class="option">Empleado</option>
                    </select>
                    <label for="" id="errorOption" style="color: red"></label>
                    
                    <label for="foto" style="margin-top: 60px">Foto:</label>
                    <input type="file" id="foto" name="foto" class="add-file">
                    <label for="" id="errorFoto" style="color: red"></label>
                    
                    <button type="submit">Enviar</button>
                </form>
                      
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
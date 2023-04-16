<?php
        include("../includes/navbarEmpleado.php");
        include("../includes/conexion.php");
        
        $consulta = "SELECT id, nombre, foto, tipoFoto, nombreFoto FROM categoria";
        $resultado = mysqli_query($conectar , $consulta);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/categorias.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    
    <section class="home" style="background-image: url(../img/fondoCategorias.jpg); background-size: cover; background-attachment: fixed; overflow: scroll">
    
        <div class="text">
            <h1 style=" position: relative; color: white">Categorias</h1>
            <a href="#" id="abrir-formulario"><button class="add"> Añadir Categria </button></a>

            <div class="cajaPadre">
                <?php while ($rows = mysqli_fetch_assoc($resultado)) { ?>
                
                <?php $id = $rows['id'];?>
                <div class="cajon">
                    <div class="borrar" >
                        <a href="editarDatosCategoria.php?id=<?php echo $id; ?>">  
                                <i class='bx bxs-pencil icono'></i>
                        </a>
                    </div>
                    <a href="./productos.php">
                    <img src="<?php echo 'data:'.$rows['tipoFoto'].';base64,'.base64_encode($rows['foto']); ?>" alt="" class="imagenes">
                    </a>
                    <hr class="hr">
                    <a href="./productos.php">
                        <h3 class="h3" name="<?php $id ?>">
                            <?php
                                echo $rows['nombre'];
                             ?>
                        </h3>
                    </a>
                </div>
                
                <?php } ?>
             </div>

             <div id="formulario" id="formularioAdd">
                <span class="cerrar" id="cerrar-formulario"><button class='bx bx-x ' style="background-color: #161718; border: none;"></button></span>
                <h2 class="titulo-addUsu">Añadir Categoria</h2>

                <form action="./addCategoria.php" method="POST" onsubmit="return validar()" enctype="multipart/form-data">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" />
                    <label for="" id="errorNombre" style="color: red; font-size: 20px"></label>
                                    
                    <label for="foto" style="margin-top: 60px">Foto:</label>
                    <input type="file" id="foto" name="foto" class="add-file">
                    <label for="" id="errorFoto" style="color: red"></label>
                    
                    <button type="submit">Enviar</button>
                </form>    
            </div>
  <!-- 
            <div id="formulario2" id="formularioAdd">
                <span class="cerrar" id="cerrar-formulario"><button class='bx bx-x ' style="background-color: #161718; border: none;"></button></span>
                <h2 class="titulo-addUsu">Editar Categoria</h2>
                <form action="./editCategoria.php" method="POST" onsubmit="return validar()">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" />
                    <label for="" id="errorNombre" style="color: red; font-size: 20px"></label>
                                    
                    <label for="foto" style="margin-top: 60px">Foto:</label>
                    <input type="file" id="foto" name="foto" class="add-file">
                    <label for="" id="errorFoto" style="color: red"></label>
                    
                    <button type="submit">Enviar</button>
                </form>    
            </div>

    </section>
-->
    

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

<!-- 

<script>
      var boton = document.getElementById("abrir-formulario2");
      var formulario = document.getElementById("formulario2");
      
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
    
-->


    <script>
        function validar() {
            
          var formvalido = true;
          let usuario = document.getElementById("nombre");
          if (usuario.value == "") {
            document.getElementById("errorNombre").innerHTML = "Es necesario escribir el campo Nombre";
            formvalido = false;
          }

        return formvalido;
        
        }


    </script>
</body>
</html>
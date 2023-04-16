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
                  <a href="administracion.php" ><button >Añadir</button></a>
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
            <?php $id = $rows['id'];?>
                <div class="usuario">
                    <div class="carta">
                      <div class="usuario-carta">
                          <div class="imagen">
                              <img src="<?php echo 'data:'.$rows['tipoFoto'].';base64,'.base64_encode($rows['foto']); ?>" alt="">
                          </div>

                          <div class="boton-editar">
                            <a href="editarDatosUser.php?id=<?php echo $id; ?>">
                                <i class='bx bxs-pencil editar'></i>
                            </a>
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
    </script>

   
</body>
</html>
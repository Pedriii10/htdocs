<?php
  session_start();
?>

<?php
        include("../includes/navbar.php");
        include("../includes/conexion.php");
             
        $id = $_GET['id'];

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/categorias.css">
    <title>Document</title>
</head>
<body>
    <section class="home" style="display: flex; justify-content: center; align-items: center; background-image: url(../img/fondoEditarCategorias.jpg); background-size: cover; ">

        <div class="caja-form">
            <form action="editCategoria.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <div class="datos-form">
                
                <h1 class="titulo-form">Editar Categoria</h1>

                <div class="input">
                    <label for="">Nombre:</label>
                    <input type="text" name="nombre">
                </div>

                <div class="input">
                    <label for="">Foto:</label>
                    <input type="file" name="foto" style="color: white; font-weight: 500; font-family: Poppins; border: none;">
                </div>

                <div class="input">
                    <button type="submit">Enviar</button>
                </div>
                
            </div>
            </form>
        </div>
    </section>
</body>
</html>
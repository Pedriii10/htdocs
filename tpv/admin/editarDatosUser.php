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
    <link rel="stylesheet" href="../css/administracion.css">
    <title>Document</title>
</head>
<body>
    <section class="home" style="display: flex; justify-content: center; align-items: center; background-image: url(../img/editarUser.jpg);">
        <div class="caja-form">
            <form action="editUser.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <div class="datos-form">
                
                <h1 class="titulo-form">Editar Usuario</h1>

                <div class="input">
                    <label for="">Nombre:</label>
                    <input type="text" name="nombre">
                </div>

                <div class="input">
                    <label for="">Contraseña:</label>
                    <input type="text" name="password">
                </div>

                <div class="input">
                    <label for="">Rol:</label>
                    <select name="rol" >
                        <option value="empleado" >Empleado</option>
                        <option value="administrador" >Administrador</option>
                    </select>
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
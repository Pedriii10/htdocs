<?php
        include("../includes/navbarEmpleado.php");
        include("../includes/conexion.php");
        
        $consulta = "SELECT id, nombreProducto, foto, nombreFoto, tipoFoto, precio FROM producto";
        $resultado = mysqli_query($conectar , $consulta);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/productos.css">
</head>
<body>

    <section class="home">

        <div class="header">
            <div class="titulo">
                <h1>Productos</h1>
            </div>
        </div>

        <div class="container">
            <div class="categorias">

                <div class="nombre-categoria">
                    <span>Camisetas</span>
                    <button>Añadir producto</button>
                </div>

                <div class="caja-productos" >
                <?php while ($rows = mysqli_fetch_assoc($resultado)) { ?>
                    <?php $id = $rows['id'];?>
                            <div class="producto">
                                <div class="imagen">
                                    <img src="<?php echo 'data:'.$rows['tipoFoto'].';base64,'.base64_encode($rows['foto']); ?>" alt="">
                                </div>

                                <div class="botones-editar">
                                    <a href="./editarDatosProducto.php?id=<?php echo $id; ?>"><button> Editar </button></a>
                                    <button> Borrar </button>
                                </div>

                                <div class="datos">
                                    <h3><?php echo $rows['nombreProducto']; ?></h3>
                                </div>
                                
                                <div class="carrito">
                                    <button> Comprar </button>
                                    <span><?php echo $rows['precio']; ?>€</span>
                                </div>
                            </div> 
                        
                      <?php } ?>  
                </div>
            
            </div>   
        </div> 

    </section>

</body>
</html>
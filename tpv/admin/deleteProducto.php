<?php

include("../includes/conexion.php");

$id = $_GET['id'];
        
$borrar = "DELETE FROM `producto` WHERE id = '".$id."'";
$resultado = mysqli_query($conectar, $borrar);

header("location: ./productos.php");


?>
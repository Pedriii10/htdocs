<?php

include("../includes/conexion.php");

$id = $_GET['id'];
        
$borrar = "DELETE FROM `categoria` WHERE id = '".$id."'";
$resultado = mysqli_query($conectar, $borrar);

header("location: ./categorias.php");


?>
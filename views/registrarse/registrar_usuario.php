<?php
include('conexion.php');
// Obtener los datos del formulario

$nombre = $_REQUEST['nombre'];
$Apellido = $_REQUEST['Apellido'];
$Contra = $_REQUEST['Contra'];


// Conectar a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'familycalc') or die("Problemas en la conexión: " . mysqli_connect_error());

// Inserción de datos en la base
    $sql = "INSERT INTO casa ( nombre, Apellido, Contra) 
            VALUES ( '$nombre','$apellido', '$Contra')";

mysqli_query($conexion, $sql) or die("Problemas en el select: " . mysqli_error($conexion));
mysqli_close($conexion);
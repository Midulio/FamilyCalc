<?php
include('../../../conexion.php');
// Obtener los datos del formulario

$nombre = $_REQUEST['nombre'];
$Calle = $_REQUEST['Calle'];
$Numero = $_REQUEST['Numero'];
$Localidad= $_REQUEST['Localidad'];
$Provincia = $_REQUEST['Provincia'];


// Conectar a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'familycalc') or die("Problemas en la conexión: " . mysqli_connect_error());

// Inserción de datos en la base
    $sql = "INSERT INTO casa ( nombre, calle, numero, localidad, provincia) 
            VALUES ( '$nombre','$Calle', '$Numero', '$Localidad', '$Provincia')";

mysqli_query($conexion, $sql) or die("Problemas en el select: " . mysqli_error($conexion));
mysqli_close($conexion);

header("Location: index_casa.php");


?>
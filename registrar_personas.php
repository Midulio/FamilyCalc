<?php
include('conexion.php');
// Obtener los datos del formulario

$nombre = $_REQUEST['Nombre'];
$apellido = $_REQUEST['apellido'];
$Sexo = $_REQUEST['Sexo'];


// Conectar a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'familycalc') or die("Problemas en la conexión: " . mysqli_connect_error());

// Inserción de datos en la base
    $sql = "INSERT INTO persona ( nombre, apellido, sexo) 
            VALUES ( '$nombre','$apellido', '$Sexo')";

mysqli_query($conexion, $sql) or die("Problemas en el select: " . mysqli_error($conexion));
mysqli_close($conexion);




<?php
$servidor = "localhost";
$usuario = "root";
$pass = "";
$base = "midb"; // Cambiá por el nombre real

$conexion = mysqli_connect($servidor, $usuario, $pass, $base) or die("Error de conexión");
?>

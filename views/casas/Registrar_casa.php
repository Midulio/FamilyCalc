<?php
include("../../conexion.php");

$nombre = $_POST['nombre'];
$calle = $_POST['Calle'];
$numero = $_POST['Numero'];
$localidad = $_POST['Localidad'];
$provincia = $_POST['Provincia'];

$sql = "INSERT INTO casa (nombre, calle, numero, localidad, provincia) VALUES (?, ?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssiss", $nombre, $calle, $numero, $localidad, $provincia);

if ($stmt->execute()) {
    echo "OK";
} else {
    echo "Error: " . $stmt->error;
}
?>
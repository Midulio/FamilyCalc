<?php
include("../../../conexion.php");

$id_casa = $_POST['id_casa'] ?? null;
$nombre = $_POST['nombre'] ?? null;
$apellido = $_POST['apellido'] ?? null;
$sexo = $_POST['sexo'] ?? null;

// Validamos que todos los campos lleguen
if (!$id_casa || !$nombre || !$apellido || !$sexo) {
    echo "Error: faltan datos";
    exit;
}

$sql = "INSERT INTO persona (id_casa, nombre, apellido, sexo) VALUES (?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);

if (!$stmt) {
    echo "Error en prepare: " . $conexion->error;
    exit;
}

$stmt->bind_param("isss", $id_casa, $nombre, $apellido, $sexo);

if ($stmt->execute()) {
    echo "OK";
} else {
    echo "Error al insertar: " . $stmt->error;
}
?>
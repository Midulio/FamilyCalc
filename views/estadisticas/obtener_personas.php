<?php
$conexion = new mysqli("localhost", "root", "", "familycalc");

$casa = $_GET["casa"] ?? null;

$query = $conexion->prepare("
    SELECT id_persona, nombre, apellido 
    FROM persona
    WHERE id_casa = ?
");
$query->bind_param("i", $casa);
$query->execute();

$resultado = $query->get_result();

$personas = [];
while ($row = $resultado->fetch_assoc()) {
    $personas[] = $row;
}

echo json_encode($personas);
?>
<?php
include('../../conexion.php');

if (!isset($_GET['id_casa'])) {
    echo json_encode([]);
    exit;
}

$id_casa = intval($_GET['id_casa']);

$sql = "SELECT id_persona, nombre, apellido FROM persona WHERE id_casa = $id_casa";
$result = $conexion->query($sql);

$personas = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $personas[] = [
            'id_persona' => $row['id_persona'],
            'nombre' => $row['nombre'],
            'apellido' => $row['apellido'],
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($personas);
?>

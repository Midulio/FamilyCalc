<?php
include("../../../conexion.php"); // Ajusta la ruta si es necesario

// Establecer el encabezado para que el navegador sepa que es JSON
header('Content-Type: application/json');

if (!isset($_GET['id'])) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Falta el ID de la persona']);
    exit;
}

$id_persona = $_GET['id'];

$sql = "SELECT id_persona, id_casa, nombre, apellido, sexo 
        FROM persona 
        WHERE id_persona = ?";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id_persona);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado && $resultado->num_rows > 0) {
    $datos = $resultado->fetch_assoc();
    echo json_encode($datos); // Devuelve los datos de la persona
} else {
    http_response_code(404); // Not Found
    echo json_encode(['error' => 'Persona no encontrada']);
}

$stmt->close();
$conexion->close();
?>
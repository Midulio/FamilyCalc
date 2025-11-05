<?php
include("../../conexion.php");
header('Content-Type: application/json; charset=utf-8');

if (!isset($_GET['id'])) {
    echo json_encode(['success' => false, 'message' => 'ID no recibido']);
    exit;
}

$id = intval($_GET['id']);

$sql = "SELECT id_movimientos, id_casa, id_persona, id_servicio, importe, fecha_ingreso, estados, tipo_de_gastos
        FROM movimientos
        WHERE id_movimientos = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['success' => true, 'data' => $result->fetch_assoc()]);
} else {
    echo json_encode(['success' => false, 'message' => 'Movimiento no encontrado']);
}

$stmt->close();
$conexion->close();
?>
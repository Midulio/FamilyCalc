<?php
include("../../conexion.php");
header('Content-Type: application/json; charset=utf-8');

$response = ['success' => false, 'message' => 'Error desconocido'];

if (!empty($_GET['id_movimiento'])) {
    $id = intval($_GET['id_movimiento']);
    $query = "DELETE FROM movimientos WHERE id_movimientos = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $response = ['success' => true, 'message' => 'Movimiento eliminado correctamente'];
    } else {
        $response = ['success' => false, 'message' => 'Error al eliminar el movimiento'];
    }
} else {
    $response = ['success' => false, 'message' => 'ID de movimiento no proporcionado'];
}

echo json_encode($response);
exit;
?>
<?php
include("../../conexion.php");
header('Content-Type: application/json; charset=utf-8');

if (
    empty($_POST['id_movimiento']) ||
    empty($_POST['id_casa']) ||
    empty($_POST['id_persona']) ||
    empty($_POST['id_servicio']) ||
    empty($_POST['importe']) ||
    empty($_POST['fecha_ingreso']) ||
    empty($_POST['estados']) ||
    empty($_POST['tipo_de_gastos'])
) {
    echo json_encode(['success' => false, 'message' => 'Faltan datos obligatorios.']);
    exit;
}

$id_movimiento = intval($_POST['id_movimiento']);
$id_casa = intval($_POST['id_casa']);
$id_persona = intval($_POST['id_persona']);
$id_servicio = intval($_POST['id_servicio']);
$importe = floatval($_POST['importe']);
$fecha_ingreso = $_POST['fecha_ingreso'];
$estados = $_POST['estados'];
$tipo_de_gastos = $_POST['tipo_de_gastos'];

$sql = "UPDATE movimientos 
        SET id_casa=?, id_persona=?, id_servicio=?, importe=?, fecha_ingreso=?, estados=?, tipo_de_gastos=? 
        WHERE id_movimientos=?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("iiidsssi", $id_casa, $id_persona, $id_servicio, $importe, $fecha_ingreso, $estados, $tipo_de_gastos, $id_movimiento);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Movimiento actualizado correctamente.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al actualizar el movimiento.']);
}
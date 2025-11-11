<?php
include("../../conexion.php");
session_start();

// Verificamos si hay un usuario logueado
if (!isset($_SESSION['id_usuarios'])) {
    header("Content-Type: application/json");
    echo json_encode([], JSON_UNESCAPED_UNICODE);
    exit;
}

$id_usuario = $_SESSION['id_usuarios'];

// 1️⃣ Obtenemos la casa asociada al usuario logueado
$sqlCasa = "SELECT id_casa FROM casa WHERE id_usuarios = ?";
$stmtCasa = $conexion->prepare($sqlCasa);
$stmtCasa->bind_param("i", $id_usuario);
$stmtCasa->execute();
$resultCasa = $stmtCasa->get_result();
$casa = $resultCasa->fetch_assoc();

if (!$casa) {
    header("Content-Type: application/json");
    echo json_encode([], JSON_UNESCAPED_UNICODE);
    exit;
}

$id_casa = $casa['id_casa'];

// 2️⃣ Consulta SQL del resumen, filtrada solo a la casa del usuario
$sql = "
SELECT 
    COALESCE(p.Servicio, s.Servicio) AS servicio,
    FORMAT(SUM(m.importe), 2, 'es_AR') AS total
FROM movimientos m
LEFT JOIN Servicios s ON m.id_servicio = s.id_servicio
LEFT JOIN Servicios p ON s.id_padre = p.id_servicio
WHERE m.id_casa = ?
GROUP BY COALESCE(p.Servicio, s.Servicio)
ORDER BY servicio ASC
";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id_casa);
$stmt->execute();
$result = $stmt->get_result();

$resumen = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $resumen[] = $row;
    }
}

// 3️⃣ Devolvemos los datos en formato JSON
header("Content-Type: application/json");
echo json_encode($resumen, JSON_UNESCAPED_UNICODE);
?>
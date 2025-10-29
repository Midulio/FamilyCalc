<?php
include('../../conexion.php');

header('Content-Type: application/json; charset=utf-8');

$sql = "
    SELECT 
        s.Servicio AS nombre_servicio,
        IFNULL(SUM(m.importe), 0) AS total_gastado
    FROM servicios s
    LEFT JOIN movimientos m ON s.id_servicio = m.id_servicio
    GROUP BY s.id_servicio
    ORDER BY total_gastado DESC
";

$resultado = $conexion->query($sql);

$resumen = [];

if ($resultado && $resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $resumen[] = [
            'servicio' => $row['nombre_servicio'],
            'total' => number_format((float)$row['total_gastado'], 2, ',', '.')
        ];
    }
} else {
    $resumen = [];
}

echo json_encode($resumen, JSON_UNESCAPED_UNICODE);

$conexion->close();
?>

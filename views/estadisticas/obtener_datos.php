<?php
$conexion = new mysqli("localhost", "root", "", "familycalc");

$casa = $_GET["casa"] ?? null;
$persona = $_GET["persona"] ?? null;
$inicio = $_GET["inicio"] ?? null;
$fin = $_GET["fin"] ?? null;

$sql = "
    SELECT 
        s.Servicio AS servicio,
        SUM(m.importe) AS total
    FROM movimientos m
    LEFT JOIN Servicios s ON m.id_servicio = s.id_servicio
    WHERE 1=1
";

$params = [];
$types = "";

// FILTRO POR CASA
if ($casa !== null && $casa !== "") {
    $sql .= " AND m.id_casa = ? ";
    $params[] = $casa;
    $types .= "i";
}

// FILTRO POR PERSONA
if ($persona !== null && $persona !== "") {
    $sql .= " AND m.id_persona = ? ";
    $params[] = $persona;
    $types .= "i";
}

// FILTRO FECHA INICIO
if ($inicio !== null && $inicio !== "") {
    $sql .= " AND m.fecha_ingreso >= ? ";
    $params[] = $inicio;
    $types .= "s";
}

// FILTRO FECHA FIN
if ($fin !== null && $fin !== "") {
    $sql .= " AND m.fecha_ingreso <= ? ";
    $params[] = $fin;
    $types .= "s";
}

$sql .= " GROUP BY s.Servicio ORDER BY total DESC";

$query = $conexion->prepare($sql);

if (!empty($params)) {
    $query->bind_param($types, ...$params);
}

$query->execute();
$resultado = $query->get_result();

$servicios = [];
$totales = [];

while ($row = $resultado->fetch_assoc()) {
    $servicios[] = $row["servicio"];
    $totales[] = $row["total"];
}

echo json_encode([
    "servicios" => $servicios,
    "totales" => $totales
]);

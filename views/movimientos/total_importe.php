<?php
include("../../conexion.php");
session_start();

// Verificamos si hay un usuario logueado
if (!isset($_SESSION['id_usuarios'])) {
    echo "0,00"; // No hay sesión → sin total
    exit;
}

$id_usuario = $_SESSION['id_usuarios'];

// 1️⃣ Obtenemos la casa asociada al usuario
$sqlCasa = "SELECT id_casa FROM casa WHERE id_usuarios = ?";
$stmtCasa = $conexion->prepare($sqlCasa);
$stmtCasa->bind_param("i", $id_usuario);
$stmtCasa->execute();
$resultCasa = $stmtCasa->get_result();
$casa = $resultCasa->fetch_assoc();

if (!$casa) {
    echo "0,00"; // El usuario no tiene casa asociada
    exit;
}

$id_casa = $casa['id_casa'];

// 2️⃣ Sumamos los importes solo de esa casa
$sqlTotal = "SELECT SUM(importe) AS total FROM movimientos WHERE id_casa = ?";
$stmtTotal = $conexion->prepare($sqlTotal);
$stmtTotal->bind_param("i", $id_casa);
$stmtTotal->execute();
$resultTotal = $stmtTotal->get_result();
$row = $resultTotal->fetch_assoc();

// 3️⃣ Mostramos el resultado
if ($row && $row['total'] !== null) {
    echo number_format($row['total'], 2, ',', '.');
} else {
    echo "0,00";
}
?>
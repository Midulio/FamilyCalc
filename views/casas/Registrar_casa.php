<?php
// Inicia la sesión para acceder a los datos del usuario logueado
session_start();

// Incluye la conexión a la base de datos
include("../../conexion.php");

// --- Verifica si el usuario está logueado ---
if (!isset($_SESSION['id_usuarios'])) {
    echo "Error: No hay un usuario logueado.";
    exit;
}

// Obtiene el ID del usuario actual desde la sesión
$id_usuario = $_SESSION['id_usuarios'];

// --- Recepción de datos del formulario ---
$nombre = $_POST['nombre'] ?? null;
$calle = $_POST['Calle'] ?? null;
$numero = $_POST['Numero'] ?? null;
$localidad = $_POST['Localidad'] ?? null;
$provincia = $_POST['Provincia'] ?? null;

// --- Validación básica ---
if (empty($nombre) || empty($provincia)) {
    echo "Error: faltan datos obligatorios.";
    exit;
}

// --- Sentencia preparada (INSERT) ---
$sql = "INSERT INTO casa (id_usuarios, nombre, calle, numero, localidad, provincia) 
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ississ", $id_usuario, $nombre, $calle, $numero, $localidad, $provincia);

// --- Ejecución ---
if ($stmt->execute()) {
    echo "OK";
} else {
    echo "Error: " . $stmt->error;
}

// Cierre de recursos
$stmt->close();
$conexion->close();
?>
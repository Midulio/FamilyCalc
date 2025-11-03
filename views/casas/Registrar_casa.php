<?php
// Incluye el archivo de conexión a la base de datos (se asume que contiene la variable $conexion).
include("../../conexion.php");

// --- Recepción de datos del formulario (POST) ---
// Obtiene el valor del campo 'nombre' enviado por el formulario POST.
$nombre = $_POST['nombre'];
// Obtiene el valor del campo 'Calle' enviado por el formulario POST.
$calle = $_POST['Calle'];
// Obtiene el valor del campo 'Numero' enviado por el formulario POST.
$numero = $_POST['Numero'];
// Obtiene el valor del campo 'Localidad' enviado por el formulario POST.
$localidad = $_POST['Localidad'];
// Obtiene el valor del campo 'Provincia' enviado por el formulario POST.
$provincia = $_POST['Provincia'];

// --- Sentencia preparada (INSERT) ---
// Define la consulta SQL para INSERTAR una nueva fila en la tabla 'casa'.
// Se utilizan marcadores de posición '?' en lugar de los valores reales.
$sql = "INSERT INTO casa (nombre, calle, numero, localidad, provincia) VALUES (?, ?, ?, ?, ?)";
// Prepara la sentencia SQL para su ejecución, lo que ayuda a prevenir la inyección SQL.
$stmt = $conexion->prepare($sql);
// Vincula las variables a los marcadores de posición, especificando sus tipos:
// "ssiss" = string, string, integer, string, string.
$stmt->bind_param("ssiss", $nombre, $calle, $numero, $localidad, $provincia);

// --- Ejecución y manejo de errores ---
// Ejecuta la sentencia preparada.
if ($stmt->execute()) {
    // Si la inserción fue exitosa, imprime "OK" (generalmente para ser detectado por JavaScript).
    echo "OK";
// Si la ejecución falló.
} else {
    // Imprime un mensaje de error detallado, incluyendo el error específico de la sentencia.
    echo "Error: " . $stmt->error;
}
// Nota: Es recomendable cerrar $stmt y $conexion después de las operaciones si no se hace globalmente.
?>
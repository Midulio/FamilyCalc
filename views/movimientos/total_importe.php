<?php
// Incluye el archivo de conexión a la base de datos (donde se crea la variable $conexion)
include("../../conexion.php");

// Define la consulta SQL: obtiene la suma total de la columna 'importe' de la tabla 'movimientos'
$sql = "SELECT SUM(importe) AS total FROM movimientos";

// Ejecuta la consulta en la base de datos y guarda el resultado en $result
$result = $conexion->query($sql);

// Verifica si la consulta se ejecutó correctamente y si devolvió al menos una fila
if ($result && $row = $result->fetch_assoc()) {
    // Si hay resultados, muestra el total formateado con 2 decimales,
    // coma como separador decimal y punto como separador de miles
    echo number_format($row['total'], 2, ',', '.');
} else {
    // Si no hay resultados o hubo error, muestra "0,00" como valor por defecto
    echo "0,00";
}
?>

<?php
// Abre la etiqueta PHP.

include("../../../conexion.php");
// Incluye el archivo de conexión a la base de datos para acceder a la variable $conexion.

$id_casa = $_POST['id_casa'] ?? null;
// Obtiene el ID de la casa del POST; usa el operador null coalescing para asignar null si no existe.

$nombre = $_POST['nombre'] ?? null;
// Obtiene el nombre de la persona del POST.

$apellido = $_POST['apellido'] ?? null;
// Obtiene el apellido de la persona del POST.

$sexo = $_POST['sexo'] ?? null;
// Obtiene el sexo de la persona del POST.

// Validamos que todos los campos lleguen
if (!$id_casa || !$nombre || !$apellido || !$sexo) {
// Comprueba si alguna de las variables esenciales es nula o vacía.

echo "Error: faltan datos";
// Imprime un mensaje de error si faltan datos.

exit;
// Termina la ejecución del script.
}

$sql = "INSERT INTO persona (id_casa, nombre, apellido, sexo) VALUES (?, ?, ?, ?)";
// Define la consulta SQL de INSERCIÓN (INSERT) usando marcadores de posición '?' para los valores.

$stmt = $conexion->prepare($sql);
// Prepara la sentencia SQL para su ejecución, esencial para prevenir la inyección SQL.

if (!$stmt) {
// Verifica si la preparación de la sentencia falló (por un error de sintaxis SQL o conexión).

echo "Error en prepare: " . $conexion->error;
// Imprime un mensaje de error detallado sobre la falla en la preparación.

exit;
// Termina la ejecución del script.
}

$stmt->bind_param("isss", $id_casa, $nombre, $apellido, $sexo);
// Vincula los parámetros a la sentencia preparada, especificando sus tipos: i (entero), s (string), s (string), s (string).

if ($stmt->execute()) {
// Ejecuta la sentencia preparada y verifica si la inserción fue exitosa.

echo "OK";
// Imprime "OK" para que el lado del cliente (JavaScript) reconozca el éxito.

} else {
// Si la ejecución falló (ej. error de base de datos, violación de restricción).

echo "Error al insertar: " . $stmt->error;
// Imprime un mensaje de error detallado proporcionado por la sentencia.

}
?>
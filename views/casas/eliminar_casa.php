<?php
// Abre la etiqueta PHP.

include("../../conexion.php");
// Incluye el archivo de conexión a la base de datos para acceder a $conexion.

if (!empty($_GET['id_casa'])) {
// Comprueba si el parámetro 'id_casa' existe y no está vacío en la URL (método GET).
$id = intval($_GET['id_casa']); 
// Obtiene el valor del parámetro 'id_casa' y lo convierte a entero para asegurar que es un número.
$query = "DELETE FROM casa WHERE id_casa = ?";
// Define la consulta SQL de ELIMINACIÓN (DELETE) usando un marcador de posición '?'.
$stmt = $conexion->prepare($query);
// Prepara la sentencia SQL para su ejecución segura (prevención de inyección SQL).
$stmt->bind_param("i", $id);
// Vincula el valor de la variable $id al marcador de posición '?' como un entero ("i").
if ($stmt->execute()) {
// Ejecuta la sentencia preparada y verifica si la ejecución fue exitosa.
header("Location: index_casa.php");
// Si la eliminación fue exitosa, redirige al usuario a la página principal de casas.
exit;
// Termina la ejecución del script después de la redirección.
} else {
// Si la ejecución de la sentencia falló (ej. por un error de base de datos).
echo "Error al eliminar la casa.";
// Imprime un mensaje de error genérico.
}
} else {
// Si el parámetro 'id_casa' no fue proporcionado o estaba vacío.

echo "ID de casa no proporcionado.";
// Imprime un mensaje indicando que falta el ID.

}
?>
<?php
// Abre la etiqueta PHP.

include("../../conexion.php");
// Incluye el archivo de conexión a la base de datos (se asume que contiene la variable $conexion).

if (!isset($_GET['id'])) {
// Comprueba si el parámetro 'id' no fue proporcionado en la URL (método GET).
http_response_code(400);
// Establece el código de respuesta HTTP a 400 (Bad Request).
echo json_encode(["error" => "ID no proporcionado"]);
// Devuelve un mensaje de error en formato JSON.
exit;
// Termina la ejecución del script inmediatamente.
}

$id = intval($_GET['id']);
// Obtiene el valor del parámetro 'id' de la URL y asegura que sea un entero.

$sql = "SELECT * FROM casa WHERE id_casa = ?";
// Define la consulta SQL para seleccionar todos los campos de la tabla 'casa' donde el 'id_casa' coincide con un marcador de posición '?'.

$stmt = $conexion->prepare($sql);
// Prepara la sentencia SQL para su ejecución, previniendo la inyección SQL.

$stmt->bind_param("i", $id);
// Vincula el valor de la variable $id al marcador de posición '?' como un entero ("i").

$stmt->execute();
// Ejecuta la sentencia preparada.

$result = $stmt->get_result();
// Obtiene el conjunto de resultados de la consulta ejecutada.

if ($result && $row = $result->fetch_assoc()) {
// Verifica si se obtuvieron resultados Y si se pudo recuperar la primera fila como un array asociativo.
echo json_encode($row);
// Codifica el array asociativo ($row) a una cadena JSON y lo imprime (devuelve los datos de la casa).
} else {
// Si no hay resultados o la consulta falló.
http_response_code(404);
// Establece el código de respuesta HTTP a 404 (Not Found).
echo json_encode(["error" => "Casa no encontrada"]);
// Devuelve un mensaje de error indicando que la casa no fue encontrada.
}
?>
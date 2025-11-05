<?php
// Abre la etiqueta PHP.

include("../../../conexion.php"); 
// Incluye el archivo de conexión a la base de datos (se asume que contiene la variable $conexion).

// Establecer el encabezado para que el navegador sepa que es JSON
header('Content-Type: application/json');
// Configura el encabezado HTTP para indicar que la respuesta es JSON (crucial para llamadas AJAX).

if (!isset($_GET['id'])) {
// Comprueba si el parámetro 'id' (ID de la persona) no está presente en la solicitud GET.

http_response_code(400); 
// Establece el código de respuesta HTTP a 400 (Bad Request - Solicitud incorrecta).

echo json_encode(['error' => 'Falta el ID de la persona']);
// Devuelve un mensaje de error en formato JSON al cliente.

exit;
// Termina la ejecución del script.
}

$id_persona = $_GET['id'];
// Almacena el ID de la persona recibido por GET en una variable.

$sql = "SELECT id_persona, id_casa, nombre, apellido, sexo FROM persona WHERE id_persona = ?";
// Filtra por el ID de la persona usando un marcador de posición '?'.

$stmt = $conexion->prepare($sql);
// Prepara la sentencia SQL para su ejecución, esencial para la seguridad (prevención de inyección SQL).

$stmt->bind_param("i", $id_persona);
// Vincula el valor de $id_persona al marcador de posición '?' como un entero ("i").

$stmt->execute();
// Ejecuta la sentencia preparada en la base de datos.

$resultado = $stmt->get_result();
// Obtiene el conjunto de resultados de la ejecución de la consulta.

if ($resultado && $resultado->num_rows > 0) {
// Verifica si se obtuvieron resultados Y si hay al menos una fila.

$datos = $resultado->fetch_assoc();
// Recupera la primera fila de resultados como un array asociativo.

echo json_encode($datos); 
// Codifica el array de datos ($datos) a JSON y lo imprime como respuesta (éxito).
} else {
// Si no hay resultados o la consulta falló.

http_response_code(404); 
// Establece el código de respuesta HTTP a 404 (Not Found - Recurso no encontrado).

echo json_encode(['error' => 'Persona no encontrada']);
// Devuelve un mensaje de error en formato JSON.
}

$stmt->close();
// Cierra la sentencia preparada para liberar recursos del servidor de base de datos.

$conexion->close();
// Cierra la conexión a la base de datos.
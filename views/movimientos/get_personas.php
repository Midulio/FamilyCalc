<?php
// Incluye el archivo de conexión a la base de datos para poder usar la variable $conexion
include('../../conexion.php');

// Verifica si en la URL se recibió el parámetro 'id_casa' mediante el método GET
if (!isset($_GET['id_casa'])) {
    // Si no se recibe 'id_casa', devuelve un arreglo vacío en formato JSON
    echo json_encode([]);
    // Detiene la ejecución del script para evitar errores o consultas innecesarias
    exit;
}

// Convierte el valor recibido por GET a número entero para evitar inyecciones SQL o errores de tipo
$id_casa = intval($_GET['id_casa']);

// Crea la consulta SQL que obtiene las personas asociadas a la casa indicada
$sql = "SELECT id_persona, nombre, apellido FROM persona WHERE id_casa = $id_casa";

// Ejecuta la consulta en la base de datos y guarda el resultado en $result
$result = $conexion->query($sql);

// Crea un arreglo vacío donde se almacenarán los registros obtenidos
$personas = [];

// Verifica si la consulta se ejecutó correctamente y si devolvió filas
if ($result && $result->num_rows > 0) {
    // Recorre cada fila de resultados
    while ($row = $result->fetch_assoc()) {
        // Agrega cada persona al arreglo con su id, nombre y apellido
        $personas[] = [
            'id_persona' => $row['id_persona'],
            'nombre' => $row['nombre'],
            'apellido' => $row['apellido'],
        ];
    }
}

// Define el encabezado HTTP indicando que la respuesta será en formato JSON
header('Content-Type: application/json');

// Convierte el arreglo de personas a formato JSON y lo muestra como respuesta
echo json_encode($personas);
?>
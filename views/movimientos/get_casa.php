<?php
// Incluye el archivo de conexión a la base de datos (se asume que contiene la variable $conexion)
include('../../conexion.php'); 
// Ejecuta una consulta SQL para seleccionar el 'id_casa' y el 'nombre' de la tabla 'casa'.
// Los resultados se ordenan alfabéticamente por 'nombre' de forma ascendente.
$res = $conexion->query("SELECT id_casa, nombre FROM casa ORDER BY nombre ASC"); 
// Inicializa un array vacío que se usará para almacenar los datos de las casas.
$casas = [];
// Itera sobre el resultado de la consulta ($res) fila por fila.
// Por cada fila, la obtiene como un array asociativo ($row) y lo añade al array $casas.
while ($row = $res->fetch_assoc()) $casas[] = $row; 
// Codifica el array $casas (que contiene todos los resultados) como una cadena en formato JSON
// y la imprime. Esto se usa comúnmente para enviar datos a un cliente (por ejemplo, JavaScript).
echo json_encode($casas); 
?>
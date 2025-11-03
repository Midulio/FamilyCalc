<?php
// Incluye el archivo de conexión a la base de datos, donde se crea la variable $conexion
include("../../conexion.php");

// Consulta SQL que obtiene el total de importes agrupados por servicio padre o hijo
$sql = "SELECT 
    -- Usa COALESCE para tomar el nombre del servicio padre (p.Servicio),
    -- y si no tiene padre, toma el nombre del propio servicio (s.Servicio)
    COALESCE(p.Servicio, s.Servicio) AS servicio,

    -- Suma todos los importes (m.importe) de cada grupo de servicio
    -- y los formatea con dos decimales usando la configuración regional 'es_AR'
    FORMAT(SUM(m.importe), 2, 'es_AR') AS total

FROM movimientos m
    -- Une la tabla movimientos con la tabla Servicios (s) según el id_servicio
    LEFT JOIN Servicios s ON m.id_servicio = s.id_servicio

    -- Une nuevamente la tabla Servicios (p) para obtener el servicio padre
    LEFT JOIN Servicios p ON s.id_padre = p.id_servicio

-- Agrupa los resultados por el nombre del servicio padre o, si no lo hay, por el servicio mismo
GROUP BY COALESCE(p.Servicio, s.Servicio)

-- Ordena los resultados alfabéticamente por nombre de servicio
ORDER BY servicio ASC
";

// Ejecuta la consulta en la base de datos y guarda el resultado en $result
$result = $conexion->query($sql);

// Crea un arreglo vacío para guardar los datos que se obtendrán
$resumen = [];

// Verifica que la consulta se haya ejecutado correctamente y que existan filas en el resultado
if ($result && $result->num_rows > 0) {
    // Recorre cada fila del resultado como un array asociativo
    while ($row = $result->fetch_assoc()) {
        // Agrega cada fila (servicio y total) al array $resumen
        $resumen[] = $row;
    }
}

// Define el tipo de contenido de la respuesta como JSON (para que el navegador o JS lo interpreten correctamente)
header("Content-Type: application/json");

// Convierte el array $resumen a formato JSON y lo imprime como salida
// JSON_UNESCAPED_UNICODE evita que los caracteres especiales (como tildes o ñ) se escapen
echo json_encode($resumen, JSON_UNESCAPED_UNICODE);
?>

<?php
// Incluye el archivo de conexión a la base de datos (se asume que contiene la variable $conexion).
include("../../conexion.php");

// Comprueba si la solicitud HTTP se realizó utilizando el método POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene el ID de la casa a actualizar desde los datos enviados por POST.
    $id = $_POST['id_casa'];
    // Obtiene el nuevo nombre de la casa desde los datos POST.
    $nombre = $_POST['nombre'];
    // Obtiene la nueva calle desde los datos POST.
    $calle = $_POST['calle'];
    // Obtiene el nuevo número (de calle) desde los datos POST.
    $numero = $_POST['numero'];
    // Obtiene la nueva localidad desde los datos POST.
    $localidad = $_POST['localidad'];
    // Obtiene la nueva provincia desde los datos POST.
    $provincia = $_POST['provincia'];

    // Define la consulta SQL de ACTUALIZACIÓN (UPDATE) para la tabla 'casa'.
    // Se usan marcadores de posición '?' para los valores, lo que es esencial para sentencias preparadas.
    $sql = "UPDATE casa 
            SET nombre = ?, calle = ?, numero = ?, localidad = ?, provincia = ?
            WHERE id_casa = ?";
    
    // Prepara la sentencia SQL para su ejecución, previniendo ataques de inyección SQL.
    $stmt = $conexion->prepare($sql);
    // Vincula los parámetros a la sentencia preparada. El string "ssissi" define los tipos de datos:
    // s (string) para nombre, calle, localidad, provincia; i (integer) para numero e id.
    $stmt->bind_param("ssissi", $nombre, $calle, $numero, $localidad, $provincia, $id);

    // Ejecuta la sentencia preparada.
    if ($stmt->execute()) {
        // Si la actualización fue exitosa, imprime "OK" (este texto es usado por JavaScript para confirmar el éxito).
        echo "OK"; // ✅ Esto lo detecta el JS
    // Si la ejecución falló (por ejemplo, error de base de datos).
    } else {
        // Imprime "ERROR" (usado por JavaScript para notificar un fallo).
        echo "ERROR"; // ❌ También lo detecta el JS
    }

    // Cierra la sentencia preparada para liberar recursos.
    $stmt->close();
    // Cierra la conexión a la base de datos.
    $conexion->close();
// Cierra el bloque if que verifica el método POST.
}
?>
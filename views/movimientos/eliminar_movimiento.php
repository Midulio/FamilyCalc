<?php
// Incluye el archivo de conexión a la base de datos (se asume que contiene la variable $conexion)
include("../../conexion.amp"); 

// --- Inicia la lógica de eliminación ---
// Verifica si la variable 'id_movimiento' se ha pasado en la URL (a través del método GET) y no está vacía.
if (!empty($_GET['id_movimiento'])) {
    // Almacena el valor de 'id_movimiento' en la variable $id.
    // La función 'intval' sanitiza el valor, asegurando que sea un entero para mayor seguridad.
    $id = intval($_GET['id_movimiento']); 

    // Define la consulta SQL para eliminar una fila en la tabla 'movimientos'.
    // Se usa un marcador de posición '?' para la sentencia preparada.
    $query = "DELETE FROM movimientos WHERE id_movimientos = ?";
    // Prepara la sentencia SQL para su ejecución, lo que ayuda a prevenir inyecciones SQL.
    $stmt = $conexion->prepare($query);
    // Vincula la variable $id como un parámetro entero ('i') a la sentencia preparada.
    $stmt->bind_param("i", $id);

    // Ejecuta la sentencia preparada de eliminación.
    if ($stmt->execute()) {
        // Si la ejecución fue exitosa, redirige al usuario a la página principal de movimientos.
        header("Location: index_movimientos.php");
        // Termina la ejecución del script para asegurar que la redirección se complete.
        exit;
    // Si la ejecución falló (por ejemplo, error de base de datos).
    } else {
        // Muestra un mensaje de error al usuario.
        echo "Error al eliminar el movimiento.";
    }
// Si 'id_movimiento' no fue proporcionado en la URL.
} else {
    // Muestra un mensaje indicando que el ID necesario no se encontró.
    echo "ID de movimiento no proporcionado.";
}
?>
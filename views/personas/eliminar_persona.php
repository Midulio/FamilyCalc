<?php
include("../../conexion.php"); // Incluye el archivo de conexión a la base de datos

if (!empty($_GET['id_persona'])) { // Verifica que se haya pasado un parámetro 'id_persona' por URL y que no esté vacío
    $id = intval($_GET['id_persona']); // Convierte el valor del parámetro a entero (evita inyección SQL básica)

    $query = "DELETE FROM persona WHERE id_persona = ?"; // Prepara la consulta SQL con un marcador para el id
    $stmt = $conexion->prepare($query); // Prepara la sentencia para su ejecución
    $stmt->bind_param("i", $id); // Asocia el parámetro $id al marcador ?, especificando que es un entero ("i")

    if ($stmt->execute()) { // Ejecuta la sentencia y comprueba si se realizó correctamente
        header("Location: index_personas.php"); // Redirige al usuario al listado de personas
        exit; // Finaliza la ejecución del script tras la redirección
    } else {
        echo "Error al eliminar la persona."; // Muestra mensaje de error si la eliminación falla
    }
} else {
    echo "ID de persona no proporcionado."; // Muestra mensaje si no se pasó el parámetro id_persona por URL
}
?>
<?php
include("../../conexion.php");

if (!empty($_GET['id_persona'])) {
    $id = intval($_GET['id_persona']); // Convierte a entero, evita parte de la inyección

    $query = "DELETE FROM persona WHERE id_persona = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index_personas.php");
        exit;
    } else {
        echo "Error al eliminar la casa.";
    }
} else {
    echo "ID de casa no proporcionado.";
}
?>

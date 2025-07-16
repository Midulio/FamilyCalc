<?php
include("../../../conexion.php");

if (!empty($_GET['id_casa'])) {
    $id = intval($_GET['id_casa']); // Convierte a entero, evita parte de la inyección

    $query = "DELETE FROM casa WHERE id_casa = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index_casa.php");
        exit;
    } else {
        echo "Error al eliminar la casa.";
    }
} else {
    echo "ID de casa no proporcionado.";
}
?>

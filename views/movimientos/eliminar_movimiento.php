<?php
include("../../conexion.php");

if (!empty($_GET['id_movimiento'])) {
    $id = intval($_GET['id_movimiento']); // Convierte a entero, más seguro

    $query = "DELETE FROM movimientos WHERE id_movimientos = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index_movimientos.php");
        exit;
    } else {
        echo "Error al eliminar el movimiento.";
    }
} else {
    echo "ID de movimiento no proporcionado.";
}
?>

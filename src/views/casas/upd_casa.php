<?php
include("../../../conexion.php");

if (
    !empty($_POST['id_casa']) &&
    !empty($_POST['nombre']) &&
    !empty($_POST['calle']) &&
    !empty($_POST['numero']) &&
    !empty($_POST['localidad']) &&
    !empty($_POST['provincia'])
) {
    $id = $_POST['id_casa'];
    $nombre = $_POST['nombre'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $localidad = $_POST['localidad'];
    $provincia = $_POST['provincia'];

    $sql = "UPDATE casa SET nombre = ?, calle = ?, numero = ?, localidad = ?, provincia = ? WHERE id_casa = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssissi", $nombre, $calle, $numero, $localidad, $provincia, $id);

    if ($stmt->execute()) {
        header("Location: index_casa.php");
        exit;
    } else {
        echo "Error al actualizar la casa.";
    }
} else {
    echo "Completa todos los campos.";
}
?>

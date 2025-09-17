<?php
include("../../conexion.php");

if (
    !empty($_POST['id_persona']) &&
    !empty($_POST['id_casa']) &&
    !empty($_POST['nombre']) &&
    !empty($_POST['apellido']) &&
    !empty($_POST['sexo'])
) {
    $id = $_POST['id_persona'];
    $casa = $_POST['id_casa'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $sexo = $_POST['sexo'];
   

    $sql = "UPDATE persona SET id_casa = ?, nombre = ?, apellido = ?, sexo = ? WHERE id_persona = ?";
    $stmt = $conexion->prepare($sql);
 $stmt->bind_param("isssi", $casa, $nombre, $apellido, $sexo, $id);

    if ($stmt->execute()) {
        header("Location: index_personas.php");
        exit;
    } else {
        echo "Error al actualizar la casa.";
    }
} else {
    echo "Completa todos los campos.";
}
?>

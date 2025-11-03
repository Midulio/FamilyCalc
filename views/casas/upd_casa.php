<?php
include("../../conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_casa'];
    $nombre = $_POST['nombre'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $localidad = $_POST['localidad'];
    $provincia = $_POST['provincia'];

    $sql = "UPDATE casa 
            SET nombre = ?, calle = ?, numero = ?, localidad = ?, provincia = ?
            WHERE id_casa = ?";
    
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssissi", $nombre, $calle, $numero, $localidad, $provincia, $id);

    if ($stmt->execute()) {
        echo "OK"; // ✅ Esto lo detecta el JS
    } else {
        echo "ERROR"; // ❌ También lo detecta el JS
    }

    $stmt->close();
    $conexion->close();
}
?>
<?php
include("conexion.php");

if (isset($_POST['id_casa'])) {
    $id_casa = $_POST['id_casa'];
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $calle = mysqli_real_escape_string($conexion, $_POST['Calle']);
    $numero = (int) $_POST['Numero'];
    $localidad = mysqli_real_escape_string($conexion, $_POST['Localidad']);
    $provincia = mysqli_real_escape_string($conexion, $_POST['Provincia']);

    $sql = "UPDATE casa SET 
        nombre = '$nombre',
        Calle = '$calle',
        Numero = $numero,
        Localidad = '$localidad',
        Provincia = '$provincia'
        WHERE id_casa = $id_casa";

    if (mysqli_query($conexion, $sql)) {
        echo "✅ Casa actualizada con éxito. <a href='editar_casa.php'>Volver</a>";
    } else {
        echo "❌ Error al actualizar: " . mysqli_error($conexion);
    }
} else {
    echo "ID de casa no recibido.";
}
?>

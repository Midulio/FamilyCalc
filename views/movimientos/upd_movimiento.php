<?php
include("../../conexion.php");

if (
    !empty($_POST['id_movimiento']) &&
    !empty($_POST['id_casa']) &&
    !empty($_POST['id_persona']) &&
    !empty($_POST['importe']) &&
    !empty($_POST['fecha_ingreso']) &&
    !empty($_POST['estados']) &&
    !empty($_POST['servicios']) &&
    !empty($_POST['tipo_de_gastos'])
) {
    $id_movimiento = intval($_POST['id_movimiento']);
    $id_casa = intval($_POST['id_casa']);
    $id_persona = intval($_POST['id_persona']);
    $importe = floatval($_POST['importe']);
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $estados = $_POST['estados'];
    $servicios = $_POST['servicios'];
    $tipo_de_gastos = $_POST['tipo_de_gastos'];

    $sql = "UPDATE movimientos 
            SET id_casa = ?, id_persona = ?, importe = ?, fecha_ingreso = ?, estados = ?, servicios = ?, tipo_de_gastos = ?
            WHERE id_movimientos = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("iidssssi", $id_casa, $id_persona, $importe, $fecha_ingreso, $estados, $servicios, $tipo_de_gastos, $id_movimiento);

    if ($stmt->execute()) {
        header("Location: index_movimientos.php");
        exit;
    } else {
        echo "Error al actualizar el movimiento.";
    }
} else {
    echo "Completa todos los campos.";
}
?>

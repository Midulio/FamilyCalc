<?php
include('../../conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_casa = intval($_POST['id_casa']);
    $id_persona = intval($_POST['id_persona']);
    $id_servicio = intval($_POST['id_servicio']);
    $importe = floatval($_POST['importe']);
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $estados = $conexion->real_escape_string($_POST['estados']);
    $tipo_de_gastos = $conexion->real_escape_string($_POST['tipo_de_gastos']); 

    // Inserción segura con sentencias preparadas
    $sql = "INSERT INTO movimientos 
            (id_servicio, id_casa, id_persona, importe, fecha_ingreso, estados, tipo_de_gastos) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("iiidsss", $id_servicio, $id_casa, $id_persona, $importe, $fecha_ingreso, $estados, $tipo_de_gastos);

    if ($stmt->execute()) {
        $stmt->close();
        $conexion->close();
        header("Location: index_movimientos.php");
        exit;
    } else {
        echo "Error al registrar movimiento: " . $stmt->error;
    }
} else {
    echo "Método no permitido";
}
?>
<?php
include('../../conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_casa = intval($_POST['id_casa']);
    $id_persona = intval($_POST['id_persona']);
    $importe = floatval($_POST['importe']);
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $estados = $conexion->real_escape_string($_POST['estados']);
    $servicios = $conexion->real_escape_string($_POST['servicios']);
    $tipo_de_gastos = $conexion->real_escape_string($_POST['tipo_de_gastos']); 

    $sql = "INSERT INTO movimientos 
            (id_casa, id_persona, importe, fecha_ingreso, estados, servicios, tipo_de_gastos) 
            VALUES ($id_casa, $id_persona, $importe, '$fecha_ingreso', '$estados', '$servicios', '$tipo_de_gastos')";



    if ($conexion->query($sql) === TRUE) {
       mysqli_close($conexion);
            header("Location: create.php");
        // Redirigir a otra página o mostrar mensaje
    } else {
        echo "Error al registrar movimiento: " . $conexion->error;
    }
} else {
    echo "Método no permitido";
}
?>

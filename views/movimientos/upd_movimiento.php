<?php
// Incluye el archivo de conexión a la base de datos
include("../../conexion.php");

// Verifica que todos los campos requeridos del formulario hayan sido enviados y no estén vacíos
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
    // Convierte los valores recibidos a su tipo de dato correcto
    $id_movimiento = intval($_POST['id_movimiento']); // Convierte a entero
    $id_casa = intval($_POST['id_casa']); // Convierte a entero
    $id_persona = intval($_POST['id_persona']); // Convierte a entero
    $importe = floatval($_POST['importe']); // Convierte a número decimal
    $fecha_ingreso = $_POST['fecha_ingreso']; // Fecha en formato string (YYYY-MM-DD)
    $estados = $_POST['estados']; // Estado del movimiento (ej. “pagado”, “pendiente”, etc.)
    $servicios = $_POST['servicios']; // Categoría o servicio asociado al gasto
    $tipo_de_gastos = $_POST['tipo_de_gastos']; // Tipo de gasto (fijo, variable, etc.)

    // Sentencia SQL para actualizar los datos del movimiento en la base de datos
    $sql = "UPDATE movimientos 
            SET id_casa = ?, id_persona = ?, importe = ?, fecha_ingreso = ?, estados = ?, servicios = ?, tipo_de_gastos = ?
            WHERE id_movimientos = ?";

    // Prepara la sentencia para evitar inyecciones SQL
    $stmt = $conexion->prepare($sql);

    // Vincula los parámetros a la consulta preparada, especificando el tipo de cada uno:
    // i = integer, d = double, s = string
    $stmt->bind_param("iidssssi", $id_casa, $id_persona, $importe, $fecha_ingreso, $estados, $servicios, $tipo_de_gastos, $id_movimiento);

    // Ejecuta la consulta SQL
    if ($stmt->execute()) {
        // Si la actualización fue exitosa, redirige al usuario a la página principal de movimientos
        header("Location: index_movimientos.php");
        exit; // Finaliza el script después de la redirección
    } else {
        // Si hubo un error al ejecutar la consulta, muestra un mensaje de error
        echo "Error al actualizar el movimiento.";
    }
} else {
    // Si alguno de los campos está vacío, muestra un mensaje de advertencia
    echo "Completa todos los campos.";
}
?>
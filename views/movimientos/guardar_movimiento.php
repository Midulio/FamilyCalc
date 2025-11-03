<?php
// Incluye el archivo de conexión para poder usar la variable $conexion
include('../../conexion.php');

// Indica que la respuesta será en formato JSON y con codificación UTF-8
header('Content-Type: application/json; charset=utf-8');

// Crea una respuesta por defecto, útil en caso de que ocurra un error inesperado
$response = ["success" => false, "message" => "Error desconocido"];

// Verifica que la solicitud se haya hecho mediante el método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Convierte los valores recibidos por POST a los tipos adecuados
    // intval() convierte a entero, floatval() a decimal
    $id_casa = intval($_POST['id_casa']);
    $id_persona = intval($_POST['id_persona']);
    $id_servicio = intval($_POST['id_servicio']);
    $importe = floatval($_POST['importe']);
    $fecha_ingreso = $_POST['fecha_ingreso']; // Se toma directamente como string (YYYY-MM-DD)

    // Escapa los posibles caracteres peligrosos para evitar inyección SQL
    $estados = $conexion->real_escape_string($_POST['estados']);
    $tipo_de_gastos = $conexion->real_escape_string($_POST['tipo_de_gastos']);

    // Prepara la consulta SQL para insertar un nuevo movimiento en la tabla
    $sql = "INSERT INTO movimientos 
             (id_servicio, id_casa, id_persona, importe, fecha_ingreso, estados, tipo_de_gastos) 
             VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Verifica si la preparación de la consulta fue exitosa
    if ($stmt = $conexion->prepare($sql)) {

        // Asocia las variables a los marcadores (?) de la consulta
        // "iiidsss" indica los tipos de datos:
        // i = entero, d = decimal (double), s = cadena (string)
        $stmt->bind_param("iiidsss", 
            $id_servicio,      // 1° parámetro → id del servicio
            $id_casa,          // 2° parámetro → id de la casa
            $id_persona,       // 3° parámetro → id de la persona
            $importe,          // 4° parámetro → monto del movimiento
            $fecha_ingreso,    // 5° parámetro → fecha de ingreso
            $estados,          // 6° parámetro → estado (pagado, pendiente, etc.)
            $tipo_de_gastos    // 7° parámetro → tipo de gasto (Fijo, Variable, Ingreso)
        );
        
        // Ejecuta la consulta SQL preparada
        if ($stmt->execute()) {
            // Si la ejecución fue exitosa, devuelve una respuesta de éxito
            $response = ["success" => true, "message" => "Movimiento registrado correctamente"];
        } else {
            // Si hubo un error al ejecutar, guarda el mensaje de error
            $response["message"] = "Error al ejecutar SQL: " . $stmt->error;
        }

        // Cierra la consulta preparada para liberar recursos
        $stmt->close();

    } else {
        // Si no se pudo preparar la consulta, devuelve el error correspondiente
        $response["message"] = "Error al preparar SQL: " . $conexion->error;
    }

    // Cierra la conexión con la base de datos
    $conexion->close();

} else {
    // Si el método no es POST, responde con un mensaje de error
    $response["message"] = "Método no permitido";
}

// Devuelve la respuesta en formato JSON al cliente (JavaScript, por ejemplo)
echo json_encode($response, JSON_UNESCAPED_UNICODE);

// Termina la ejecución del script
exit;
?>
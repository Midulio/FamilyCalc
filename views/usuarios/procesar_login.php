<?php
include("../../conexion.php");
session_start();
header('Content-Type: application/json; charset=utf-8');

$response = ['success' => false, 'message' => 'Error desconocido'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = trim($_POST['usuario']);
    $contraseña = $_POST['contraseña'];

    // Validar campos vacíos
    if (empty($usuario) || empty($contraseña)) {
        $response['message'] = "Por favor, completa todos los campos.";
        echo json_encode($response);
        exit;
    }

    // Buscar usuario por nombre o email
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE nombre = ? OR email = ?");
    $stmt->bind_param("ss", $usuario, $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si el usuario existe
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verificar contraseña
        if (password_verify($contraseña, $user['PASSWORD'])) {
            $_SESSION['id_usuarios'] = $user['id_usuarios'];
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['email'] = $user['email'];

            $response = [
                'success' => true,
                'message' => 'Inicio de sesión exitoso'
            ];
        } else {
            $response['message'] = "La contraseña es incorrecta.";
        }
    } else {
        $response['message'] = "El nombre de usuario o correo no existe.";
    }

    $stmt->close();
}

echo json_encode($response);
?>
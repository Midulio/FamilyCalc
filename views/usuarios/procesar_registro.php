<?php
include("../../conexion.php");
header('Content-Type: application/json; charset=utf-8');

$response = ['success' => false, 'message' => 'Error desconocido'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = trim($_POST['usuario']);
    $email = trim($_POST['email']);
    $contraseña = $_POST['contraseña'];
    $rContraseña = $_POST['rContraseña'];

    // Validaciones vacíos
    if (empty($usuario) || empty($email) || empty($contraseña) || empty($rContraseña)) {
        echo json_encode(['success' => false, 'message' => 'Por favor, completa todos los campos.']);
        exit;
    }

    // Contraseñas iguales
    if ($contraseña !== $rContraseña) {
        echo json_encode(['success' => false, 'message' => 'Las contraseñas no coinciden.']);
        exit;
    }

    // Validar fortaleza
    $mayus = preg_match('@[A-Z]@', $contraseña);
    $minus = preg_match('@[a-z]@', $contraseña);
    $numero = preg_match('@[0-9]@', $contraseña);
    $especial = preg_match('@[^\w]@', $contraseña);
    if (!$mayus || !$minus || !$numero || !$especial || strlen($contraseña) < 8) {
        echo json_encode(['success' => false, 'message' => 'Las contraseñas deben contener al menos 8 caracteres, incluyendo mayúsculas, minúsculas, números y símbolos.']);
        exit;
    }

    // Verificar duplicados
    $check = $conexion->prepare("SELECT nombre, email FROM usuarios WHERE nombre = ? OR email = ?");
    $check->bind_param("ss", $usuario, $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['nombre'] === $usuario) {
            echo json_encode(['success' => false, 'message' => 'Este nombre de usuario ya está en uso.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Este correo electrónico ya está en uso.']);
        }
        exit;
    }

    // Insertar usuario
    $hash = password_hash($contraseña, PASSWORD_DEFAULT);
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, PASSWORD) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $usuario, $email, $hash);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Usuario registrado correctamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar usuario: ' . $stmt->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
?>
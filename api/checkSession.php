<?php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['id_usuarios'])) {
    echo json_encode([
        'logged' => true,
        'usuario' => $_SESSION['usuario'] ?? 'Usuario',
        'id' => $_SESSION['id_usuarios']
    ]);
} else {
    echo json_encode(['logged' => false]);
}

?>
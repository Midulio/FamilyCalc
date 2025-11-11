<?php
include("conexion.php");

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

// Consultar usuario
$query = "SELECT * FROM usuarios WHERE usuario='$usuario'";
$resultado = mysqli_query($conexion, $query);

if ($fila = mysqli_fetch_assoc($resultado)) {
    if (password_verify($clave, $fila['clave'])) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        echo "Bienvenido, $usuario";
        // header("Location: bienvenida.php"); // descomentá esto para redirigir
    } else {
        echo "Clave incorrecta.";
    }
} else {
    echo "Usuario no encontrado.";
}
?>
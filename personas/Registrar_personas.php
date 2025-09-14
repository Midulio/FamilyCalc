<?php
include('../../conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre'], $_POST['apellido'], $_POST['sexo'], $_POST['id_casa'])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $sexo = $_POST['sexo'];
        $id_casa = $_POST['id_casa'];

        $conexion = mysqli_connect('localhost', 'root', '', 'familycalc')
            or die("Error de conexión: " . mysqli_connect_error());

        $sql = "INSERT INTO persona (nombre, apellido, sexo, id_casa) VALUES (?, ?, ?, ?)";

        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssi", $nombre, $apellido, $sexo, $id_casa);

        if ($stmt->execute()) {
            mysqli_close($conexion);
            header("Location: create.php"); // o a donde quieras redirigir
            exit();
        } else {
            echo "Error en el insert: " . $stmt->error;
        }
    } else {
        echo "Faltan datos en el formulario.";
    }
} else {
    echo "Método no permitido.";
}

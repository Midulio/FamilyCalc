<?php
// Conexión para obtener casas
include('../../conexion.php');

$conexion = mysqli_connect('localhost', 'root', '', 'familycalc') or die("Error en conexión");

$sql = "SELECT id_casa, nombre FROM casa";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa; /* Color de fondo claro */
        }
        .container {
            max-width: 600px; /* Ancho máximo del contenedor del formulario */
            margin-top: 50px; /* Margen superior para centrar verticalmente */
            padding: 30px;
            background-color: #ffffff; /* Fondo del formulario blanco */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra sutil para darle profundidad */
        }
        .form-label {
            font-weight: 600; /* Etiquetas en negrita */
            color: #495057;
        }
        .form-control, .form-select {
            border-radius: 5px; /* Bordes redondeados para los campos */
        }
        .btn-primary {
            background-color: #007bff; /* Color azul de Bootstrap */
            border-color: #007bff;
            width: 100%; /* Botón al 100% de ancho */
            padding: 10px;
            font-size: 1.1rem;
            font-weight: bold;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        h2 {
            margin-bottom: 25px;
            text-align: center;
            color: #333;
        }
        /* Elimina el borde de los inputs para una apariencia más limpia */
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
            border-color: #007bff;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mb-4">Registro de Persona 📝</h2>
    <form action="Registrar_personas.php" method="post">

        <div class="mb-3">
            <label for="casa" class="form-label">Seleccionar Casa</label>
            <select name="id_casa" id="casa" class="form-select" required>
                <option value="" disabled selected>-- Elegí una casa --</option>
                <?php
                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        echo '<option value="'. $row['id_casa'] .'">'. htmlspecialchars($row['nombre']) .'</option>';
                    }
                } else {
                    echo '<option disabled>No hay casas disponibles</option>';
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required/>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" id="apellido" name="apellido" class="form-control" required/>
        </div>

        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <input type="text" id="sexo" name="sexo" class="form-control" required/>
        </div>

        <button type="submit" class="btn btn-primary">Registrar Persona</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
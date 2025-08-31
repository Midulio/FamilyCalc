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
    <title>Agregar Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

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
        <label>Nombre</label>
        <input type="text" name="nombre"  />
    </div>

    <div class="mb-3">
        <label>Apellido</label>
        <input type="text" name="apellido"  />
    </div>

    <div class="mb-3">
        <label>Sexo</label>
        <input type="text" name="sexo" />
    </div>

    <button type="submit" class="btn btn-primary">Registrar Persona</button>
</form>

</body>
</html>

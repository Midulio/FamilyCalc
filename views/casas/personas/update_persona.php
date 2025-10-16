<?php
include("../../../conexion.php");

$datos = null;

// Obtener datos de la persona a editar
if (isset($_GET['upd'])) {
    $id = $_GET['upd'];

    $sql = "SELECT * FROM persona WHERE id_persona = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultado = $stmt->get_result();
    if ($resultado->num_rows > 0) {
        $datos = $resultado->fetch_assoc();
    } else {
        die("Persona no encontrada.");
    }

    // Obtener casas
    $casas = $conexion->query("SELECT id_casa, nombre FROM casa");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="update.css">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-header text-center bg-primary text-white">
            <h2>Actualizar Persona</h2>
        </div>
        <div class="card-body">
            <form action="upd_persona.php" method="post">
                <input type="hidden" name="id_persona" value="<?= $datos['id_persona'] ?>">

                <div class="mb-3">
                    <label for="id_casa" class="form-label">Casa</label>
                    <select name="id_casa" id="id_casa" class="form-select" required>
                        <option value="" disabled>-- Selecciona una casa --</option>
                        <?php while ($casa = $casas->fetch_assoc()): ?>
                            <option value="<?= $casa['id_casa'] ?>" <?= $casa['id_casa'] == $datos['id_casa'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($casa['nombre']) ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="<?= $datos['nombre'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" value="<?= $datos['apellido'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select name="sexo" id="sexo" class="form-select" required>
                        <option value="" disabled>-- Selecciona sexo --</option>
                        <option value="Masculino" <?= $datos['sexo'] == "Masculino" ? 'selected' : '' ?>>Masculino</option>
                        <option value="Femenino" <?= $datos['sexo'] == "Femenino" ? 'selected' : '' ?>>Femenino</option>
                        <option value="Otro" <?= $datos['sexo'] == "Otro" ? 'selected' : '' ?>>Otro</option>
                    </select>
                </div>

                <div class="d-row mx-auto">
                    <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
                    <a href="../index_casa.php" class="btn btn-danger btn-lg"><img src="../../../src/volver-flecha.png" alt="Volver"></a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>

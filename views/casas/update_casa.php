<?php
include("../../conexion.php");

$datos = null;

if (isset($_GET['upd'])) {
    $id = $_GET['upd'];

    $sql = "SELECT * FROM casa WHERE id_casa = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultado = $stmt->get_result();
    if ($resultado->num_rows > 0) {
        $datos = $resultado->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta charset="UTF-8">
    <title>Actualizar Casa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="personas/update.css">

</head>
<body class="bg-light">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="container my-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-header text-center bg-primary text-white">
            <h2>Actualizar Casa</h2>
        </div>
        <div class="card-body">
            <form action="upd_casa.php" method="post">
                <input type="hidden" name="id_casa" value="<?= $datos['id_casa'] ?>">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" value="<?= $datos['nombre'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="calle" class="form-label">Calle</label>
                    <input type="text" name="calle" id="calle" class="form-control" placeholder="Calle" value="<?= $datos['calle'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="numero" class="form-label">Número</label>
                    <input type="number" name="numero" id="numero" class="form-control" placeholder="Número" value="<?= $datos['numero'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="localidad" class="form-label">Localidad</label>
                    <input type="text" name="localidad" id="localidad" class="form-control" placeholder="Localidad" value="<?= $datos['localidad'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="provincia" class="form-label">Provincia</label>
                    <input type="text" name="provincia" id="provincia" class="form-control" placeholder="Provincia" value="<?= $datos['provincia'] ?>" required>
                </div>

                <div class="d-row">
                    <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
                    <a href="index_casa.php" class="btn btn-danger btn-lg"><img src="../../src/volver-flecha.png" alt="Volver"></a>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>

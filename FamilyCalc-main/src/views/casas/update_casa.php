<?php
include("../../../conexion.php");


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

<div class="container m-auto">
    <div class="my-3 text-center d-flex flex-row justify-content-center">
        <p><h1>UPDATE CASA</h1></p>
    </div>
    <form action="upd_casa.php" method="post">
        <div class="form-group">
            <input type="hidden" name="id_casa" value="<?= $datos['id_casa'] ?>">
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre" value="<?= $datos['nombre'] ?>">
        </div>
        <div class="form-group">
            <input type="text" name="calle" id="calle" class="form-control" placeholder="calle" value="<?= $datos['calle'] ?>">
        </div>
        <div class="form-group">
            <input type="number" name="numero" id="numero" class="form-control" placeholder="numero" value="<?= $datos['numero'] ?>">
        </div>
        <div class="form-group">
            <input type="text" name="localidad" id="localidad" class="form-control" placeholder="localidad" value="<?= $datos['localidad'] ?>">
        </div>
        <div class="form-group">
            <input type="text" name="provincia" id="provincia" class="form-control" placeholder="provincia" value="<?= $datos['provincia'] ?>">
        </div>
        <input type="submit" value="Actualizar" class="btn btn-success">
    </form>
</div>




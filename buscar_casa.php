<?php
include("conexion.php");

if (isset($_GET['nombre'])) {
    $nombre = mysqli_real_escape_string($conexion, $_GET['nombre']);
    $sql = "SELECT * FROM casa WHERE nombre = '$nombre'";
    $resultado = mysqli_query($conexion, $sql);

    if ($fila = mysqli_fetch_assoc($resultado)) {
        ?>
        <h2>Modificar Casa: <?php echo htmlspecialchars($nombre); ?></h2>
        <form action="update_casa.php" method="post">
            <input type="hidden" name="id_casa" value="<?php echo $fila['id_casa']; ?>">

            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($fila['nombre']); ?>"><br>

            <label>Calle:</label>
            <input type="text" name="Calle" value="<?php echo htmlspecialchars($fila['Calle']); ?>"><br>

            <label>Número:</label>
            <input type="number" name="Numero" value="<?php echo htmlspecialchars($fila['Numero']); ?>"><br>

            <label>Localidad:</label>
            <input type="text" name="Localidad" value="<?php echo htmlspecialchars($fila['Localidad']); ?>"><br>

            <label>Provincia:</label>
            <input type="text" name="Provincia" value="<?php echo htmlspecialchars($fila['Provincia']); ?>"><br>

            <input type="submit" value="Actualizar">
        </form>
        <?php
    } else {
        echo "<p>Casa con nombre '$nombre' no encontrada.</p>";
    }
} else {
    // Formulario para buscar por nombre
    ?>
    <h2>Buscar casa por nombre</h2>
    <form method="get" action="update_casa.php">
        <label>Nombre de la casa:</label>
        <input type="text" name="nombre" required>
        <input type="submit" value="Buscar">
    </form>
    <?php
}
?>

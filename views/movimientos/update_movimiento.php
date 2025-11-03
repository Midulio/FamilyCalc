<?php
// Incluye el archivo de conexión a la base de datos (usa ruta relativa)
include("../../conexion.php");

// Inicializa la variable $datos como nula (se usará más tarde para guardar los datos del movimiento a editar)
$datos = null;

// --- Obtener las casas para el select del formulario ---
$sql_casas = "SELECT id_casa, nombre FROM casa"; // Consulta SQL para traer el id y nombre de todas las casas
$resultado_casas = $conexion->query($sql_casas); // Ejecuta la consulta y guarda el resultado en $resultado_casas

// --- Si se pasa un parámetro GET 'upd' (id del movimiento a actualizar) ---
if (isset($_GET['upd'])) {
    $id = intval($_GET['upd']); // Convierte el valor recibido por GET a entero para evitar inyección SQL

    // Prepara la consulta para obtener todos los datos del movimiento con ese id
    $sql = "SELECT * FROM movimientos WHERE id_movimientos = ?";
    $stmt = $conexion->prepare($sql); // Prepara la sentencia (previene SQL Injection)
    $stmt->bind_param("i", $id); // Asigna el parámetro (tipo entero)
    $stmt->execute(); // Ejecuta la consulta

    $resultado = $stmt->get_result(); // Obtiene el resultado de la consulta
    if ($resultado->num_rows > 0) {
        $datos = $resultado->fetch_assoc(); // Guarda los datos del movimiento como un array asociativo
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Define la codificación de caracteres -->
    <title>Actualizar Movimiento</title> <!-- Título de la pestaña del navegador -->
    <!-- Enlaza Bootstrap desde CDN para usar sus estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<!-- Contenedor principal -->
<div class="container my-5">
    <h2>Actualizar Movimiento</h2>

    <!-- Formulario para actualizar el movimiento -->
    <form action="upd_movimiento.php" method="post">
        <!-- Campo oculto con el ID del movimiento -->
        <input type="hidden" name="id_movimiento" value="<?= $datos['id_movimientos'] ?>">

        <!-- Select de Casa -->
        <div class="mb-3">
            <label for="casa" class="form-label">Seleccionar Casa</label>
            <select name="id_casa" id="casa" class="form-select w-25" required>
                <option value="" disabled>-- Elegí una casa --</option>
                <!-- Bucle que recorre todas las casas obtenidas de la BD -->
                <?php while($c = $resultado_casas->fetch_assoc()): ?>
                    <option value="<?= $c['id_casa'] ?>" <?= ($c['id_casa']==$datos['id_casa'])?'selected':'' ?>>
                        <?= htmlspecialchars($c['nombre']) ?> <!-- Se usa htmlspecialchars para evitar XSS -->
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <!-- Select de Persona (se cargará dinámicamente por JS según la casa) -->
        <div class="mb-3">
            <label for="persona" class="form-label">Seleccionar Persona</label>
            <select name="id_persona" id="persona" class="form-select w-25" required>
                <option value="" disabled selected>-- Selecciona una persona --</option>
            </select>
        </div>

        <!-- Campo de importe -->
        <div class="mb-3">
            <label for="importe" class="form-label">Importe</label>
            <input type="number" name="importe" id="importe" class="form-control w-25"
                   step="0.01" value="<?= $datos['importe'] ?>" required />
        </div>

        <!-- Campo de fecha -->
        <div class="mb-3">
            <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
            <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control w-25"
                   value="<?= $datos['fecha_ingreso'] ?>" required />
        </div>

        <!-- Select de Estado -->
        <div class="mb-3">
            <label class="form-label">Estados</label>
            <select name="estados" class="form-select w-25" required>
                <option value="pagado" <?= ($datos['estados']=='pagado')?'selected':'' ?>>Pagado</option>
                <option value="pendiente" <?= ($datos['estados']=='pendiente')?'selected':'' ?>>Pendiente</option>
                <option value="baja" <?= ($datos['estados']=='baja')?'selected':'' ?>>Baja</option>
            </select>
        </div>

        <!-- Select de Servicio -->
        <div class="mb-3">
            <label class="form-label">Servicios</label>
            <select name="servicios" class="form-select w-50" required>
                <?php
                // Lista fija de posibles servicios
                $servicios = [
                    "Comidas y Bebidas","Supermercado","Transporte","Hogar","Luz","Gas",
                    "Internet y Cable","Salud","Entretenimiento","Otros","Prepaga","Sueldo","Aguinaldo"
                ];
                // Se recorren y se selecciona el que coincide con los datos del movimiento
                foreach($servicios as $s): ?>
                    <option value="<?= $s ?>" <?= ($datos['servicios']==$s)?'selected':'' ?>><?= $s ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Select de Tipo de Gasto -->
        <div class="mb-3">
            <label for="tipo_de_gastos" class="form-label">Tipo de Gasto</label>
            <select name="tipo_de_gastos" class="form-select w-25" required>
                <option value="Fijo" <?= ($datos['tipo_de_gastos']=='Fijo')?'selected':'' ?>>Fijo</option>
                <option value="Variable" <?= ($datos['tipo_de_gastos']=='Variable')?'selected':'' ?>>Variable</option>
                <option value="Ingreso" <?= ($datos['tipo_de_gastos']=='Ingreso')?'selected':'' ?>>Ingreso</option>
            </select>
        </div>

        <!-- Botones de acción -->
        <button type="submit" class="btn btn-success">Actualizar Movimiento</button>
        <a href="index_movimientos.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Define la codificación de caracteres -->
    <title>Actualizar Movimiento</title> <!-- Título de la pestaña del navegador -->
    <!-- Enlaza Bootstrap desde CDN para usar sus estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<!-- Contenedor principal -->
<div class="container my-5">
    <h2>Actualizar Movimiento</h2>

    <!-- Formulario para actualizar el movimiento -->
    <form action="upd_movimiento.php" method="post">
        <!-- Campo oculto con el ID del movimiento -->
        <input type="hidden" name="id_movimiento" value="<?= $datos['id_movimientos'] ?>">

        <!-- Select de Casa -->
        <div class="mb-3">
            <label for="casa" class="form-label">Seleccionar Casa</label>
            <select name="id_casa" id="casa" class="form-select w-25" required>
                <option value="" disabled>-- Elegí una casa --</option>
                <!-- Bucle que recorre todas las casas obtenidas de la BD -->
                <?php while($c = $resultado_casas->fetch_assoc()): ?>
                    <option value="<?= $c['id_casa'] ?>" <?= ($c['id_casa']==$datos['id_casa'])?'selected':'' ?>>
                        <?= htmlspecialchars($c['nombre']) ?> <!-- Se usa htmlspecialchars para evitar XSS -->
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <!-- Select de Persona (se cargará dinámicamente por JS según la casa) -->
        <div class="mb-3">
            <label for="persona" class="form-label">Seleccionar Persona</label>
            <select name="id_persona" id="persona" class="form-select w-25" required>
                <option value="" disabled selected>-- Selecciona una persona --</option>
            </select>
        </div>

        <!-- Campo de importe -->
        <div class="mb-3">
            <label for="importe" class="form-label">Importe</label>
            <input type="number" name="importe" id="importe" class="form-control w-25"
                   step="0.01" value="<?= $datos['importe'] ?>" required />
        </div>

        <!-- Campo de fecha -->
        <div class="mb-3">
            <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
            <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control w-25"
                   value="<?= $datos['fecha_ingreso'] ?>" required />
        </div>

        <!-- Select de Estado -->
        <div class="mb-3">
            <label class="form-label">Estados</label>
            <select name="estados" class="form-select w-25" required>
                <option value="pagado" <?= ($datos['estados']=='pagado')?'selected':'' ?>>Pagado</option>
                <option value="pendiente" <?= ($datos['estados']=='pendiente')?'selected':'' ?>>Pendiente</option>
                <option value="baja" <?= ($datos['estados']=='baja')?'selected':'' ?>>Baja</option>
            </select>
        </div>

        <!-- Select de Servicio -->
        <div class="mb-3">
            <label class="form-label">Servicios</label>
            <select name="servicios" class="form-select w-50" required>
                <?php
                // Lista fija de posibles servicios
                $servicios = [
                    "Comidas y Bebidas","Supermercado","Transporte","Hogar","Luz","Gas",
                    "Internet y Cable","Salud","Entretenimiento","Otros","Prepaga","Sueldo","Aguinaldo"
                ];
                // Se recorren y se selecciona el que coincide con los datos del movimiento
                foreach($servicios as $s): ?>
                    <option value="<?= $s ?>" <?= ($datos['servicios']==$s)?'selected':'' ?>><?= $s ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Select de Tipo de Gasto -->
        <div class="mb-3">
            <label for="tipo_de_gastos" class="form-label">Tipo de Gasto</label>
            <select name="tipo_de_gastos" class="form-select w-25" required>
                <option value="Fijo" <?= ($datos['tipo_de_gastos']=='Fijo')?'selected':'' ?>>Fijo</option>
                <option value="Variable" <?= ($datos['tipo_de_gastos']=='Variable')?'selected':'' ?>>Variable</option>
                <option value="Ingreso" <?= ($datos['tipo_de_gastos']=='Ingreso')?'selected':'' ?>>Ingreso</option>
            </select>
        </div>

        <!-- Botones de acción -->
        <button type="submit" class="btn btn-success">Actualizar Movimiento</button>
        <a href="index_movimientos.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>
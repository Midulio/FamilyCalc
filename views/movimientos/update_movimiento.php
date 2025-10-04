<?php
include("../../conexion.php");

$datos = null;

// Obtener casas para el select
$sql_casas = "SELECT id_casa, nombre FROM casa";
$resultado_casas = $conexion->query($sql_casas);

if (isset($_GET['upd'])) {
    $id = intval($_GET['upd']);

    $sql = "SELECT * FROM movimientos WHERE id_movimientos = ?";
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
    <title>Actualizar Movimiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div class="container my-5">
    <h2>Actualizar Movimiento</h2>
    <form action="upd_movimiento.php" method="post">
        <input type="hidden" name="id_movimiento" value="<?= $datos['id_movimientos'] ?>">

        <!-- Selección de Casa -->
        <div class="mb-3">
            <label for="casa" class="form-label">Seleccionar Casa</label>
            <select name="id_casa" id="casa" class="form-select w-25" required>
                <option value="" disabled>-- Elegí una casa --</option>
                <?php while($c = $resultado_casas->fetch_assoc()): ?>
                    <option value="<?= $c['id_casa'] ?>" <?= ($c['id_casa']==$datos['id_casa'])?'selected':'' ?>>
                        <?= htmlspecialchars($c['nombre']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <!-- Selección de Persona según Casa -->
        <div class="mb-3">
            <label for="persona" class="form-label">Seleccionar Persona</label>
            <select name="id_persona" id="persona" class="form-select w-25" required>
                <option value="" disabled selected>-- Selecciona una persona --</option>
            </select>
        </div>

        <!-- Importe -->
        <div class="mb-3">
            <label for="importe" class="form-label">Importe</label>
            <input type="number" name="importe" id="importe" class="form-control w-25" step="0.01" 
                   value="<?= $datos['importe'] ?>" required />
        </div>

        <!-- Fecha -->
        <div class="mb-3">
            <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
            <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control w-25" 
                   value="<?= $datos['fecha_ingreso'] ?>" required />
        </div>

        <!-- Estados -->
        <div class="mb-3">
            <label class="form-label">Estados</label>
            <select name="estados" class="form-select w-25" required>
                <option value="pagado" <?= ($datos['estados']=='pagado')?'selected':'' ?>>Pagado</option>
                <option value="pendiente" <?= ($datos['estados']=='pendiente')?'selected':'' ?>>Pendiente</option>
                <option value="baja" <?= ($datos['estados']=='baja')?'selected':'' ?>>Baja</option>
            </select>
        </div>

        <!-- Servicios -->
        <div class="mb-3">
            <label class="form-label">Servicios</label>
            <select name="servicios" class="form-select w-50" required>
                <?php
                $servicios = ["Comidas y Bebidas","Supermercado","Transporte","Hogar","Luz","Gas","Internet y Cable","Salud","Entretenimiento","Otros","Prepaga","Sueldo","Aguinaldo"];
                foreach($servicios as $s): ?>
                    <option value="<?= $s ?>" <?= ($datos['servicios']==$s)?'selected':'' ?>><?= $s ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Tipo de Gasto -->
        <div class="mb-3">
            <label for="tipo_de_gastos" class="form-label">Tipo de Gasto</label>
            <select name="tipo_de_gastos" class="form-select w-25" required>
                <option value="Fijo" <?= ($datos['tipo_de_gastos']=='Fijo')?'selected':'' ?>>Fijo</option>
                <option value="Variable" <?= ($datos['tipo_de_gastos']=='Variable')?'selected':'' ?>>Variable</option>
                <option value="Ingreso" <?= ($datos['tipo_de_gastos']=='Ingreso')?'selected':'' ?>>Ingreso</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar Movimiento</button>
        <a href="index_movimientos.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    const casaSelect = document.getElementById('casa');
    const personaSelect = document.getElementById('persona');

    function cargarPersonas(idCasa, selectedPersona = null){
        personaSelect.innerHTML = '<option value="" disabled selected>Cargando...</option>';
        fetch('get_personas.php?id_casa=' + idCasa)
            .then(res => res.json())
            .then(data => {
                if(data.length > 0){
                    personaSelect.innerHTML = '<option value="" disabled>-- Selecciona una persona --</option>';
                    data.forEach(persona => {
                        const option = document.createElement('option');
                        option.value = persona.id_persona;
                        option.textContent = persona.nombre + ' ' + persona.apellido;
                        if(selectedPersona && selectedPersona == persona.id_persona){
                            option.selected = true;
                        }
                        personaSelect.appendChild(option);
                    });
                } else {
                    personaSelect.innerHTML = '<option value="" disabled>No hay personas disponibles</option>';
                }
            });
    }

    // Cargar personas inicialmente según la casa seleccionada
    if(casaSelect.value){
        cargarPersonas(casaSelect.value, <?= $datos['id_persona'] ?>);
    }

    // Cambiar personas al cambiar la casa
    casaSelect.addEventListener('change', function(){
        cargarPersonas(this.value);
    });
});
</script>

</body>
</html>

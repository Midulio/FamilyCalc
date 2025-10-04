<?php
include('../../conexion.php');

// Obtener casas para el select
$sql_casas = "SELECT id_casa, nombre FROM casa";
$resultado_casas = $conexion->query($sql_casas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Registrar Movimiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<form action="guardar_movimiento.php" method="post">

    <div class="mb-3">
        <label for="casa" class="form-label">Seleccionar Casa</label>
        <select name="id_casa" id="casa" class="form-select w-25" required>
            <option value="" disabled selected>-- Elegí una casa --</option>
            <?php
            if ($resultado_casas->num_rows > 0) {
                while ($row = $resultado_casas->fetch_assoc()) {
                    echo '<option value="'. $row['id_casa'] .'">'. htmlspecialchars($row['nombre']) .'</option>';
                }
            } else {
                echo '<option disabled>No hay casas disponibles</option>';
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="persona" class="form-label">Seleccionar Persona</label>
        <select name="id_persona" id="persona" class="form-select w-25" required>
            <option value="" disabled selected>-- Selecciona una persona --</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="importe" class="form-label">Importe</label>
        <input type="number" name="importe" id="importe" class="form-control w-25" step="0.01" required />
    </div>

    <div class="mb-3">
        <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
        <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control w-25" required />
    </div>

    <div class="mb-3">
    <label class="form-label">Servicios</label>
    <select name="servicios" class="form-select w-50" required>
        <option value="" disabled selected>-- Selecciona un servicio --</option>
        <option value="Comidas y Bebidas">Comidas y Bebidas </option>
        <option value="Supermercado">Supermercado </option>
        <option value="Transporte">Transporte </option>
        <option value="Hogar">Hogar </option>
        <option value="Luz">Luz </option>
        <option value="Gas">Gas </option>
        <option value="Internet y Cable">Internet y Cable</option>
        <option value="Salud">Salud </option>
        <option value="Entretenimiento">Entretenimiento</option>
        <option value="Otros">Otros</option>
        <option value="Prepaga">Prepaga</option>
        <option value="Sueldo">Sueldo</option>
        <option value="Aguinaldo">Aguinaldo</option>
    </select>
</div>
<div class="mb-3">
    <label for="tipo_de_gastos" class="form-label">Tipo de Gasto</label>
    <select name="tipo_de_gastos" id="tipo_de_gastos" class="form-select w-25" required>
        <option value="" disabled selected>-- Selecciona un tipo de gasto --</option>
        <option value="Fijo">Fijo</option>
        <option value="Variable">Variable</option>
        <option value="Ingreso">Ingreso</option>
    </select>
</div>


   
<div class="mb-3">
    <label class="form-label">Estados</label>
    <select name="estados" class="form-select w-25" required>
        <option value="" disabled selected>-- Selecciona un estado --</option>
        <option value="pagado">pagado</option>
        <option value="pendiente">pendiente</option>
        <option value="baja">baja</option>
    </select>
</div>


    <button type="submit" class="btn btn-primary">Registrar Movimiento</button>




        <a href="index_movimientos.php" class="btn btn-secondary">Tabla movimientos</a> 
</form>

<script>
document.getElementById('casa').addEventListener('change', function() {
    const idCasa = this.value;
    const selectPersona = document.getElementById('persona');

    selectPersona.innerHTML = '<option value="" disabled selected>Cargando...</option>';

    fetch('get_personas.php?id_casa=' + idCasa)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                selectPersona.innerHTML = '<option value="" disabled selected>-- Selecciona una persona --</option>';
                data.forEach(persona => {
                    const option = document.createElement('option');
                    option.value = persona.id_persona;
                    option.textContent = persona.nombre + ' ' + persona.apellido;
                    selectPersona.appendChild(option);
                });
            } else {
                selectPersona.innerHTML = '<option value="" disabled selected>No hay personas disponibles</option>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            selectPersona.innerHTML = '<option value="" disabled selected>Error al cargar personas</option>';
        });
});
</script>

</body>
</html>

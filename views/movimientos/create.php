<?php
include('../../conexion.php');

// Obtener casas para el select
$sql_casas = "SELECT id_casa, nombre FROM casa ORDER BY id_casa ASC";
$resultado_casas = $conexion->query($sql_casas);

// Obtener el primer registro (para seleccionarlo por defecto)
$primer_casa = null;
if ($resultado_casas && $resultado_casas->num_rows > 0) {
    $primer_casa = $resultado_casas->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Registrar Movimiento</title>

    <style>
        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="create.css">
    <link rel="icon" type="image/png" href="../../src/logo.png">
</head>
<body>



<div class="container my-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-header text-center bg-primary text-white">
            <h2>Ingresar movimiento</h2>
        </div>
        <div class="card-body">
            <form action="guardar_movimiento.php" method="post">
<div class="mb-3">
        <label for="casa" class="form-label">Seleccionar Casa</label>
        <select name="id_casa" id="casa" class="form-select w-full" required>
            <?php
            if ($primer_casa) {
                // Mostrar la primera casa como seleccionada
                echo '<option value="'. $primer_casa['id_casa'] .'" selected>'
                    . htmlspecialchars($primer_casa['nombre']) .'</option>';

                // Volver a ejecutar la consulta para mostrar las demás
                $resultado_casas = $conexion->query($sql_casas);
                while ($row = $resultado_casas->fetch_assoc()) {
                    if ($row['id_casa'] != $primer_casa['id_casa']) {
                        echo '<option value="'. $row['id_casa'] .'">'. htmlspecialchars($row['nombre']) .'</option>';
                    }
                }
            } else {
                echo '<option disabled selected>No hay casas disponibles</option>';
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="persona" class="form-label">Seleccionar Persona</label>
        <select name="id_persona" id="persona" class="form-select w-full" required>
            <option value="" disabled selected>-- Selecciona una persona --</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="importe" class="form-label">Importe</label>
        <div class="input-group w-full">
            <span class="input-group-text">$</span>
            <input type="number" name="importe" id="importe" class="form-control" step="0.01" required />
        </div>
    </div>

    <div class="mb-3">
        <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
        <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control w-full" required />
    </div>

    <?php
// --- Obtener los servicios desde la tabla principal ---
$sql_servicios = "SELECT id_servicio, Servicio FROM servicios ORDER BY id_servicio ASC";
$resultado_servicios = $conexion->query($sql_servicios);

// --- Mapa de agrupamiento (opciones específicas por tipo de servicio) ---
$grupos_servicios = [
    "Entretenimiento" => [
        "Comidas y Bebidas",
        "Cine",
        "Supermercado"
    ],
    "Videojuegos o Suscripciones" => [
        "Monedas Virtuales",
        "Suscripción"
    ],
    "Viajes" => [
        "Transporte",
        "Viajes"
    ],
    "Indumentaria" => [
        "Indumentaria",
        "Calzado"
    ],
    "Salud" => [
        "Salud"
    ],
    "Cuentas Bancarias" => [
        "Internet y Cable",
        "Hogar",
        "Luz",
        "Gas",
        "Prepaga"
    ],
    "Regalos" => [
        "Otros"
    ]
];
?>

<div class="mb-3">
    <label class="form-label">Servicios</label>
    <select name="id_servicio" class="form-select w-full" required>
        <option value="" disabled selected>-- Selecciona un servicio --</option>
        <?php
        if ($resultado_servicios && $resultado_servicios->num_rows > 0) {
            // Recorremos los servicios principales desde la base
            $servicios_db = [];
            while ($row = $resultado_servicios->fetch_assoc()) {
                $servicios_db[$row['Servicio']] = $row['id_servicio'];
            }

            // Creamos los grupos de opciones
            foreach ($grupos_servicios as $grupo => $opciones) {
                echo '<optgroup label="' . htmlspecialchars($grupo) . '">';
                foreach ($opciones as $opcion) {
                    // Verificamos que el grupo exista en la tabla servicios
                    if (isset($servicios_db[$grupo])) {
                        echo '<option value="' . $servicios_db[$grupo] . '">' . htmlspecialchars($opcion) . '</option>';
                    } else {
                        echo '<option disabled>' . htmlspecialchars($opcion) . ' (servicio no definido)</option>';
                    }
                }
                echo '</optgroup>';
            }
        } else {
            echo '<option disabled>No hay servicios cargados en la base de datos</option>';
        }
        ?>
    </select>
</div>

    <div class="mb-3">
        <label for="tipo_de_gastos" class="form-label">Tipo de Gasto</label>
        <select name="tipo_de_gastos" id="tipo_de_gastos" class="form-select w-full" required>
            <option value="" disabled selected>-- Selecciona un tipo de gasto --</option>
            <option value="Fijo">Fijo</option>
            <option value="Variable">Variable</option>
            <option value="Ingreso">Ingreso</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Estados</label>
        <select name="estados" class="form-select w-full" required>
            <option value="" disabled selected>-- Selecciona un estado --</option>
            <option value="pagado">Pagado</option>
            <option value="pendiente">Pendiente</option>
            <option value="baja">Baja</option>
        </select>
    </div>

    <div class="d-row">
        <button type="submit" class="btn btn-success btn-lg">Registrar Movimiento</button>
        <a href="index_movimientos.php" class="btn btn-danger btn-lg"><img src="../../src/volver-flecha.png" alt="Volver"></a>
    </div>
</form>
        </div>
    </div>
</div>

    

<script>
document.addEventListener('DOMContentLoaded', () => {// Espera a que el contenido HTML esté completamente cargado antes de ejecutar el script

    const fechaInput = document.getElementById('fecha_ingreso');// Obtiene el campo de fecha del formulario

    const hoy = new Date().toISOString().split('T')[0];// Crea una fecha actual en formato ISO (AAAA-MM-DDTHH:MM:SSZ) y toma solo la parte de la fecha

    fechaInput.value = hoy;// Asigna la fecha actual al campo de fecha
    
    const selectCasa = document.getElementById('casa');// Obtiene el elemento <select> donde se elige la casa

    const idCasaInicial = selectCasa.value;// Guarda el valor (id) de la casa actualmente seleccionada

    // Si hay una casa seleccionada al cargar la página, carga las personas asociadas a esa casa
    if (idCasaInicial) {
        cargarPersonas(idCasaInicial);
    }
    
    selectCasa.addEventListener('change', function() {// Escucha cambios en la selección de casa para actualizar las personas dinámicamente
        cargarPersonas(this.value);// Llama a la función que carga las personas de la casa seleccionada
    });
});

function cargarPersonas(idCasa) {// Define la función que carga las personas según el id de la casa seleccionada
    
    const selectPersona = document.getElementById('persona');// Obtiene el elemento <select> donde se mostrarán las personas

    selectPersona.innerHTML = '<option value="" disabled selected>Cargando...</option>';// Muestra un mensaje temporal mientras se cargan las personas

    fetch('get_personas.php?id_casa=' + idCasa)// Hace una solicitud al archivo PHP para obtener las personas asociadas a la casa

        .then(response => response.json())// Convierte la respuesta en formato JSON
        .then(data => {// Procesa los datos obtenidos
            if (data.length > 0) {// Si hay personas en la respuesta...
                selectPersona.innerHTML = '<option value="" disabled selected>-- Selecciona una persona --</option>';// Reinicia el select con la opción inicial
                data.forEach(persona => {// Recorre cada persona y crea una opción para el select
                    const option = document.createElement('option');// Crea un nuevo elemento <option>
                    option.value = persona.id_persona;// Asigna el id de la persona como valor
                    option.textContent = persona.nombre + ' ' + persona.apellido;// Muestra nombre y apellido como texto de la opción
                    selectPersona.appendChild(option);// Agrega la opción al <select>
                });

            } else {// Si no hay personas disponibles...
                selectPersona.innerHTML = '<option value="" disabled selected>No hay personas disponibles</option>';// Muestra un mensaje indicando que no hay personas
            }
        })

        .catch(error => {// Si ocurre un error en la solicitud fetch...
            console.error('Error:', error);// Muestra el error en la consola del navegador

            selectPersona.innerHTML = '<option value="" disabled selected>Error al cargar personas</option>';// Informa al usuario que hubo un error al cargar personas
        });
}

</script>

</body>
</html>
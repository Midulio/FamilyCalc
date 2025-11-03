<?php
// Incluye el archivo "conexion.php" que contiene los datos y funciones necesarias
// para conectar con la base de datos MySQL. Gracias a esto, la variable $conexion estará disponible.
include ("../../conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400..800&family=Fredoka:wght@300..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" href="../../src/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="gastos.css">

    <title>Listado de Movimientos</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

   <nav class="navbar">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <button class="btn btn-primary menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><img src="../../src/list.svg"></button>
            <div class="offcanvas offcanvas-start interiorMenu" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close equis" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body interiorMenu">
                <div class="explorar"> <h4>EXPLORAR</h4>
                    <a href="../../index.html"><img src="../../src/house.svg">Inicio</a>
                    <a href="../casas/index_casa.php"><img src="../../src/users.svg">Personas</a>
                    <a href="../Impuestos_valores/imp_val.html"><img src="../../src/percent.svg">Valores</a>
                    <a href="#"><img src="../../src/chart-line.svg">Estadísticas de gastos</a>
                </div>
                <div class="container-fluid d-flex justify-content-between contactos-box position-absolute bottom-0 start-50 translate-middle-x">
                    <a class="contactos" href="#"><img class="" src="../../src/facebook-logo.svg"></a>
                    <a class="contactos" href="#"><img class="" src="../../src/instagram-logo.svg"></a>
                    <a class="contactos" href="#"><img class="" src="../../src/phone.svg"></a>
                    <a class="contactos" href="#"><img class="" src="../../src/envelope.svg"></a>
                </div>
            </div>
            </div>
            <a href="../../index.html" class="logo"><h1 class="mb-1 fs-2"> <span class="family">Family</span><span class="calc">Calc</span>  </h1></a>
            <div>
                <a href="../../views/chatbot/chatbot.html" class="btn menu" type="button"><img src="../../src/robot.svg"></a>
                <a href="../../views/iniciarSesion/iniciarSesion.html" class="btn menu" type="button"><img src="../../src/user-circle.svg"></a>
            </div>
        </div>
    </nav>

    <div class="tables-container mt-4 mx-auto">
        <h2 class="mb-4">Listado de Movimientos</h2>

        <?php
// Consulta SQL unificada con los JOIN correctos
$sql = "
    SELECT 
        m.id_movimientos AS id_movimiento,
        c.nombre AS nombre_casa,
        p.nombre AS nombre_persona,
        p.apellido AS apellido_persona,
        s.Servicio AS nombre_servicio,
        m.importe,
        m.fecha_ingreso,
        m.estados,
        m.tipo_de_gastos
    FROM movimientos AS m
    LEFT JOIN casa AS c ON m.id_casa = c.id_casa
    LEFT JOIN persona AS p ON m.id_persona = p.id_persona
    LEFT JOIN servicios AS s ON m.id_servicio = s.id_servicio
    ORDER BY m.fecha_ingreso DESC
";

$stmt = $conexion->prepare($sql);
$stmt->execute();
$resultado = $stmt->get_result();

$totalImporte = 0;
?>

<table class="table table-hover">
    <tr class="table-secondary text-center">
        <th class="d-none d-md-table-cell">Casa</th>
        <th>Persona</th>
        <th>Importe</th>
        <th class="d-none d-md-table-cell">Fecha de Ingreso</th>
        <th class="d-none d-md-table-cell">Estado</th>
        <th>Servicio</th>
        <th class="d-none d-md-table-cell">Tipo de Gasto</th>
        <th>Acciones</th>
    </tr>

<?php
if ($resultado && $resultado->num_rows > 0):
    while ($r = $resultado->fetch_assoc()):
        $totalImporte += $r['importe'];
?>
    <tr class="text-center">
        <td class="d-none d-md-table-cell">
            <?= $r['nombre_casa'] ?? '<em>Sin casa</em>' ?>
        </td>
        <td>
            <?= trim(($r['nombre_persona'] ?? '') . ' ' . ($r['apellido_persona'] ?? '')) ?: '<em>Sin persona</em>' ?>
        </td>
        <td>$<?= number_format($r['importe'], 2, ',', '.') ?></td>
        <td class="d-none d-md-table-cell"><?= $r['fecha_ingreso'] ?></td>
        <td class="d-none d-md-table-cell fw-bold"><?= $r['estados'] ?></td>
        <td><?= $r['nombre_servicio'] ?? '<em>Sin servicio</em>' ?></td>
        <td class="d-none d-md-table-cell"><?= $r['tipo_de_gastos'] ?></td>
        <td>
            <a href="update_movimiento.php?upd=<?= $r['id_movimiento'] ?>" class="btn btn-success btn-sm"><img src="fotos/actualizar-flecha.png" alt="Actualizar" srcset=""></a>
            <a href="eliminar_movimiento.php?id_movimiento=<?= $r['id_movimiento'] ?>" class="btn btn-danger btn-sm"><img src="fotos/borrar.png" alt="Eliminar" srcset=""></a>
        </td>
    </tr>
<?php
    endwhile;
endif;
?>
    <tr class="table-dark fw-bold">
        <td></td>
        <td class="text-center">GASTOS:</td>
        <td class="text-center">$<?= number_format($totalImporte, 2, ',', '.') ?></td>
        <td colspan="5" class="text-center"><button id="btnAbrirModalMovimiento" class="btn btn-primary"><img src="fotos/agregar.png" alt="Agregar movimiento"></button></td>
    </tr>
</table>

    </div>

    <!-- Overlay -->
<div id="overlayMovimiento" class="overlay-modal"></div>

<!-- Modal -->
<div id="modalMovimiento" class="modal-form w-75">
  <div class="card mx-auto">
    <div class="card-header text-center text-white">
      <h2>Registrar Movimiento</h2>
    </div>
    <div class="card-body">
    <form id="formAgregarMovimiento" method="post">
  <div class="mb-3">
    <label for="mov_casa" class="form-label">Seleccionar Casa</label>
    <select name="id_casa" id="mov_casa" class="form-select" required></select>
  </div>

  <div class="mb-3">
    <label for="mov_persona" class="form-label">Seleccionar Persona</label>
    <select name="id_persona" id="mov_persona" class="form-select" required>
      <option value="" disabled selected>Selecciona una casa primero</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="importe" class="form-label">Importe</label>
    <div class="input-group">
      <span class="input-group-text">$</span>
      <input type="number" name="importe" id="importe" class="form-control" step="0.01" required />
    </div>
  </div>

  <div class="mb-3">
    <label for="fecha_ingreso" class="form-label">Fecha de ingreso</label>
    <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" required />
  </div>

  <div class="mb-3">
    <label for="servicio" class="form-label">Servicio</label>
    <select name="id_servicio" id="servicio" class="form-select" required></select>
  </div>

  <div class="mb-3">
    <label for="tipo_de_gastos" class="form-label">Tipo de gasto</label>
    <select name="tipo_de_gastos" id="tipo_de_gastos" class="form-select" required>
      <option value="Fijo">Fijo</option>
      <option value="Variable">Variable</option>
      <option value="Ingreso">Ingreso</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="estados" class="form-label">Estado <span class="text-black fw-bold">(editable)</span></label>
    <select name="estados" id="estados" class="form-select" required>
      <option value="Pagado" selected>Pagado</option>
      <option value="Pendiente">Pendiente</option>
      <option value="Baja">Baja</option>
    </select>
  </div>

  <div class="row envios justify-content-center">
    <button type="submit" class="btn btn-success col-9">Registrar Movimiento</button>
          <button type="button" id="cerrarModalMovimiento" class="btn btn-danger col-2">
            <img src="../../src/volver-flecha.png" alt="Volver">
          </button>
  </div>
</form>
  </div>
</div>

<script>
// Crea dinámicamente el toast si no existe
function ensureToastElement() {
    // Busca si ya existe un elemento con id="toastMessage"
    let toast = document.getElementById("toastMessage");
    
    // Si no existe, lo crea dinámicamente con estilo en línea
    if (!toast) {
        toast = document.createElement("div"); // Crea un nuevo <div>
        toast.id = "toastMessage"; // Asigna el id
        // Posiciona el toast en la parte inferior centrada de la pantalla
        toast.style.position = "fixed";
        toast.style.bottom = "30px";
        toast.style.left = "50%";
        toast.style.transform = "translateX(-50%)";
        // Define el estilo visual: fondo, bordes, texto, animación, etc.
        toast.style.padding = "12px 22px";
        toast.style.borderRadius = "10px";
        toast.style.color = "white";
        toast.style.fontSize = "16px";
        toast.style.fontWeight = "600";
        toast.style.boxShadow = "0 2px 10px rgba(0,0,0,0.25)";
        toast.style.opacity = "0";
        toast.style.transition = "opacity 0.3s ease";
        toast.style.zIndex = "9999";
        // Agrega el toast al <body> del documento
        document.body.appendChild(toast);
    }
    // Retorna el elemento para su uso posterior
    return toast;
}

/**
 * Muestra un mensaje tipo "toast" centrado en pantalla.
 * @param {string} message - Mensaje a mostrar.
 * @param {'success'|'error'|'warning'} tipo - Tipo (color) del mensaje.
 * @param {number} [tiempoMs=3000] - Duración visible en milisegundos.
 * @param {function} [callback=null] - Función a ejecutar después de ocultarse.
 */
function showToast(message, tipo = 'success', tiempoMs = 3000, callback = null) {
    // Obtiene (o crea si no existe) el toast en pantalla
    const toast = ensureToastElement();

    // Define los colores según el tipo de mensaje
    const colores = {
        success: "#28a745", // Verde éxito
        error: "#dc3545",   // Rojo error
        warning: "#ffc107"  // Amarillo advertencia
    };
    toast.style.backgroundColor = colores[tipo] || "#333"; // Fondo según tipo

    // Asigna el texto del mensaje y lo hace visible
    toast.textContent = message;
    toast.style.opacity = "1";

    // Oculta el toast después de un tiempo definido
    setTimeout(() => {
        toast.style.opacity = "0"; // Desvanece el toast
        // Si hay una función callback, la ejecuta después de un breve retardo
        if (callback && typeof callback === "function") {
            setTimeout(callback, 400);
        }
    }, tiempoMs);
}

// Espera a que todo el DOM esté cargado antes de ejecutar
document.addEventListener("DOMContentLoaded", async () => {
    // Obtiene referencias a elementos del modal y formulario
    const btnAbrir = document.getElementById("btnAbrirModalMovimiento");
    const modal = document.getElementById("modalMovimiento");
    const overlay = document.getElementById("overlayMovimiento");
    const cerrar = document.getElementById("cerrarModalMovimiento");
    const form = document.getElementById("formAgregarMovimiento");

    // Selects dentro del formulario
    const selectCasa = document.getElementById("mov_casa");
    const selectPersona = document.getElementById("mov_persona");
    const fechaInput = document.getElementById("fecha_ingreso");
    const selectServicio = document.getElementById("servicio");

    // --- Mostrar modal ---
    btnAbrir.addEventListener("click", async () => {
        // Muestra el modal y el fondo oscuro
        modal.style.display = "block";
        overlay.style.display = "block";
        // Bloquea el scroll del fondo
        document.body.style.overflow = "hidden";
        // Carga las listas desplegables de casas y servicios
        await cargarCasas();
        await cargarServicios();
        // Fija automáticamente la fecha actual
        requestAnimationFrame(() => setFechaHoy());
    });

    // --- Cerrar modal ---
    function cerrarModal() {
        // Oculta el modal y el fondo oscuro
        modal.style.display = "none";
        overlay.style.display = "none";
        // Habilita el scroll del cuerpo
        document.body.style.overflow = "auto";
        // Limpia el formulario
        form.reset();
        // Vuelve a poner la fecha de hoy
        setFechaHoy();
    }

    // Cierra modal tanto desde el botón como desde el overlay
    cerrar.addEventListener("click", cerrarModal);
    overlay.addEventListener("click", cerrarModal);

    // --- Cargar Casas desde el servidor ---
    async function cargarCasas() {
        const res = await fetch("get_casa.php"); // Solicita JSON con las casas
        const data = await res.json(); // Convierte la respuesta a objeto JS
        selectCasa.innerHTML = ""; // Limpia opciones previas

        // Crea un <option> por cada casa
        data.forEach((c, i) => {
            const option = document.createElement("option");
            option.value = c.id_casa;
            option.textContent = c.nombre;
            if (i === 0) option.selected = true; // Selecciona la primera por defecto
            selectCasa.appendChild(option);
        });

        // Si hay al menos una casa, carga sus personas asociadas
        if (data.length > 0) await cargarPersonas(data[0].id_casa);
    }

    // --- Cargar Personas según casa seleccionada ---
    async function cargarPersonas(idCasa) {
        const res = await fetch("get_personas.php?id_casa=" + idCasa);
        const data = await res.json();
        
        selectPersona.innerHTML = ""; // Limpia opciones anteriores

        if (data.length === 1) {
            // Si solo hay UNA persona, la selecciona automáticamente
            const personaUnica = data[0];
            const option = document.createElement("option");
            option.value = personaUnica.id_persona;
            option.textContent = personaUnica.nombre + " " + personaUnica.apellido;
            option.selected = true; 
            selectPersona.appendChild(option);
        } else {
            // Si hay varias o ninguna, muestra un placeholder adecuado
            const placeholder = document.createElement("option");
            placeholder.value = "";
            placeholder.textContent = data.length === 0 ? "No hay personas en esta casa" : "Selecciona una persona";
            placeholder.disabled = true;
            placeholder.selected = true;
            selectPersona.appendChild(placeholder);

            // Agrega una opción por cada persona disponible
            data.forEach(p => {
                const option = document.createElement("option");
                option.value = p.id_persona;
                option.textContent = p.nombre + " " + p.apellido;
                selectPersona.appendChild(option);
            });
        }
    }

    // --- Evento: cambio de casa ---
    selectCasa.addEventListener("change", async e => {
        // Cuando cambia la casa, recarga las personas de esa casa
        await cargarPersonas(e.target.value);
    });

    // --- Cargar Servicios agrupados (padre-hijo) ---
    async function cargarServicios() {
        const res = await fetch("get_servicios.php"); // Pide servicios al servidor
        const data = await res.json(); // Convierte respuesta a objeto JS

        // Limpia y agrega la opción inicial
        selectServicio.innerHTML = "<option disabled selected>Selecciona un servicio</option>";

        // Crea un <optgroup> por cada categoría padre
        data.forEach(grupo => {
            const optgroup = document.createElement("optgroup");
            optgroup.label = grupo.padre;

            // Crea opciones dentro del grupo por cada hijo
            grupo.hijos.forEach(hijo => {
                const option = document.createElement("option");
                if (hijo.id_servicio) {
                    option.value = hijo.id_servicio;
                    option.textContent = hijo.Servicio;
                } else {
                    option.disabled = true;
                    option.textContent = hijo.Servicio;
                }
                optgroup.appendChild(option);
            });

            selectServicio.appendChild(optgroup);
        });
    }

    // --- Pone la fecha actual en el campo correspondiente ---
    function setFechaHoy() {
        const hoy = new Date().toISOString().split("T")[0];
        fechaInput.value = hoy;
    }

    // --- Enviar Formulario (guardar movimiento) ---
    form.addEventListener("submit", async e => {
        e.preventDefault(); // Evita el envío tradicional del formulario
        const formData = new FormData(form); // Crea un objeto con todos los datos del form

        try {
            // Envía los datos al servidor vía POST usando fetch
            const res = await fetch("guardar_movimiento.php", {
                method: "POST",
                body: formData
            });

            // Convierte la respuesta del servidor a JSON
            const data = await res.json();
            console.log("Respuesta del servidor:", data);

            // Si el servidor devuelve success=true
            if (data.success) {
                cerrarModal(); // Cierra el modal
                // Muestra un toast de éxito y recarga la página
                showToast("✅ " + data.message, "success", 2500, () => {
                    location.reload();
                });
            } else {
                // Si hubo error, muestra un toast rojo con el mensaje
                showToast("❌ " + data.message, "error");
                console.error("Error desde el servidor:", data.message);
            }
        } catch (err) {
            // Si ocurre un error en la conexión o el fetch falla
            console.error(err);
            showToast("⚠️ Error de conexión", "error");
        }
    });
});
</script>


</body>
</html>
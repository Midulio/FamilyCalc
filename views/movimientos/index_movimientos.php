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
        <th class="d-none d-lg-table-cell">Casa</th>
        <th>Persona</th>
        <th>Importe</th>
        <th class="d-none d-md-table-cell">Fecha de Ingreso</th>
        <th class="d-none d-md-table-cell">Estado</th>
        <th>Servicio</th>
        <th class="d-none d-lg-table-cell">Tipo de Gasto</th>
        <th>Acciones</th>
    </tr>

<?php
if ($resultado && $resultado->num_rows > 0):
    while ($r = $resultado->fetch_assoc()):
        $totalImporte += $r['importe'];
?>
    <tr class="text-center">
        <td class="d-none d-lg-table-cell">
            <?= $r['nombre_casa'] ?? '<em>Sin casa</em>' ?>
        </td>
        <td>
            <?= trim(($r['nombre_persona'] ?? '') . ' ' . ($r['apellido_persona'] ?? '')) ?: '<em>Sin persona</em>' ?>
        </td>
        <td>$<?= number_format($r['importe'], 2, ',', '.') ?></td>
        <td class="d-none d-md-table-cell"><?= $r['fecha_ingreso'] ?></td>
        <td class="d-none d-md-table-cell fw-bold"><?= $r['estados'] ?></td>
        <td><?= $r['nombre_servicio'] ?? '<em>Sin servicio</em>' ?></td>
        <td class="d-none d-lg-table-cell"><?= $r['tipo_de_gastos'] ?></td>
        <td>
            <button type="button" class="btn btn-warning update btn-sm" onclick="abrirModalActualizar(<?= $r['id_movimiento'] ?>)"><img src="fotos/actualizar-flecha.png" alt="Actualizar"></button>
            <a href="eliminar_movimiento.php?id_movimiento=<?= $r['id_movimiento'] ?>" class="btn btn-danger delete btn-sm"><img src="fotos/borrar.png" alt="Eliminar" srcset=""></a>
        </td>
    </tr>
<?php
    endwhile;
endif;
?>
    <tr class="table-dark fw-bold">
        <td class="d-none d-lg-table-cell"></td>
        <td class="text-center">GASTOS:</td>
        <td class="text-center">$<?= number_format($totalImporte, 2, ',', '.') ?></td>
        <td colspan="5" class="text-center"><button type="button" id="btnAbrirModalMovimiento" class="btn btn-primary mx-4"><img src="fotos/agregar.png" alt="Agregar movimiento"></button></td>
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
</div>



<!-- Overlay para el modal de actualizar -->
<div id="overlayActualizar" class="overlay-modal"></div>

<!-- Modal para actualizar movimiento -->
<div id="modalActualizar" class="modal-form w-75">
  <div class="card mx-auto">
    <div class="card-header text-center text-white">
      <h2>Actualizar Movimiento</h2>
    </div>
    <div class="card-body">
      <form id="formActualizar" method="post">
        <!-- ID oculto -->
        <input type="hidden" name="id_movimiento" id="upd_id_movimiento">

        <!-- Selección de Casa -->
        <div class="mb-3">
          <label for="upd_casa" class="form-label">Seleccionar Casa</label>
          <select name="id_casa" id="upd_casa" class="form-select" required></select>
        </div>

        <!-- Selección de Persona -->
        <div class="mb-3">
          <label for="upd_persona" class="form-label">Seleccionar Persona</label>
          <select name="id_persona" id="upd_persona" class="form-select" required>
            <option value="" disabled selected>Selecciona una casa primero</option>
          </select>
        </div>

        <!-- Importe -->
        <div class="mb-3">
          <label for="upd_importe" class="form-label">Importe</label>
          <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="number" name="importe" id="upd_importe" class="form-control" step="0.01" required />
          </div>
        </div>

        <!-- Fecha -->
        <div class="mb-3">
          <label for="upd_fecha" class="form-label">Fecha de ingreso</label>
          <input type="date" name="fecha_ingreso" id="upd_fecha" class="form-control" required />
        </div>

        <!-- Servicio -->
        <div class="mb-3">
          <label for="upd_servicio" class="form-label">Servicio</label>
          <select name="id_servicio" id="upd_servicio" class="form-select" required></select>
        </div>

        <!-- Tipo de Gasto -->
        <div class="mb-3">
          <label for="upd_tipo" class="form-label">Tipo de gasto</label>
          <select name="tipo_de_gastos" id="upd_tipo" class="form-select" required>
            <option value="Fijo">Fijo</option>
            <option value="Variable">Variable</option>
            <option value="Ingreso">Ingreso</option>
          </select>
        </div>

        <!-- Estado -->
        <div class="mb-3">
          <label for="upd_estado" class="form-label">Estado <span class="text-black fw-bold">(editable)</span></label>
          <select name="estados" id="upd_estado" class="form-select" required>
            <option value="Pagado">Pagado</option>
            <option value="Pendiente">Pendiente</option>
            <option value="Baja">Baja</option>
          </select>
        </div>

        <!-- Botones -->
        <div class="row envios justify-content-center">
          <button type="submit" class="btn btn-success col-9">Actualizar Movimiento</button>
          <button type="button" id="cerrarModalActualizar" class="btn btn-danger col-2">
            <img src="../../src/volver-flecha.png" alt="Volver">
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ========================= -->
<!-- 🔸 MODAL CONFIRMAR ELIMINACIÓN -->
<!-- ========================= -->
<div id="modalOverlayConfirmacion" class="overlay-modal"></div>
<div id="modalConfirmarEliminacion" class="modal-form w-75" style="text-align: center;">
  <div class="card shadow-lg mx-auto border-danger">
    <div class="card-header bg-danger text-white">
      <h5 class="mb-0">⚠️ Confirmar Eliminación ⚠️</h5>
    </div>
    <div class="card-body">
      <p id="mensajeConfirmacion" class="mb-4 lead">
        ¿Estás seguro de que quieres eliminar este movimiento de forma permanente?
      </p>
      <div class="d-flex justify-content-around">
        <button id="btnEliminarConfirmado" class="btn btn-danger btn-lg flex-fill me-2">Eliminar</button>
        <button id="btnCancelarEliminacion" class="btn btn-secondary btn-lg flex-fill ms-2">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script>

// ======================================
// 🔹 SISTEMA DE CONFIRMACIÓN DE ELIMINACIÓN
// ======================================

let idMovimientoEliminar = null; // ID temporal

// 🔸 Interceptar clic en botones "Eliminar"
document.querySelectorAll('.delete').forEach(btn => {
  btn.addEventListener('click', e => {
    e.preventDefault(); // evita la redirección inmediata
    const href = e.currentTarget.getAttribute('href');
    const params = new URLSearchParams(href.split('?')[1]);
    idMovimientoEliminar = params.get('id_movimiento');
    abrirModalConfirmacion();
  });
});

// 🔸 Elementos del modal
const modalConf = document.getElementById('modalConfirmarEliminacion');
const overlayConf = document.getElementById('modalOverlayConfirmacion');
const btnEliminarConf = document.getElementById('btnEliminarConfirmado');
const btnCancelarConf = document.getElementById('btnCancelarEliminacion');

function abrirModalConfirmacion() {
  modalConf.style.display = 'block';
  overlayConf.style.display = 'block';
  document.body.style.overflow = 'hidden';
}

function cerrarModalConfirmacion() {
  modalConf.style.display = 'none';
  overlayConf.style.display = 'none';
  document.body.style.overflow = 'auto';
  idMovimientoEliminar = null;
}

btnCancelarConf.addEventListener('click', cerrarModalConfirmacion);
overlayConf.addEventListener('click', cerrarModalConfirmacion);

// 🔸 Confirmar eliminación
btnEliminarConf.addEventListener('click', async () => {
  if (!idMovimientoEliminar) return;

  try {
    const res = await fetch(`eliminar_movimiento.php?id_movimiento=${idMovimientoEliminar}`, {
      method: 'GET'
    });

    // Intentamos leer respuesta JSON si la hay
    let data = {};
    try { data = await res.json(); } catch {}

    if (res.ok && data.success) {
      cerrarModalConfirmacion();
      showToast("✅ Movimiento eliminado correctamente", "success", 2000, () => location.reload());
    } else {
      cerrarModalConfirmacion();
      showToast("❌ Error al eliminar el movimiento", "error");
    }

  } catch (err) {
    console.error(err);
    cerrarModalConfirmacion();
    showToast("⚠️ Error de conexión con la base de datos", "error");
  }
});

// ==========================
// 🔹 SISTEMA DE TOASTS
// ==========================
function ensureToastElement() {
    let toast = document.getElementById("toastMessage");
    if (!toast) {
        toast = document.createElement("div");
        toast.id = "toastMessage";
        toast.style.position = "fixed";
        toast.style.bottom = "30px";
        toast.style.left = "50%";
        toast.style.transform = "translateX(-50%)";
        toast.style.padding = "12px 22px";
        toast.style.borderRadius = "10px";
        toast.style.color = "white";
        toast.style.fontSize = "16px";
        toast.style.fontWeight = "600";
        toast.style.boxShadow = "0 2px 10px rgba(0,0,0,0.25)";
        toast.style.opacity = "0";
        toast.style.transition = "opacity 0.3s ease";
        toast.style.zIndex = "9999";
        document.body.appendChild(toast);
    }
    return toast;
}

function showToast(message, tipo = 'success', tiempoMs = 3000, callback = null) {
    const toast = ensureToastElement();
    const colores = { success: "#28a745", error: "#dc3545", warning: "#ffc107" };
    toast.style.backgroundColor = colores[tipo] || "#333";
    toast.textContent = message;
    toast.style.opacity = "1";

    setTimeout(() => {
        toast.style.opacity = "0";
        if (callback && typeof callback === "function") setTimeout(callback, 400);
    }, tiempoMs);
}

// ==========================
// 🔹 MODAL: AGREGAR MOVIMIENTO
// ==========================
document.addEventListener("DOMContentLoaded", async () => {
    const btnAbrir = document.getElementById("btnAbrirModalMovimiento");
    const modal = document.getElementById("modalMovimiento");
    const overlay = document.getElementById("overlayMovimiento");
    const cerrar = document.getElementById("cerrarModalMovimiento");
    const form = document.getElementById("formAgregarMovimiento");
    const selectCasa = document.getElementById("mov_casa");
    const selectPersona = document.getElementById("mov_persona");
    const fechaInput = document.getElementById("fecha_ingreso");
    const selectServicio = document.getElementById("servicio");

    btnAbrir.addEventListener("click", async () => {
        modal.style.display = "block";
        overlay.style.display = "block";
        document.body.style.overflow = "hidden";
        await cargarCasas(selectCasa, selectPersona);
        await cargarServicios(selectServicio);
        requestAnimationFrame(() => setFechaHoy(fechaInput));
    });

    function cerrarModal() {
        modal.style.display = "none";
        overlay.style.display = "none";
        document.body.style.overflow = "auto";
        form.reset();
        setFechaHoy(fechaInput);
    }

    cerrar.addEventListener("click", cerrarModal);
    overlay.addEventListener("click", cerrarModal);

    // ==========================
    // 🔹 FUNCIONES DE CARGA (REUTILIZABLES)
    // ==========================
    async function cargarCasas(selectCasaElem, selectPersonaElem, idCasaSel = null, idPersonaSel = null) {
        const res = await fetch("get_casa.php");
        const data = await res.json();
        selectCasaElem.innerHTML = "";

        data.forEach((c, i) => {
            const option = document.createElement("option");
            option.value = c.id_casa;
            option.textContent = c.nombre;
            if (idCasaSel ? c.id_casa == idCasaSel : i === 0) option.selected = true;
            selectCasaElem.appendChild(option);
        });

        if (data.length > 0) await cargarPersonas(selectPersonaElem, idCasaSel || data[0].id_casa, idPersonaSel);
    }

    async function cargarPersonas(selectElem, idCasa, idPersonaSel = null) {
        const res = await fetch("get_personas.php?id_casa=" + idCasa);
        const data = await res.json();
        selectElem.innerHTML = "";

        if (data.length === 1) {
            const persona = data[0];
            const opt = document.createElement("option");
            opt.value = persona.id_persona;
            opt.textContent = persona.nombre + " " + persona.apellido;
            opt.selected = true;
            selectElem.appendChild(opt);
        } else {
            const placeholder = document.createElement("option");
            placeholder.value = "";
            placeholder.textContent = data.length === 0 ? "No hay personas en esta casa" : "Selecciona una persona";
            placeholder.disabled = true;
            placeholder.selected = true;
            selectElem.appendChild(placeholder);

            data.forEach(p => {
                const option = document.createElement("option");
                option.value = p.id_persona;
                option.textContent = p.nombre + " " + p.apellido;
                if (p.id_persona == idPersonaSel) option.selected = true;
                selectElem.appendChild(option);
            });
        }
    }

    async function cargarServicios(selectElem, idServicioSel = null) {
        const res = await fetch("get_servicios.php");
        const data = await res.json();
        selectElem.innerHTML = "<option disabled selected>Selecciona un servicio</option>";

        data.forEach(grupo => {
            const optgroup = document.createElement("optgroup");
            optgroup.label = grupo.padre;
            grupo.hijos.forEach(hijo => {
                const option = document.createElement("option");
                option.value = hijo.id_servicio;
                option.textContent = hijo.Servicio;
                if (hijo.id_servicio == idServicioSel) option.selected = true;
                optgroup.appendChild(option);
            });
            selectElem.appendChild(optgroup);
        });
    }

    function setFechaHoy(input) {
        const hoy = new Date().toISOString().split("T")[0];
        input.value = hoy;
    }

    // ==========================
    // 🔹 GUARDAR MOVIMIENTO NUEVO
    // ==========================
    form.addEventListener("submit", async e => {
        e.preventDefault();
        const formData = new FormData(form);
        try {
            const res = await fetch("guardar_movimiento.php", { method: "POST", body: formData });
            const data = await res.json();
            if (data.success) {
                cerrarModal();
                showToast("✅ " + data.message, "success", 2500, () => location.reload());
            } else {
                showToast("❌ " + data.message, "error");
            }
        } catch (err) {
            console.error(err);
            showToast("⚠️ Error de conexión", "error");
        }
    });

    // ==========================
    // 🔹 MODAL ACTUALIZAR MOVIMIENTO (MISMA ESTRUCTURA)
    // ==========================
    const modalAct = document.getElementById("modalActualizar");
    const overlayAct = document.getElementById("overlayActualizar");
    const cerrarAct = document.getElementById("cerrarModalActualizar");
    const formAct = document.getElementById("formActualizar");

    function abrirModalActualizar(id) {
        modalAct.style.display = "block";
        overlayAct.style.display = "block";
        document.body.style.overflow = "hidden";

        fetch("get_movimiento.php?id=" + id)
    .then(r => r.json())
    .then(async data => {
        if (data.success) {
            const mov = data.data;
            document.getElementById("upd_id_movimiento").value = mov.id_movimientos;
            document.getElementById("upd_importe").value = mov.importe;
            document.getElementById("upd_fecha").value = mov.fecha_ingreso;
            document.getElementById("upd_estado").value = mov.estados;
            document.getElementById("upd_tipo").value = mov.tipo_de_gastos;

            const selCasa = document.getElementById("upd_casa");
            const selPersona = document.getElementById("upd_persona");
            const selServ = document.getElementById("upd_servicio");

            await cargarCasas(selCasa, selPersona, mov.id_casa, mov.id_persona);
            await cargarServicios(selServ, mov.id_servicio);
        } else {
            showToast("⚠️ " + data.message, "warning");
        }
    })
    .catch(err => {
        console.error(err);
        showToast("⚠️ Error al cargar movimiento", "error");
    });
    }

    function cerrarModalActualizar() {
        modalAct.style.display = "none";
        overlayAct.style.display = "none";
        document.body.style.overflow = "auto";
        formAct.reset();
    }

    cerrarAct.addEventListener("click", cerrarModalActualizar);
    overlayAct.addEventListener("click", cerrarModalActualizar);

    // --- GUARDAR CAMBIOS ---
    formAct.addEventListener("submit", async e => {
        e.preventDefault();
        const formData = new FormData(formAct);
        try {
            const res = await fetch("upd_movimiento.php", { method: "POST", body: formData });
            const data = await res.json();
            if (data.success) {
                cerrarModalActualizar();
                showToast("✅ " + data.message, "success", 2000, () => location.reload());
            } else {
                showToast("❌ " + data.message, "error");
            }
        } catch (err) {
            console.error(err);
            showToast("⚠️ Error al actualizar", "error");
        }
    });

    // Expone función global para poder llamarla desde botones Editar
    window.abrirModalActualizar = abrirModalActualizar;
});
</script>

</body>
</html>
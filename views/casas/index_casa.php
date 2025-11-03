<?php
include ("../../conexion.php");
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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


    <title>Casas</title>

    <link rel="icon" type="image/png" href="../../src/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="style_casa.css"/>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
   <nav class="navbar">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <button class="btn btn-primary menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><img src="../../src/list.svg"></button>
            <div class="offcanvas offcanvas-start interiorMenu" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body interiorMenu">
                <div class="explorar"> <h4>EXPLORAR</h4>
                    <a href="../../index.html"><img src="../../src/house.svg">Inicio</a>
                    <a href="../movimientos/index_movimientos.php"><img src="../../src/receipt.svg">Resumen de gastos</a>
                    <a href="#"><img src="../../src/chart-line.svg">Estadísticas de gastos</a>
                    <a href="../Impuestos_valores/imp_val.html"><img src="../../src/percent.svg">Valores</a>
                </div>
                <div class="container-fluid d-flex justify-content-between contactos-box position-absolute bottom-0 start-50 translate-middle-x">
                    <a class="contactos" href="#"><img class="position-absolute top-50 start-50 translate-middle" src="../../src/facebook-logo.svg"></a>
                    <a class="contactos" href="#"><img class="position-absolute top-50 start-50 translate-middle" src="../../src/instagram-logo.svg"></a>
                    <a class="contactos" href="#"><img class="position-absolute top-50 start-50 translate-middle" src="../../src/envelope.svg"></a>
                    <a class="contactos" href="#"><img class="position-absolute top-50 start-50 translate-middle" src="../../src/phone.svg"></a>
                </div>
            </div>
            </div>
            <a href="../../index.html" class="logo"><h1 class="mb-1 fs-2"><span class="family">Family</span><span class="calc">Calc</span></h1></a>
            <div> 
                <a href="../chatbot/chatbot.html" class="btn menu" type="button"><img src="../../src/robot.svg"></a>
                <a href="../iniciarSesion/iniciarSesion.html" class="btn menu" type="button"><img src="../../src/user-circle.svg"></a>
            </div>
        </div>
    </nav>
    <div class="row">
            <div class="text-center col-12 col-md-6">
      <h2 class="my-3 p-3"> CASA/S </h2>
                <div class="tables-container">
                    <table class="table table-hover mx-auto">
                    <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Calle</td>
                        <td>Numero</td>
                        <td><button id="abrirModal" class="btn btn-success"><img src="fotos/agregar-casa.png" alt="Agregar Casa"></button></td>
                    </tr>
                    </thead>
                    <tbody id="tablaCasasCuerpo">
                    <?php
                        $sql = "SELECT * FROM casa";// Consulta SQL para obtener todos los registros de la tabla casa


                        $stmt = $conexion->prepare($sql);// Prepara la consulta para su ejecución
                        $stmt->execute();// Ejecuta la consulta preparada
                        $resultado = $stmt->get_result();// Obtiene el resultado de la ejecución

                        if($resultado && $resultado->num_rows > 0){// Verifica si hay resultados disponibles
                            while($r = $resultado->fetch_assoc()):// Recorre cada fila del resultado
                        ?>
                            <tr>
                                <td><?= $r['nombre'] ?></td>
                                <td><?= $r['calle'] ?></td>
                                <td><?= $r['numero'] ?></td>
                                <td><button class="btn btn-primary btnActualizarCasa" data-id="<?= $r['id_casa'] ?>"><img src="fotos/actualizar.png" alt="Actualizar"></button><button class="btn btn-danger" onclick="abrirModalConfirmacion('eliminar_casa.php?id_casa=<?= $r['id_casa'] ?>', 'la casa')"><img src="fotos/borrar.png" alt="Borrar registro"></button></td>
                            </tr>
                        <?php
                            // Finaliza el bucle while
                            endwhile;
                        }
                        // Cierra la condición del if
                    ?>
                    </tbody>
                    </table>
                </div>
            </div>

          
            <div class="text-center col-12 col-md-6">
              <h2 class="my-3 p-3"> PERSONA/S </h2>
                <div class="tables-container">
                    <table class="table table-hover mx-auto">
                    <thead>
                    <tr>
                        <td>Casa</td>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td class="d-none d-md-table-cell">Sexo</td>
                        <td><button id="abrirModalPersona" class="btn btn-success"><img src="fotos/agregar-usuario.png" alt="Agregar Persona"></button></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        // Consulta SQL para obtener personas con su casa relacionada
                        $sql = "SELECT p.nombre as nombre_persona, c.nombre as nombre_casa, apellido, sexo, id_persona 
                                FROM persona as p 
                                INNER JOIN casa as c ON p.id_casa = c.id_casa";

                        $stmt = $conexion->prepare($sql);// Prepara la consulta para su ejecución segura
                        $stmt->execute();// Ejecuta la consulta preparada
                        $resultado = $stmt->get_result();// Obtiene el resultado de la ejecución de la consulta

                        if($resultado && $resultado->num_rows > 0){// Verifica si existen resultados
                            while($r = $resultado->fetch_assoc()):// Recorre cada fila de resultados
                        ?>
                            <tr>
                                <td><?= $r['nombre_casa'] ?></td>
                                <td><?= $r['nombre_persona'] ?></td>
                                <td><?= $r['apellido'] ?></td>
                                <td class="d-none d-md-table-cell"><?= $r['sexo'] ?></td>
                                <td><a href="#" class="btn btn-primary btnActualizarPersona" data-id="<?= $r['id_persona'] ?>"><img src="fotos/persona.png"></a><button class="btn btn-danger" onclick="abrirModalConfirmacion('personas/eliminar_persona.php?id_persona=<?= $r['id_persona'] ?>', 'la persona')"><img src="fotos/borrar.png"></button></td>
                            </tr>
                        <?php
                            // Finaliza el bucle while
                            endwhile;
                        }
                        // Cierra la condición del if
                    ?>
                    </tbody>
                    </table>
                </div>
            </div>
    </div>


    <div id="modalOverlay" class="overlay"></div>

      <div id="modalForm" class="modal-form w-75">
    <div class="card mx-auto">
        <div class="card-header text-center text-white">
            <h2>Agregar CASA</h2>
        </div>
        <div class="card-body">
        <form id="formCasa" method="post">
  <div class="col-12 mb-3">
    <label for="validationCustom01" class="form-label">Casa</label>
    <input type="text" class="form-control" id="nombre" name="nombre" required>
  </div>

  <div class="col-12 mb-3">
    <label for="validationCustom02" class="form-label">Calle</label>
    <input type="text" class="form-control" id="Calle" name="Calle" required>
  </div>

  <div class="col-12 mb-3">
    <label for="validationCustom02" class="form-label">Numero</label>
    <input type="number" class="form-control" id="Numero" name="Numero" required>
  </div>

  <div class="col-12 mb-3">
    <label for="validationCustom02" class="form-label">Localidad</label>
    <input type="text" class="form-control" id="Localidad" name="Localidad" required>
  </div>

  <div class="col-12 mb-3">
    <label for="validationCustom02" class="form-label">Provincia</label>
    <input type="text" class="form-control" id="Provincia" name="Provincia" required>
  </div>

  <div class="row envios justify-content-center">
    <button class="btn btn-success col-9" type="submit">Agregar Casa</button>
    <a href="index_casa.php" class="btn btn-danger col-2"><img src="../../src/volver-flecha.png" alt="volver"></a> 
  </div>
</form>
        </div>
    </div>
</div>

<div id="modalOverlayActualizar" class="overlay"></div>

<div id="modalActualizarCasa" class="modal-form w-75">
  <div class="card mx-auto">
    <div class="card-header text-center text-white">
      <h2>Actualizar CASA</h2>
    </div>
    <div class="card-body">
      <form id="formActualizarCasa" method="post">
        <input type="hidden" name="id_casa" id="upd_id_casa">

        <div class="mb-3">
          <label for="upd_nombre" class="form-label">Nombre</label>
          <input type="text" name="nombre" id="upd_nombre" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="upd_calle" class="form-label">Calle</label>
          <input type="text" name="calle" id="upd_calle" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="upd_numero" class="form-label">Número</label>
          <input type="number" name="numero" id="upd_numero" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="upd_localidad" class="form-label">Localidad</label>
          <input type="text" name="localidad" id="upd_localidad" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="upd_provincia" class="form-label">Provincia</label>
          <input type="text" name="provincia" id="upd_provincia" class="form-control" required>
        </div>

        <div class="row envios justify-content-center">
          <button type="submit" class="btn btn-success col-9">Actualizar Casa</button>
          <button type="button" id="cerrarModalActualizar" class="btn btn-danger col-2">
            <img src="../../src/volver-flecha.png" alt="Volver">
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="modalOverlay2" class="overlay"></div>

<div id="modalPersona" class="modal-form w-75">
  <div class="card mx-auto">
    <div class="card-header text-center text-white">
      <h2>Agregar PERSONA</h2>
    </div>
    <div class="card-body">
      <form id="formPersona" method="post">
        <div class="mb-3">
          <label for="casa" class="form-label">Seleccionar Casa</label>
          <select name="id_casa" id="casa" class="form-select" required>
            <option value="" disabled selected>-- Elegí una casa --</option>
            <?php
              // Consulta para llenar el select de casas
              $query_casas = "SELECT id_casa, nombre FROM casa";
              $resultado_casas = $conexion->query($query_casas);

              if ($resultado_casas && $resultado_casas->num_rows > 0) {
                while ($row = $resultado_casas->fetch_assoc()) {
                  echo '<option value="' . $row['id_casa'] . '">' . htmlspecialchars($row['nombre']) . '</option>';
                }
              } else {
                echo '<option disabled>No hay casas disponibles</option>';
              }
            ?>
          </select>
        </div>

        <div class="mb-3">
          <label>Nombre</label>
          <input type="text" name="nombre" class="form-control" required />
        </div>

        <div class="mb-3">
          <label>Apellido</label>
          <input type="text" name="apellido" class="form-control" required />
        </div>

        <div class="mb-3">
          <label for="sexo" class="form-label">Sexo</label>
          <select name="sexo" id="sexo" class="form-select" required>
            <option value="" disabled selected>-- Selecciona su sexo --</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Otro">Otro</option>
          </select>
        </div>

        <div class="row envios justify-content-center">
          <button type="submit" class="btn btn-success col-9">Registrar Persona</button>
          <button type="button" id="cerrarModalPersona" class="btn btn-danger col-2"><img src="../../src/volver-flecha.png" alt="volver"></button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="modalOverlayActualizarPersona" class="overlay"></div>

<div id="modalActualizarPersona" class="modal-form w-75">
  <div class="card mx-auto">
    <div class="card-header text-center text-white">
      <h2>Actualizar PERSONA</h2>
    </div>
    <div class="card-body">
      <form id="formActualizarPersona" method="post">
        <input type="hidden" name="id_persona" id="upd_id_persona_form"> <div class="mb-3">
          <label for="upd_id_casa_persona" class="form-label">Casa</label>
          <select name="id_casa" id="upd_id_casa_persona" class="form-select" required>
            <option value="" disabled selected>-- Cargando casas --</option>
            <?php
              // Reutilizamos la lógica de casas para llenar el select inicialmente
              $query_casas = "SELECT id_casa, nombre FROM casa";
              $resultado_casas = $conexion->query($query_casas);

              if ($resultado_casas && $resultado_casas->num_rows > 0) {
                while ($row = $resultado_casas->fetch_assoc()) {
                  echo '<option value="' . $row['id_casa'] . '">' . htmlspecialchars($row['nombre']) . '</option>';
                }
              }
            ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="upd_nombre_persona" class="form-label">Nombre</label>
          <input type="text" name="nombre" id="upd_nombre_persona" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="upd_apellido_persona" class="form-label">Apellido</label>
          <input type="text" name="apellido" id="upd_apellido_persona" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="upd_sexo_persona" class="form-label">Sexo</label>
          <select name="sexo" id="upd_sexo_persona" class="form-select" required>
            <option value="" disabled selected>-- Selecciona sexo --</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Otro">Otro</option>
          </select>
        </div>

        <div class="row envios justify-content-center">
          <button type="submit" class="btn btn-success col-9">Actualizar Persona</button>
          <button type="button" id="cerrarModalActualizarPersona" class="btn btn-danger col-2">
            <img src="../../src/volver-flecha.png" alt="Volver">
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="modalOverlayConfirmacion" class="overlay"></div>
<div id="modalConfirmarEliminacion" class="modal-form w-75" style="text-align: center;">
    <div class="card shadow-lg mx-auto border-danger">
        <div class="card-header bg-danger text-white">
            <h5 class="mb-0">⚠️ Confirmar Eliminación ⚠️</h5>
        </div>
        <div class="card-body">
            <p id="mensajeConfirmacion" class="mb-4 lead">¿Estás seguro de que quieres eliminar este registro de forma permanente?</p>
            <div class="d-flex justify-content-around">
                <a id="btnEliminarConfirmado" href="#" class="btn btn-danger btn-lg flex-fill me-2">Eliminar</a>
                <button type="button" id="btnCancelarEliminacion" class="btn btn-secondary btn-lg flex-fill ms-2">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div id="toastMessage" class="toast-message"></div>

<script>

// =======================================================
// === 0. VARIABLES Y HELPERS ============================
// =======================================================

// --- Referencias de Elementos Principales ---
const toastElement = document.getElementById("toastMessage");
const overlayGlobal = document.getElementById("modalOverlay"); // Overlay para agregar Casa/Persona

// --- Modales Agregar ---
const modalAgregarCasa = document.getElementById("modalForm");
const modalAgregarPersona = document.getElementById("modalPersona");
const formAgregarCasa = document.getElementById("formCasa");
const formAgregarPersona = document.getElementById("formPersona");

// --- Modales Actualizar Casa ---
const modalActualizarCasa = document.getElementById("modalActualizarCasa");
const overlayActualizarCasa = document.getElementById("modalOverlayActualizar");
const formActualizarCasa = document.getElementById("formActualizarCasa");

// --- Modales Actualizar Persona ---
const modalActualizarPersona = document.getElementById("modalActualizarPersona");
const overlayActualizarPersona = document.getElementById("modalOverlayActualizarPersona");
const formActualizarPersona = document.getElementById("formActualizarPersona");

// --- Nuevo Modal de Confirmación ---
const modalConfirmacion = document.getElementById("modalConfirmarEliminacion");
const overlayConfirmacion = document.getElementById("modalOverlayConfirmacion");
const btnEliminarConfirmado = document.getElementById("btnEliminarConfirmado");
const btnCancelarEliminacion = document.getElementById("btnCancelarEliminacion");
const mensajeConfirmacion = document.getElementById("mensajeConfirmacion");

// --- Constante de Retardo para Recarga ---
const RELOAD_DELAY_MS = 1000; // 1 segundo


/**
 * Muestra el mensaje de notificación (toast).
 * @param {string} message - Mensaje a mostrar.
 * @param {('success'|'error')} tipo - Tipo de mensaje para el color.
 * @param {number} [tiempoMs=10000] - Duración del toast.
 */
function showToast(message, tipo = 'success', tiempoMs = 10000) {
    toastElement.textContent = message;
    toastElement.style.backgroundColor = (tipo === 'success') ? '#4CAF50' : '#f44336';
    toastElement.classList.add("show");
   
    setTimeout(() => {
        toastElement.classList.remove("show");
    }, tiempoMs);
}

/**
 * Recarga la página después de un breve retraso.
 */
function reloadPageAfterDelay() {
    setTimeout(() => {
        window.location.reload();
    }, RELOAD_DELAY_MS);
}


// =======================================================
// === FUNCIONES PARA EL NUEVO MODAL DE ELIMINACIÓN ======
// =======================================================

/**
 * Abre el modal de confirmación de eliminación.
 * @param {string} url - La URL del script de eliminación.
 * @param {string} tipo - El tipo de registro a eliminar (ej: 'la casa', 'la persona').
 */
function abrirModalConfirmacion(url, tipo) {
    // Ocultar otros modales abiertos si es necesario, aunque en principio no deberían estar abiertos.
    cerrarModalAgregarPersona(); 
    cerrarModalActualizarCasa();
    cerrarModalActualizarPersona();

    // Establecer el mensaje y la acción del botón de confirmación
    mensajeConfirmacion.textContent = `⚠️ ¿Estás seguro de que quieres eliminar ${tipo} de forma permanente?`;
    btnEliminarConfirmado.href = url;

    // Mostrar el modal
    modalConfirmacion.style.display = "block";
    overlayConfirmacion.style.display = "block";
    document.body.style.overflow = "hidden"; // Bloquea el scroll del fondo
}

/**
 * Cierra el modal de confirmación de eliminación.
 */
function cerrarModalConfirmacion() {
    modalConfirmacion.style.display = "none";
    overlayConfirmacion.style.display = "none";
    document.body.style.overflow = "auto";
    btnEliminarConfirmado.href = "#"; // Limpiar el enlace
}

// Listener para el botón "Cancelar" y el overlay
btnCancelarEliminacion.addEventListener("click", cerrarModalConfirmacion);
overlayConfirmacion.addEventListener("click", cerrarModalConfirmacion);

// =======================================================
// === 1. FUNCIONES DE CIERRE DE MODAL (Existentes) ======
// =======================================================

function cerrarModalAgregarPersona() {
    modalAgregarPersona.style.display = "none";
    overlayGlobal.style.display = "none";
}

function cerrarModalActualizarCasa() {
    modalActualizarCasa.style.display = "none";
    overlayActualizarCasa.style.display = "none";
    document.body.style.overflow = "auto";
}

function cerrarModalActualizarPersona() {
    modalActualizarPersona.style.display = "none";
    overlayActualizarPersona.style.display = "none";
    document.body.style.overflow = "auto";
}


// =======================================================
// === 2. LISTENERS DE APERTURA Y CIERRE (Existentes) ====
// =======================================================

// --- Abrir/Cerrar Modales de AGREGAR ---
document.getElementById("abrirModal").addEventListener("click", () => {
    modalAgregarCasa.style.display = "block";
    overlayGlobal.style.display = "block";
});

document.getElementById("abrirModalPersona").addEventListener("click", () => {
    modalAgregarPersona.style.display = "block";
    overlayGlobal.style.display = "block";
});

document.getElementById("cerrarModalPersona").addEventListener("click", cerrarModalAgregarPersona);

overlayGlobal.addEventListener("click", () => {
    modalAgregarCasa.style.display = "none";
    cerrarModalAgregarPersona();
});

// --- Cerrar Modales de ACTUALIZAR ---
document.getElementById("cerrarModalActualizar").addEventListener("click", cerrarModalActualizarCasa);
overlayActualizarCasa.addEventListener("click", cerrarModalActualizarCasa);

document.getElementById("cerrarModalActualizarPersona").addEventListener("click", cerrarModalActualizarPersona);
overlayActualizarPersona.addEventListener("click", cerrarModalActualizarPersona);


// --- Abrir modal ACTUALIZAR CASA (delegación de eventos) ---
document.addEventListener("click", async (e) => {
    const boton = e.target.closest(".btnActualizarCasa");
    if (!boton) return;

    const id = boton.dataset.id;
    try {
        const res = await fetch(`get_casa.php?id=${id}`);
        const data = await res.json();

        document.getElementById("upd_id_casa").value = data.id_casa;
        document.getElementById("upd_nombre").value = data.nombre;
        document.getElementById("upd_calle").value = data.calle;
        document.getElementById("upd_numero").value = data.numero;
        document.getElementById("upd_localidad").value = data.localidad;
        document.getElementById("upd_provincia").value = data.provincia;

        modalActualizarCasa.style.display = "block";
        overlayActualizarCasa.style.display = "block";
        document.body.style.overflow = "hidden";
    } catch (err) {
        console.error("Error al obtener datos de la casa:", err);
        showToast("⚠️ Error al cargar los datos de la casa", "error");
    }
});

// --- Abrir modal ACTUALIZAR PERSONA (delegación de eventos) ---
document.addEventListener("click", async (e) => {
    const boton = e.target.closest(".btnActualizarPersona");
    if (!boton) return;

    const id = boton.dataset.id;
    try {
        const res = await fetch("personas/get_persona.php?id=" + id);
        if (!res.ok) throw new Error('Error al obtener datos: ' + res.statusText);
        const data = await res.json();
       
        document.getElementById("upd_id_persona_form").value = data.id_persona;
        document.getElementById("upd_nombre_persona").value = data.nombre;
        document.getElementById("upd_apellido_persona").value = data.apellido;
        document.getElementById("upd_id_casa_persona").value = data.id_casa;
        document.getElementById("upd_sexo_persona").value = data.sexo;
       
        modalActualizarPersona.style.display = "block";
        overlayActualizarPersona.style.display = "block";
        document.body.style.overflow = "hidden";
    } catch (err) {
        console.error("Error al obtener datos de la persona:", err);
        showToast("⚠️ Error al cargar los datos de la persona", "error");
    }
});


// =======================================================
// === 3. LISTENERS DE FORMULARIOS (CRUD) (Existentes) ==
// =======================================================

// --- AGREGAR CASA ---
formAgregarCasa.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(formAgregarCasa);

    try {
        const response = await fetch("Registrar_casa.php", {
            method: "POST",
            body: formData
        });

        const data = await response.text();
        if (data.includes("OK")) {
            modalAgregarCasa.style.display = "none";
            overlayGlobal.style.display = "none";
            formAgregarCasa.reset();

            showToast("✅ Casa agregada correctamente", 'success');
            reloadPageAfterDelay(); // RECARGA
        } else {
            console.error("Respuesta del servidor casa:", data);
            showToast("❌ Error al agregar la casa", 'error');
        }
    } catch (error) {
        console.error("Error al registrar la casa:", error);
        showToast("⚠️ Error de conexión al registrar la casa", 'error');
    }
});

// --- AGREGAR PERSONA ---
formAgregarPersona.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(formAgregarPersona);

    try {
        const response = await fetch("personas/Registrar_personas.php", {
            method: "POST",
            body: formData,
        });

        const data = await response.text();
        if (data.includes("OK")) {
            cerrarModalAgregarPersona();
            formAgregarPersona.reset();

            showToast("✅ Persona agregada correctamente", 'success');
            reloadPageAfterDelay(); // RECARGA
        } else {
            console.error("Respuesta servidor persona:", data);
            showToast("❌ Error al agregar persona", 'error');
        }
    } catch (error) {
        console.error("Error al registrar persona:", error);
        showToast("⚠️ Error de conexión al registrar la persona", 'error');
    }
});

// --- ACTUALIZAR CASA ---
formActualizarCasa.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(formActualizarCasa);

    try {
        const res = await fetch("upd_casa.php", {
            method: "POST",
            body: formData
        });

        const data = await res.text();
        const respuesta = data.trim();

        if (respuesta === "OK") {
            cerrarModalActualizarCasa();
            showToast("✅ Casa actualizada correctamente", "success");
            reloadPageAfterDelay(); // RECARGA
        } else {
            console.error("Respuesta del servidor:", data);
            showToast("❌ Error al actualizar casa", "error");
        }
    } catch (err) {
        console.error("Error al actualizar casa:", err);
        showToast("⚠️ Error de conexión", "error");
    }
});

// --- ACTUALIZAR PERSONA ---
formActualizarPersona.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(formActualizarPersona);
   
    try {
        const res = await fetch("personas/upd_persona.php", {
            method: "POST",
            body: formData
        });
       
        const data = await res.text();
        const respuesta = data.trim();
       
        if (respuesta === "OK") {
            cerrarModalActualizarPersona();
            showToast("✅ Persona actualizada correctamente", "success");
            reloadPageAfterDelay(); // RECARGA
        } else {
            console.error("Respuesta del servidor:", data);
            showToast("❌ Error al actualizar persona", "error");
        }
    } catch (err) {
        console.error("Error al actualizar persona:", err);
        showToast("⚠️ Error de conexión", "error");
    }
});
</script>

</body>
</html>
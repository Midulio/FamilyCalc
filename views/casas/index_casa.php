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
                <div class="tables-container my-5">
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
                                <td><a href="update_casa.php?upd=<?= $r['id_casa'] ?>" class="btn btn-primary"><img src="fotos/actualizar.png"><a href="eliminar_casa.php?id_casa=<?= $r['id_casa'] ?>" class="btn btn-danger"><img src="fotos/borrar.png" alt="Borrar registro"></a></a></td>
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
                <div class="tables-container my-5">
                    <table class="table table-hover mx-auto">
                    <tr>
                        <td>Casa</td>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td class="d-none d-md-table-cell">Sexo</td>
                        <td><button id="abrirModalPersona" class="btn btn-success"><img src="fotos/agregar-usuario.png" alt="Agregar Persona"></button></td>
                    </tr>
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
                                <td><?= $r['sexo'] ?></td>
                                <td><a href="personas/update_persona.php?upd=<?= $r['id_persona'] ?>" class="btn btn-primary"><img src="fotos/persona.png"></a><a href="personas/eliminar_persona.php?id_persona=<?= $r['id_persona'] ?>" class="btn btn-danger"><img src="fotos/borrar.png"></a></td>
                            </tr>
                        <?php
                            // Finaliza el bucle while
                            endwhile;
                        }
                        // Cierra la condición del if
                    ?>
                    </table>
                </div>
            </div>
    </div>


    <div id="modalOverlay" class="overlay"></div>

      <div id="modalForm" class="modal-form" style="width: 50%;">
    <div class="card shadow-sm mx-auto">
        <div class="card-header text-center bg-primary text-white">
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

  <div class="d-row">
    <button class="btn btn-success col-10" type="submit">Agregar Casa</button>
    <a href="index_casa.php" class="btn btn-danger col-1"><img src="../../src/volver-flecha.png" alt="volver"></a> 
  </div>
</form>
        </div>
    </div>
</div>

<div id="modalOverlay2" class="overlay"></div>

<div id="modalPersona" class="modal-form" style="width: 50%;">
  <div class="card shadow-sm mx-auto">
    <div class="card-header text-center bg-primary text-white">
      <h2>Agregar PERSONA</h2>
    </div>
    <div class="card-body">
      <form id="formPersona" method="post">
        <div class="mb-3">
          <label for="casa" class="form-label">Seleccionar Casa</label>
          <select name="id_casa" id="casa" class="form-select w-50 mx-auto" required>
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
          <select name="sexo" id="sexo" class="form-select w-50 mx-auto" required>
            <option value="" disabled selected>-- Selecciona su sexo --</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Otro">Otro</option>
          </select>
        </div>

        <div class="d-row">
          <button type="submit" class="btn btn-success col-10">Registrar Persona</button>
          <button type="button" id="cerrarModalPersona" class="btn btn-danger col-1"><img src="../../src/volver-flecha.png" alt="volver"></button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="toastMessage" class="toast-message"></div>

<script>
  // --- MODALES ---
  const abrirModal = document.getElementById("abrirModal");
  const modalCasa = document.getElementById("modalForm");

  const abrirModalPersona = document.getElementById("abrirModalPersona");
  const modalPersona = document.getElementById("modalPersona");
  const cerrarModalPersona = document.getElementById("cerrarModalPersona");

  const overlay = document.getElementById("modalOverlay");
  const toastElement = document.getElementById("toastMessage"); // <-- NUEVO: Referencia al toast

  // Función para mostrar el toast temporalmente
  function showToast(message, tipo = 'success', tiempoMs = 10000) { // 10000ms = 10 segundos por defecto
    toastElement.textContent = message;
    
    // Opcional: ajustar el color según el tipo (éxito o error)
    if (tipo === 'success') {
        toastElement.style.backgroundColor = '#4CAF50'; // Verde para éxito
    } else {
        toastElement.style.backgroundColor = '#f44336'; // Rojo para error
    }

    toastElement.classList.add("show"); // Muestra el toast
    
    // Temporizador para ocultar el toast
    setTimeout(() => {
      toastElement.classList.remove("show"); // Oculta el toast
    }, tiempoMs);
  }

  // --- Abrir modal CASA ---
  abrirModal.addEventListener("click", () => {
    modalCasa.style.display = "block";
    overlay.style.display = "block";
  });

  // --- Abrir modal PERSONA ---
  abrirModalPersona.addEventListener("click", () => {
    modalPersona.style.display = "block";
    overlay.style.display = "block";
  });

  // --- Cerrar modales ---
  cerrarModalPersona.addEventListener("click", () => {
    modalPersona.style.display = "none";
    overlay.style.display = "none";
  });

  overlay.addEventListener("click", () => {
    modalCasa.style.display = "none";
    modalPersona.style.display = "none";
    overlay.style.display = "none";
  });

  // --- FORMULARIO CASA ---
  const formCasa = document.getElementById("formCasa");

  formCasa.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(formCasa);

    try {
      const response = await fetch("Registrar_casa.php", {
        method: "POST",
        body: formData
      });

      const data = await response.text();
      console.log("Respuesta servidor casa:", data);

      if (data.includes("OK")) {
        // Cierra el modal
        modalCasa.style.display = "none";
        overlay.style.display = "none";
        formCasa.reset();

        // Actualiza tabla de casas
        await actualizarTablaCasas();

        showToast("✅ Casa agregada correctamente", 'success', 10000); // <-- CAMBIO AQUÍ
      } else {
        showToast("❌ Error al agregar la casa", 'error', 10000); // <-- CAMBIO AQUÍ
      }
    } catch (error) {
      console.error("Error al registrar la casa:", error);
      showToast("⚠️ Error de conexión al registrar la casa", 'error', 10000); // <-- CAMBIO AQUÍ
    }
  });

  // --- FORMULARIO PERSONA ---
  const formPersona = document.getElementById("formPersona");

  formPersona.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(formPersona);

    try {
      const response = await fetch("personas/Registrar_personas.php", {
        method: "POST",
        body: formData,
      });

      const data = await response.text();
      console.log("Respuesta servidor persona:", data);

      if (data.includes("OK")) {
        modalPersona.style.display = "none";
        overlay.style.display = "none";
        formPersona.reset();

        await actualizarTablaPersonas();

        showToast("✅ Persona agregada correctamente", 'success', 10000); // <-- CAMBIO AQUÍ
      } else {
        showToast("❌ Error al agregar persona", 'error', 10000); // <-- CAMBIO AQUÍ
      }
    } catch (error) {
      console.error("Error al registrar persona:", error);
      showToast("⚠️ Error de conexión al registrar la persona", 'error', 10000); // <-- CAMBIO AQUÍ
    }
  });

  // --- FUNCIONES PARA ACTUALIZAR LAS TABLAS ---
  async function actualizarTablaCasas() {
    try {
      // Nota: Si quieres que el nuevo registro aparezca sin recargar, 
      // debes asegurarte que 'obtener_casas.php' devuelve SÓLO el 
      // contenido de la tabla (<tr>...</tr>).
      // Si devuelve la tabla completa (<table>...</table>), 
      // usa .innerHTML = html como ya lo tienes.
      const response = await fetch("obtener_casas.php");
      const html = await response.text();
      document.getElementById("tablaCasasCuerpo").innerHTML = html;
    } catch (error) {
      console.error("Error al actualizar casas:", error);
    }
  }

  async function actualizarTablaPersonas() {
    try {
      const response = await fetch("personas/obtener_personas.php");
      const html = await response.text();
      document.querySelector(".col-12.col-md-6:nth-child(2) table").innerHTML = html;
    } catch (error) {
      console.error("Error al actualizar personas:", error);
    }
  }
</script>

</body>
</html>
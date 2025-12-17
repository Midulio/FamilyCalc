<?php
$conexion = new mysqli("localhost", "root", "", "familycalc");
$casaQuery = $conexion->query("SELECT * FROM casa");
?>

<!DOCTYPE html>
<html lang="es">
<head> 
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous"> 
  <link href="estadisticas.css" rel="stylesheet"/> 
  <link rel="icon" type="image/png" href="../../src/logo.png"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>FamilyCalc</title> 
  <meta charset="UTF-8"> 
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0"></script> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script> 
  <nav class="navbar"> 
    <div class="container-fluid d-flex align-items-center justify-content-between"> 
      <button class="btn btn-primary menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
        <img src="../../src/list.svg">
      </button> <div class="offcanvas offcanvas-start interiorMenu" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel"> 
        <div class="offcanvas-header"> 
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button> 
        </div> 
        <div class="offcanvas-body interiorMenu"> 
          <div class="explorar"> 
            <h4>EXPLORAR</h4> 
            <a href="../../views/casas/index_casa.php">
              <img src="../../src/users.svg">Personas
            </a> 
            <a href="../../views/Impuestos_valores/imp_val.html">
              <img src="../../src/percent.svg">Valores
            </a> 
            <a href="../../views/movimientos/index_movimientos.php">
              <img src="../../src/receipt.svg">Resumen de gastos
            </a> 
            <a href="estadisticas.html">
              <img src="../../src/chart-line.svg">Estadísticas de gastos
            </a> 
          </div> 
          <div class="container-fluid d-flex justify-content-between contactos-box position-absolute bottom-0 start-50 translate-middle-x"> 
            <a class="contactos" href="#">
              <img class="position-absolute top-50 start-50 translate-middle" src="../../src/facebook-logo.svg">
            </a> 
            <a class="contactos" href="#">
              <img class="position-absolute top-50 start-50 translate-middle" src="../../src/instagram-logo.svg">
            </a> 
            <a class="contactos" href="#">
              <img class="position-absolute top-50 start-50 translate-middle" src="../../src/envelope.svg">
            </a> 
            <a class="contactos" href="#">
              <img class="position-absolute top-50 start-50 translate-middle" src="../../src/phone.svg">
            </a> 
          </div> 
        </div> 
      </div> 
      <a href="../../index.html" class="logo">
        <h1 class="mb-1 fs-2">
          <span class="family">Family</span>
          <span class="calc">Calc</span>
        </h1>
      </a> 
      <div> 
        <a href="../../views/chatbot/chatbot.html" class="btn menu" type="button">
          <img src="../../src/robot.svg">
        </a> 
        <div id="bot-tooltip"> 👋 Haz clic AQUÍ para ABRIR el CHAT con el BOT 🤖 </div> 
        <a href="#" class="btn menu" type="button">
          <img src="../../src/user-circle.svg">
        </a> 
      </div> 
    </div> 
  </nav>
  <h2>Estadísticas de Gastos</h2>

  <div class="row containerGeneral">
    <!-- FILTROS -->
    <div class="col-6 container-filtros">

      <!-- Filtrar Casa -->
      <div class="filtro">
        <label class="form-label">Casa</label>
        <select id="filtroCasa" class="form-select">
          <option value="">Todas</option>
          <?php while ($c = $casaQuery->fetch_assoc()): ?>
            <option value="<?= $c['id_casa'] ?>"><?= $c['nombre'] ?></option>
          <?php endwhile; ?>
        </select>
      </div>

      <!-- Filtrar Personas según casa -->
      <div class="filtro">
        <label class="form-label">Persona</label>
        <select id="filtroPersona" class="form-select">
          <option value="">Todas</option>
        </select>
      </div>

      <!-- Fechas -->
      <div class="filtro">
        <label class="form-label">Fecha inicio</label>
        <input type="date" id="fechaInicio" class="form-control">
      </div>

      <div class="filtro">
        <label class="form-label">Fecha fin</label>
        <input type="date" id="fechaFin" class="form-control">
      </div>

      <button id="btnFiltrar" class="btn">Aplicar Filtros</button>

    </div>

    <div class="col-6 columna-chart">
      <!-- GRÁFICO -->
      <canvas id="myChart"></canvas>  
    <style>
      .columna-chart #myChart{
      max-width: 30rem!important;
      max-height: 30rem!important;
      justify-self: center;
      }
      .filtro input, .filtro select{
        width: 80%;
        height: 3rem;
        justify-self: center;
        margin-bottom: 1rem;
      }
      .form-label{
        display: flex;
        justify-self: center;
        color: #dddddd;
        font-size: 18px;
      }
      #btnFiltrar{
        width: 80%;
        height: 3rem;
        display: flex;
        justify-self: center;
        background-color: none;
        border: solid 3px #dddddd;
        color: #dddddd;
        justify-content: center;
        margin-top: 2rem;
        font-size: 18px;
      }
      #btnFiltrar:hover{
        background-color: #dddddd;
        color: #010016e8;
      }
      .containerGeneral{
        width: 100%;
      }
      h2{
        color: #dddddd;
        display: flex;
        justify-self: center;
        margin: 0.5rem;
      }
    </style>              
    </div>
  </div>
  


<script>
let chart;

// Cargar personas al seleccionar una casa
document.getElementById("filtroCasa").addEventListener("change", function () {
    const casa = this.value;

    fetch("obtener_personas.php?casa=" + casa)
      .then(r => r.json())
      .then(data => {
        const personaSelect = document.getElementById("filtroPersona");
        personaSelect.innerHTML = "<option value=''>Todas</option>";

        data.forEach(p => {
          personaSelect.innerHTML += `<option value="${p.id_persona}">${p.nombre} ${p.apellido}</option>`;
        });
      });
});

// Función para actualizar gráfico
function cargarGrafico() {
  const casa = document.getElementById("filtroCasa").value;
  const persona = document.getElementById("filtroPersona").value;
  const inicio = document.getElementById("fechaInicio").value;
  const fin = document.getElementById("fechaFin").value;

  const url = `obtener_datos.php?casa=${casa}&persona=${persona}&inicio=${inicio}&fin=${fin}`;

  fetch(url)
    .then(r => r.json())
    .then(data => {

      if (chart) chart.destroy();

      chart = new Chart(document.getElementById("myChart"), {
        type: 'doughnut',
        data: {
          labels: data.servicios,
          datasets: [{
            data: data.totales,
            backgroundColor: [
              'rgba(255, 99, 132, .7)',
              'rgba(54, 162, 235, .7)',
              'rgba(255, 206, 86, .7)',
              'rgba(75, 192, 192, .7)',
              'rgba(153, 102, 255, .7)',
              'rgba(255, 159, 64, .7)'
            ]
          }]
        }
      });
    });
}

// Botón aplicar filtros
document.getElementById("btnFiltrar").addEventListener("click", cargarGrafico);

// Cargar gráfico inicial
cargarGrafico();
</script>

</body>
</html>

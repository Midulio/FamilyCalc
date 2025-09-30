<?php
include ("../../conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Movimientos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
   <nav class="navbar bg-body-tertiary">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="menuDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../../imagenesYLogos/menu.png" alt="Menú" height="30">
                </button>
                <ul class="dropdown-menu" aria-labelledby="menuDropdown">
                    <li><a class="dropdown-item" href="index.html">Inicio</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="montoYGastos.html">Monto y gastos</a></li> 
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Estadísticas de gastos</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Meta de compra</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Impuestos y valores</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Resumen de gastos</a></li>
                </ul>
            </div>
            <a href="../../index.html" class="logo"><h3 class="mb-0 fs-4">FamilyCalc</h3></a>
            <div>
                <a href="create.php" class="btn btn-success">Agregar movimiento</a> 
                <a href="#"><img src="../../imagenesYLogos/chatbot.png" alt="Perfil" height="35"></a>
                <a href="iniciarSesion.html"><img src="../../imagenesYLogos/perfil.png" alt="Perfil" height="35"></a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h3 class="mb-4">Listado de Movimientos</h3>

        <table class="table table-hover table-bordered">
            <tr class="table-secondary">
                <th>Casa</th>
                <th>Persona</th>
                <th>Importe</th>
                <th>Fecha Ingreso</th>
                <th>Estado</th>
                <th>Servicio</th>
                <th>Tipo de Gasto</th>
                <th>Acciones</th>
            </tr>
        <?php
        $sql = "SELECT m.id_movimientos AS id_movimiento, 
       c.nombre AS nombre_casa, 
       p.nombre AS nombre_persona, p.apellido, 
       m.importe, m.fecha_ingreso, m.estados, m.servicios, m.tipo_de_gastos
FROM movimientos AS m
INNER JOIN casa AS c ON m.id_casa = c.id_casa
INNER JOIN persona AS p ON m.id_persona = p.id_persona
ORDER BY m.fecha_ingreso DESC
";

        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado && $resultado->num_rows > 0){
            while($r = $resultado->fetch_assoc()):
        ?>
            <tr>
                <td><?= $r['nombre_casa'] ?></td>
                <td><?= $r['nombre_persona'] . " " . $r['apellido'] ?></td>
                <td>$<?= number_format($r['importe'], 2, ',', '.') ?></td>
                <td><?= $r['fecha_ingreso'] ?></td>
                <td><?= $r['estados'] ?></td>
                <td><?= $r['servicios'] ?></td>
                <td><?= $r['tipo_de_gastos'] ?></td>
                <td>
                    <a href="update_movimiento.php?upd=<?= $r['id_movimiento'] ?>" class="btn btn-primary btn-sm">Actualizar</a>
                  <a href="eliminar_movimiento.php?id_movimiento=<?= $r['id_movimiento'] ?>" class="btn btn-danger btn-sm">Eliminar</a>


                </td>
            </tr>
        <?php
            endwhile;
        }
        ?>
        </table>
    </div>
</body>
</html>

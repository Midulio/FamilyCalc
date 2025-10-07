<?php
include ("../../conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
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
    
    <title>Personas</title>

    <link rel="icon" type="image/png" href="../../src/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="style_personas.css">
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
                    <a href="#"><img src="../../src/chart-line.svg">Estadísticas de gastos</a>
                    <a href="../personas/create.php"><img src="../../src/users.svg">Personas</a>
                    <a href="../Impuestos_valores/imp_val.html"><img src="../../src/percent.svg">Valores</a>
                    <a href="../../views/movimientos/index_movimientos.php"><img src="../../src/receipt.svg">Resumen de gastos</a>
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
                <a href="create.php" class="btn btn-primary">Agregar persona</a> 
                <a href="../../views/chatbot/chatbot.html" class="btn menu" type="button"><img src="../../src/robot.svg"></a>
                <a href="../../views/iniciarSesion/iniciarSesion.html" class="btn menu" type="button"><img src="../../src/user-circle.svg"></a>
             
            </div>
        </div>
    </nav>


    <table class="table table-hover">
        <tr><br>
            <td>Casa</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Sexo</td>
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
        <td><a href="update_persona.php?upd=<?= $r['id_persona'] ?>" class="btn btn-primary">Actualizar</a></td>
        <td><a href="eliminar_persona.php?id_persona=<?= $r['id_persona'] ?>" class="btn btn-danger">Eliminar</a></td>
    </tr>
<?php
    // Finaliza el bucle while
    endwhile;
}
// Cierra la condición del if
?>


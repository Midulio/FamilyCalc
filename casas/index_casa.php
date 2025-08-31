<?php
include ("../../../conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>
<body>
   <nav class="navbar bg-body-tertiary">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="menuDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../../../imagenesYLogos/menu.png" alt="Menú" height="30">
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
            <a href="../../../index.html" class="logo"><h3 class="mb-0 fs-4">FamilyCalc</h3></a>
            <div>
                <a href="#"><img src="../../../imagenesYLogos/chatbot.png" alt="Perfil" height="35"></a>
                <a href="iniciarSesion.html"><img src="../../../imagenesYLogos/perfil.png" alt="Perfil" height="35"></a>
            </div>
        </div>
    </nav>


    <table class="table table-hover">
        <tr><br>
            <td>Nombre</td>
            <td>Calle</td>
            <td>Numero</td>
          
        </tr>
    <?php
$sql = "SELECT * FROM casa";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$resultado = $stmt->get_result();

if($resultado && $resultado->num_rows > 0){
    while($r = $resultado->fetch_assoc()):
?>
    <tr>
   
        <td><?= $r['nombre'] ?></td>
        <td><?= $r['calle'] ?></td>
        <td><?= $r['numero'] ?></td>
       <td><a href="update_casa.php?upd=<?= $r['id_casa'] ?>"  class="btn btn-primary" >Actualizar</a></td>
        <td><a href="eliminar_casa.php?id_casa=<?= $r['id_casa'] ?>" class="btn btn-danger">Eliminar</a></td>
    </tr>
<?php
    endwhile;
}
?>


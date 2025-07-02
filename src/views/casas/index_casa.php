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
</head>
<body>
    <table border="1">
        <tr><br>
        <td>id_casa</td>
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
         <td><?= $r['id_casa'] ?></td>
        <td><?= $r['nombre'] ?></td>
        <td><?= $r['calle'] ?></td>
        <td><?= $r['numero'] ?></td>
       <td><a href="update_casa.php?upd=<?= $r['id_casa'] ?>">Actualizar</a></td>
        <td><a href="eliminar_casa.php?id_casa=<?= $r['id_casa'] ?>">Eliminar</a></td>
    </tr>
<?php
    endwhile;
}
?>


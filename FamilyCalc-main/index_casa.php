<?php
include ("conexion.php");
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
            <td>Nombre</td>
            <td>Calle</td>
            <td>Numero</td>
         
        </tr>
    <?php
    $sql= "SELECT *FROM casa";
    $registros=mysqli_query($conexion, $sql);
        while ($array=mysqli_fetch_array($registros)) {
    ?>
        <tr>
            <td><?php echo $array['1']?></td>
            <td><?php echo $array['2']?></td>
            <td><?php echo $array['3']?></td>
  
        </tr>
        <?php }?>
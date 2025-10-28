<?php
include("../../conexion.php");

$sql = "SELECT * FROM casa";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$resultado = $stmt->get_result();

// Se elimina el encabezado estático que causaba la repetición:
/*
<tr>
  <td>Nombre</td>
  <td>Calle</td>
  <td>Numero</td>
  <td><button id='abrirModal' class='btn btn-success'><img src='fotos/agregar-casa.png' alt='Agregar Casa'></button></td>
</tr>
*/

if ($resultado && $resultado->num_rows > 0) {
  while ($r = $resultado->fetch_assoc()):
?>
  <tr>
    <td><?= $r['nombre'] ?></td>
    <td><?= $r['calle'] ?></td>
    <td><?= $r['numero'] ?></td>
    <td>
      <a href="update_casa.php?upd=<?= $r['id_casa'] ?>" class="btn btn-primary"><img src="fotos/actualizar.png"></a>
      <a href="eliminar_casa.php?id_casa=<?= $r['id_casa'] ?>" class="btn btn-danger"><img src="fotos/borrar.png" alt="Borrar registro"></a>
    </td>
  </tr>
<?php
  endwhile;
}
?>
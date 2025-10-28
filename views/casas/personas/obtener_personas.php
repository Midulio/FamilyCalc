<?php
include("../../../conexion.php");

$sql = "SELECT p.nombre as nombre_persona, c.nombre as nombre_casa, apellido, sexo, id_persona 
        FROM persona as p 
        INNER JOIN casa as c ON p.id_casa = c.id_casa";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$resultado = $stmt->get_result();
?>
<tr>
  <td>Casa</td>
  <td>Nombre</td>
  <td>Apellido</td>
  <td class='d-none d-md-table-cell'>Sexo</td>
  <td><button id='abrirModalPersona' class='btn btn-success'><img src='fotos/agregar-usuario.png' alt='Agregar Persona'></button></td>
</tr>
<?php
if ($resultado && $resultado->num_rows > 0) {
  while ($r = $resultado->fetch_assoc()):
?>
  <tr>
    <td><?= $r['nombre_casa'] ?></td>
    <td><?= $r['nombre_persona'] ?></td>
    <td><?= $r['apellido'] ?></td>
    <td><?= $r['sexo'] ?></td>
    <td>
      <a href="personas/update_persona.php?upd=<?= $r['id_persona'] ?>" class="btn btn-primary"><img src="fotos/persona.png"></a>
      <a href="personas/eliminar_persona.php?id_persona=<?= $r['id_persona'] ?>" class="btn btn-danger"><img src="fotos/borrar.png"></a>
    </td>
  </tr>
<?php
  endwhile;
}
?>

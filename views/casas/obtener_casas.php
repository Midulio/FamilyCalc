<?php
// Incluye el archivo de conexión a la base de datos (contiene la variable $conexion).
include("../../conexion.php");

// --- Consulta a la Base de Datos ---

// Define la consulta SQL para seleccionar todas las columnas de la tabla 'casa'.
$sql = "SELECT * FROM casa";
// Prepara la sentencia SQL para su ejecución segura (previene inyección SQL).
$stmt = $conexion->prepare($sql);
// Ejecuta la sentencia preparada.
$stmt->execute();
// Obtiene el conjunto de resultados de la sentencia ejecutada.
$resultado = $stmt->get_result();

// --- Bloque Comentado (Encabezado Estático) ---

// Comentario que indica que el encabezado estático de la tabla fue removido (para evitar repetición en el bucle).
// Se elimina el encabezado estático que causaba la repetición:
/*
<tr>
  <td>Nombre</td>
  <td>Calle</td>
  <td>Numero</td>
  <td><button id='abrirModal' class='btn btn-success'><img src='fotos/agregar-casa.png' alt='Agregar Casa'></button></td>
</tr>
*/

// --- Generación de la Tabla HTML ---

// Verifica si la consulta fue exitosa ($resultado existe) y si hay filas para mostrar ($resultado->num_rows > 0).
if ($resultado && $resultado->num_rows > 0) {
  // Inicia un bucle que recorre cada fila del resultado como un array asociativo ($r).
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
  // Finaliza el bucle 'while' después de imprimir la fila <tr>.
  endwhile;
// Finaliza el bloque 'if' que verifica la existencia de resultados.
}
?>
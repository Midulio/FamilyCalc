<?php
include("../../conexion.php");
$sql = "SELECT SUM(importe) AS total FROM movimientos";
$result = $conexion->query($sql);

if ($result && $row = $result->fetch_assoc()) {
    echo number_format($row['total'], 2, ',', '.');
} else{
    echo "0,00";
}
?>
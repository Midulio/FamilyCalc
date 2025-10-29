<?php
include("../../conexion.php");

if (!isset($_GET['id'])) {
  http_response_code(400);
  echo json_encode(["error" => "ID no proporcionado"]);
  exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM casa WHERE id_casa = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $row = $result->fetch_assoc()) {
  echo json_encode($row);
} else {
  http_response_code(404);
  echo json_encode(["error" => "Casa no encontrada"]);
}
?>
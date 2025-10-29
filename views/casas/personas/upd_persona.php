<?php
// Ejemplo de cómo debería estructurarse upd_persona.php

include("../../../conexion.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Obtener y sanitizar datos (Asegúrate de que esto se haga correctamente)
    $id_persona = $_POST['id_persona'] ?? null;
    $id_casa = $_POST['id_casa'] ?? null;
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $sexo = $_POST['sexo'] ?? '';

    // Verifica que los campos cruciales existan
    if (!$id_persona || !$id_casa || empty($nombre) || empty($apellido) || empty($sexo)) {
        // Si faltan datos importantes, imprime un mensaje que NO sea 'OK'
        echo "ERROR_DATOS_FALTANTES";
        exit;
    }

    // Consulta de actualización
    $sql = "UPDATE persona SET id_casa=?, nombre=?, apellido=?, sexo=? WHERE id_persona=?";
    $stmt = $conexion->prepare($sql);
    
    // Asegúrate de que los tipos de datos son correctos (s = string, i = integer)
    // El orden aquí debe coincidir con el orden en el SET: id_casa(i), nombre(s), apellido(s), sexo(s), id_persona(i)
    $stmt->bind_param("isssi", $id_casa, $nombre, $apellido, $sexo, $id_persona);

    if ($stmt->execute()) {
        // Si la ejecución fue exitosa, IMPRIME SÓLO "OK"
        echo "OK"; 
    } else {
        // Si hubo un error en la base de datos (aunque los datos existan)
        echo "ERROR_DB: " . $stmt->error;
    }
    
    $stmt->close();
    $conexion->close();
    exit; // Asegura que no se imprima nada más después
}

// Si la petición no es POST, imprime error y sale.
echo "INVALID_REQUEST";

?>
<?php
session_start();
session_unset();
session_destroy();

// Detecta el protocolo (http o https)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";

// Detecta la ruta base del proyecto automáticamente
$scriptPath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])); // Normaliza rutas en Windows
$pathParts = explode('/', trim($scriptPath, '/'));
$projectFolder = isset($pathParts[0]) ? $pathParts[0] : '';

// Construye la URL base del proyecto (ej: http://localhost/FamilyCalc)
$baseUrl = "$protocol://{$_SERVER['HTTP_HOST']}" . (!empty($projectFolder) ? "/$projectFolder" : "");

// Redirige siempre al login dentro de /views/usuarios/
header("Location: $baseUrl/views/usuarios/iniciarSesion.html");
exit;
?>
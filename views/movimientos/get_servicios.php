<?php
// Incluye el archivo de conexión a la base de datos para usar la variable $conexion
include("../../conexion.php");

/**
 * 🚀 CONFIGURACIÓN DE GRUPOS
 * Este array define los servicios principales ("padres") y sus subservicios ("hijos").
 * Si querés agregar un nuevo grupo o servicio, solo tenés que modificar este array.
 */
$grupos_servicios = [
    "Entretenimiento" => ["Comidas y Bebidas", "Cine", "Supermercado"],
    "Videojuegos o Suscripciones" => ["Monedas Virtuales", "Suscripción"],
    "Viajes" => ["Transporte", "Alojamiento"],
    "Indumentaria" => ["Ropa", "Calzado"],
    "Salud" => ["Consultas Médicas", "Medicamentos"],
    "Cuentas Bancarias" => ["Internet y Cable", "Hogar", "Luz", "Gas", "Prepaga"],
    "Regalos" => ["Cumpleaños", "Otros"]
];

/**
 * 🔧 Función asegurarServicio
 * Inserta un servicio en la tabla `Servicios` solo si no existe ya en la base de datos.
 * 
 * @param mysqli $conexion  → conexión activa a la base de datos
 * @param array  &$mapa     → referencia al array que guarda los servicios existentes (nombre → id)
 * @param string $nombre    → nombre del servicio a asegurar
 * @param int|null $id_padre → id del servicio padre (si es hijo, sino null)
 * @return int              → id del servicio asegurado o recién insertado
 */
function asegurarServicio($conexion, &$mapa, $nombre, $id_padre = null)
{
    // Si el servicio ya está en el mapa, devuelve su ID (evita duplicados)
    if (isset($mapa[$nombre])) {
        return $mapa[$nombre];
    }

    // Prepara la consulta SQL para insertar un nuevo servicio
    $stmt = $conexion->prepare("INSERT INTO Servicios (Servicio, id_padre) VALUES (?, ?)");
    
    // Asocia los valores (nombre del servicio e ID del padre)
    $stmt->bind_param("si", $nombre, $id_padre);
    
    // Ejecuta la consulta
    $stmt->execute();
    
    // Obtiene el ID del servicio recién insertado
    $nuevo_id = $stmt->insert_id;
    
    // Cierra la sentencia preparada para liberar recursos
    $stmt->close();

    // Guarda el nuevo servicio en el mapa local
    $mapa[$nombre] = $nuevo_id;

    // Devuelve el ID del servicio
    return $nuevo_id;
}

// --- Leer los servicios existentes desde la base de datos ---
$sql = "SELECT id_servicio, Servicio, id_padre FROM Servicios";
$result = $conexion->query($sql);

// Se crea un mapa asociativo donde se guardarán los servicios existentes (nombre → id)
$mapa_db = [];

// Si hay resultados, se recorre cada fila y se agrega al mapa
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $mapa_db[$row["Servicio"]] = $row["id_servicio"];
    }
}

// --- Crear estructura jerárquica de servicios ---
$serviciosAgrupados = [];

// Recorre todos los grupos definidos en $grupos_servicios
foreach ($grupos_servicios as $padre => $hijos) {

    // Asegura que el servicio padre exista en la base (lo crea si no está)
    $id_padre = asegurarServicio($conexion, $mapa_db, $padre);

    // Crea la estructura base del grupo (padre con su ID)
    $grupo = [
        "padre" => $padre,
        "id_padre" => $id_padre,
        "hijos" => [] // se llenará más adelante
    ];

    // Recorre los servicios hijos asociados al padre
    foreach ($hijos as $hijo) {

        // Asegura que el hijo exista en la base y lo asocia a su padre
        $id_hijo = asegurarServicio($conexion, $mapa_db, $hijo, $id_padre);

        // Agrega el hijo con su información al grupo actual
        $grupo["hijos"][] = [
            "id_servicio" => $id_hijo,
            "Servicio" => $hijo,
            "id_padre" => $id_padre
        ];
    }

    // Agrega el grupo completo (padre + hijos) al arreglo final
    $serviciosAgrupados[] = $grupo;
}

// --- Enviar el resultado final al cliente (en formato JSON legible) ---
header("Content-Type: application/json");

// Devuelve el array de servicios agrupados como JSON con formato y sin escapar caracteres Unicode
echo json_encode($serviciosAgrupados, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>
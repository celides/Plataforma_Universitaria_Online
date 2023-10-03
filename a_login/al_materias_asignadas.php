<?php
require_once("conectar.php");

$query = "SELECT * FROM mi_tabla";
$resultado = $mysqli->query($query);

$queryMateria = "INSERT INTO `maestro_materia`(`maestro_id`, `materia_id`) VALUES ($dato_id,  $nombre_materia)";

$mysqli->query($queryMateria);

if ($resultado) {
    // Procesar los resultados aquí
    // ...
} else {
    // Manejar errores si la consulta falla
    echo "Error en la consulta: " . $mysqli->error;
}

// Cerrar la conexión cuando hayas terminado
$mysqli->close();
?>
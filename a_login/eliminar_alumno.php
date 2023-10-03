<?php
// Incluye el archivo de conexión a la base de datos
include('conectar.php');

// Verifica si se ha recibido el ID del alumno a eliminar
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idAlumno = $_GET['id'];

    // Realiza la eliminación del alumno en la base de datos
    $query = "DELETE FROM usuarios_datos WHERE id_ud = $idAlumno";

    if ($mysqli->query($query)) {
        // La eliminación se realizó con éxito
        echo "Alumno eliminado con éxito.";
    } else {
        // Hubo un error en la eliminación
        echo "Error al eliminar al alumno: " . $mysqli->error;
    }
} else {
    // No se proporcionó un ID válido para eliminar
    echo "ID de alumno no válido.";
}

// Cierra la conexión a la base de datos
$mysqli->close();
?>

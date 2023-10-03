<?php
include("./conectar.php");

if (isset($_GET['id_ud'])) {
    $id = $_GET['id_ud'];

    // Prepara la consulta SQL para eliminar al maestro
    $sql = "DELETE FROM USUARIOS_DATOS WHERE id_ud = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    // Ejecuta la consulta SQL para eliminar al maestro
    if ($stmt->execute()) {
        echo "";
    } else {
        echo "Error al eliminar al maestro: " . $conn->error;
    }
} else {
    echo "No se proporcionó el ID del maestro a eliminar.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éxito al eliminar al maestro</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-lg text-center">
        <p class="text-green-500 text-2xl font-bold mb-4">Maestro eliminado con éxito</p>
        <a href="a_ingreso_maestro.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Volver a la página Lista de Maestros</a>
    </div>
</body>
</html>

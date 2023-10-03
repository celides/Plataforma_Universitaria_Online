<?php


include('./conectar.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escuela_db";


$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de la tabla 'materia'
$sql = "SELECT * FROM `materia`";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Iniciar un bucle para recorrer los resultados
    while ($row = $result->fetch_assoc()) {
        // Acceder a los datos de la tabla 'materia' aquí
        $nombreMateria = $row['nombre_materia'];
        
        // Realizar acciones con los datos, por ejemplo, imprimirlos
        echo "Nombre de la materia: " . $nombreMateria . "<br>";
    }
} else {
    echo "No se encontraron resultados en la tabla 'materia'.";
}

// Cerrar la conexión
$conn->close();
?>






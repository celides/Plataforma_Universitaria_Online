<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escuela_db";


$mysqli = new mysqli($servername, $username, $password, $dbname);

// Crear una instancia de conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión tiene errores
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

?>

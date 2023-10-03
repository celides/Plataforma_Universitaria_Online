<?php


session_start();

// Verifica que el usuario esté autenticado y sea administrador
if (!isset($_SESSION['user']) || $_SESSION['user']['id_rol'] != 1) {
    header('Location: login.php');
    exit();
}

        // Configuración de la conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "escuela_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error en la conexión: " . $conn->connect_error);
        }

        // Consulta SQL para actualizar permiso
        $sql = "UPDATE usuarios_login SET permiso = '1' WHERE email = 'admi@admi'";


        // Ejecutar la consulta SQL
        if ($conn->query($sql) === TRUE) {
            // Éxito en la actualización
            $response = array('success' => true);
        } else {
            // Error en la actualización
            $response = array('success' => false);
        }

        // Cerrar la conexión a la base de datos
        $conn->close();

        // Redireccionar al usuario a la página anterior
        header("Location: a_ingreso_per.php");
        exit();
    
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        include('conectar.php');
        $mysqli->query("SET FOREIGN_KEY_CHECKS = 0");

        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];

        // Verifica si los campos obligatorios están vacíos
        if (empty($dni) || empty($nombre) || empty($apellidos)) {
            echo "Los campos DNI, Nombre y Apellido son obligatorios.";
            exit();
        }

        $query = "INSERT INTO usuarios_datos (dni, nombre, apellidos) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $mysqli->prepare($query);

        if ($stmt) {
            $stmt->bind_param("sssssi", $dni, $nombre, $apellidos);

            if ($stmt->execute()) {
                header('Location: a_ingreso_alumnos.php');
                exit();
            } else {
                echo "Error al agregar al alumno: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta: " . $mysqli->error;
        }
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
} else {
    // Redirecciona a la página de ingreso de alumnos si no se envía el formulario
    header('Location: a_ingreso_alumnos.php');
    exit();
}
?>

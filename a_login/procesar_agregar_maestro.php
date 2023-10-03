<?php
include('./conectar.php');
include('./contracena_por_defecto.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $email = $_POST['email'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $nombre_materia = $_POST['clase_asignada'];

        // Insertar los datos en la tabla usuarios_datos
        $query = "INSERT INTO usuarios_datos (`nombre`, `apellidos`, `direccion`, `fecha_nacimiento`, `id_rol`) VALUES (?, ?, ?, ?, 2)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ssss", $nombre, $apellidos, $direccion, $fecha_nacimiento);
        
        if ($stmt->execute()) {
            // Obtener el ID de la última inserción
            $dato_id = $stmt->insert_id;

            if ($nombre_materia) {
                // Asegúrate de definir correctamente la función crear_usuario
                crear_usuario($email, $dato_id);
            }
            
            // Redirigir a una página de éxito
            header("Location: a_ingreso_maestro.php?success=1");
            exit();
        } else {
            // Manejar errores de inserción en la base de datos
            echo "Error al insertar en la base de datos.";
        }
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
}
?>

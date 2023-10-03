
<?php
// Incluye el archivo de conexión
include("./conectar.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $id = $_POST['updateId'];
        $email = $_POST['updateCorreo'];
        $nombre = $_POST['updateNombre'];
        $apellidos = $_POST['updateApellidos'];
        $direccion = $_POST['updateDireccion'];
        $fecha_nacimiento = $_POST['updatefecha_nacimiento'];

        // Establece la conexión a la base de datos
        $mysqli = new mysqli("localhost", "root", "", "escuela_db");

        // Verifica la conexión
        if ($mysqli->connect_error) {
            die("Error de conexión a la base de datos: " . $mysqli->connect_error);
        }


        // Asegúrate de que las variables estén correctamente escapadas para evitar inyecciones SQL
        $nombre = $mysqli->real_escape_string($nombre);
        $apellidos = $mysqli->real_escape_string($apellidos);
        $direccion = $mysqli->real_escape_string($direccion);
        $fecha_nacimiento = $mysqli->real_escape_string($fecha_nacimiento);

        // Consulta SQL para actualizar la tabla usuarios_datos
        $sqlUpdateDatos = "UPDATE usuarios_datos SET `nombre`='$nombre', `apellidos`='$apellidos', `direccion`='$direccion', `fecha_nacimiento`='$fecha_nacimiento' WHERE `id_ud`=$id";

        // Ejecuta la consulta SQL
        if ($mysqli->query($sqlUpdateDatos) === TRUE) {
            // Consulta SQL para actualizar la tabla usuarios_login
            $sqlUpdateLogin = "UPDATE usuarios_login SET `email`='$email' WHERE `datos_id`=$id";

            // Ejecuta la consulta SQL para la tabla usuarios_login
            if ($mysqli->query($sqlUpdateLogin) === TRUE) {
                header('Location: a_ingreso_maestro.php');
            } else {
                echo "Error al actualizar la tabla usuarios_login: " . $mysqli->error;
            }
        } else {
            echo "Error al actualizar la tabla usuarios_datos: " . $mysqli->error;
        }
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
}


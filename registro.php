<?php
include("conectar.php"); // Incluye tu archivo de conexión a la base de datos

if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['password'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash de la contraseña

    // Verificar si el email electrónico ya está en uso
    $emailExistsQuery = "SELECT * FROM usuarios_login WHERE email = '$email'";
    $result = $mysqli->query($emailExistsQuery);

    if ($result->num_rows > 0) {
        // El email electrónico ya está en uso, manejar el error (por ejemplo, mostrar un mensaje)
        echo "El correo electrónico ya está en uso. Por favor, utiliza otro.";
    } else {
        // El correo electrónico no está en uso, proceder con el registro
        $insertQuery = "INSERT INTO usuarios_datos (nombre) VALUES ('$nombre')";
        $mysqli->query($insertQuery);

        $id_usuario = $mysqli->insert_id; // Obtener el ID del nuevo usuario

        $insertLoginQuery = "INSERT INTO usuarios_login (email, password, datos_id) VALUES ('$email', '$password', '$id_usuario')";
        $mysqli->query($insertLoginQuery);

        // Redireccionar al usuario después del registro exitoso
        header("location: login.php"); // Puedes redirigirlo a la página de inicio de sesión
    }
}
?>

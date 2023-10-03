<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escuela_db";

  require_once('conectar.php');
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $dni = $_POST['dni'];
  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $id_ud = $_POST['id_ud']; // Obtén el ID del alumno que deseas editar desde el formulario

  // Verifica si los campos obligatorios están vacíos
  if (empty($nombre) || empty($apellidos)) {
    echo "Los campos Nombre y Apellidos son obligatorios.";
  } else {
    // Actualiza los valores en la base de datos
    $sql = "UPDATE usuarios_datos SET dni=?, nombre=?, apellidos=? WHERE id_ud=?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
      $stmt->bind_param('sssi', $dni, $nombre, $apellidos, $id_ud);

      if ($stmt->execute()) {
        // Redirecciona después de la actualización exitosa
        header('Location:  a_Ingreso_Alumnos.php');
        exit();
      } else {
        echo "Error al actualizar el alumno: " . $stmt->error;
      }

      $stmt->close();
    } else {
      echo "Error en la preparación de la consulta: " . $conn->error;
    }
  }
  $conn->close();
} else {
  header('Location: a_Ingreso_Alumnos.php');
  exit();
}
?>

<?php
require_once('conectar.php'); 
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['id_rol'] != 1) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = $_POST['email'];
    $permiso = $_POST['permiso'];

    
    $sql = "INSERT INTO usuarios_login (email, permiso.rol FROM usuarios_login) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $email, $permiso);

    if ($stmt->execute()) {
        
        header('Location: a_ingreso_per.php'); 
        exit();
    } else {
        echo 'Error al agregar el usuario.';
    }

    $stmt->close();
}

?>

<link rel="stylesheet" href="/dist//output.css">
    <script src="https://cdn.tailwindcss.com"></script>
<h3 class="text-lg font-bold mb-4">Agregar nuevo usuario</h3>

<form action="agregar_usuario.php" method="post">
  <div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2" for="email">Email:</label>
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" required>
  </div>

  <div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2" for="permiso">Permiso:</label>
    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="permiso" name="permiso" required>
      <option value="1">Administrador</option>
      <option value="2">Maestro</option>
      <option value="3">Estudiante</option>
    </select>
  </div>

  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
    Agregar Usuario
  </button>
</form>


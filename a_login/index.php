<?php

session_start();

if(isset($_SESSION['user'])) {

  $_SESSION['user'] = [
    'rol' => $row['id_rol']
];

  if($_SESSION['user']['id_rol'] == 1) {
    header('Location: a_panel_de_control_admin.php');
  } else if ($_SESSION['user']['id_rol'] == 2) { 
    header('Location: maestro_ panel_de_control.php');
  }
} else if ($_SESSION['user']['id_rol'] == 3) { 
  header('Location: al_panel_de_control_alumno.php');

} else {
  header('Location: login.php'); 
}


?>

<!DOCTYPE html>
<html>
<body>

<script>
// Petición AJAX
fetch('obtener_usuarios.php')
.then(respuesta => respuesta.json())  
.then(usuarios => {

  // Pintar data en HTML
  let html = '';
  usuarios.forEach(usuario => {
    html += `
      <p>${usuario.nombre}</p>  
    `;
  });

  document.getElementById('usuarios').innerHTML = html;

});
</script>

<div id="usuarios"></div>

</body>
</html>
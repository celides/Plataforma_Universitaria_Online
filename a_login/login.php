<?php
include("./conectar.php");
session_start();

$loginquery = "";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $loginquery = "SELECT usuarios_login.email, usuarios_login.password, usuarios_login.id_rol 
                   FROM usuarios_login 
                   WHERE usuarios_login.email = ?";

    // Prepara la consulta
    $stmt = $conn->prepare($loginquery);

    // Vincula el parámetro y ejecuta la consulta
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Obtiene el resultado
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $rol = $row['id_rol'];

        // Establece la variable $id_rol correctamente
        $id_rol = $rol;

        $_SESSION['user'] = [
            'id_rol' => $rol
        ];

        switch ($id_rol) {
            case 1: // Rol de administrador
                header("location: a_panel_de_control_admin.php");
                break;
            case 2: // Rol de maestro
                header("location: maestro_ panel_de_control.php");
                break;
            case 3: // Rol de alumno
                header("location: al_panel_de_control_alumno.php");
                break;
            default:
                // Manejar el caso en que el rol sea desconocido
                break;
        }
    } else {
        // El usuario no existe o las credenciales son incorrectas
        // Debes manejar este caso apropiadamente
    }

    $stmt->close(); // Cierra la consulta preparada
} else {
    // El usuario no existe o las credenciales son incorrectas
    // Debes manejar este caso apropiadamente
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist//output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>

<form method="post" action="registro.php">

    <!-- Otros campos como apellidos, email, contraseña y rol -->


</form>


<body class="flex items-center justify-center  flex-col h-screen bg-amber-100">

    <div class="w-28 h-30">
        <img src="/aa_views/imagenes/logo.jpg" alt="logo">
    </div>

    <div class="bg-white p-5 rounded-none shadow-md h-70 w-80">
        <h2 class="text-x font-semibold-[#BDBDBD] mb-4 flex justify-center ">Bienvenido ingresa con tu cuenta
        </h2>
        <form method="post" action="login.php">
            <div class="flex items-center gap-3 px-3 h-10 max-w-[360px] border rounded-md border-[#BDBDBD] mb-4">

                <input type="text" name="email" id="email" placeholder="Email" class="h-9 w-full outline-none">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                        <g clip-path="url(#clip0_1_7)">
                            <path d="M20.6555 4.49072H4.65552C3.55552 4.49072 2.65552 5.39072 2.65552 6.49072V18.4907C2.65552 19.5907 3.55552 20.4907 4.65552 20.4907H20.6555C21.7555 20.4907 22.6555 19.5907 22.6555 18.4907V6.49072C22.6555 5.39072 21.7555 4.49072 20.6555 4.49072ZM20.2555 8.74072L13.7155 12.8307C13.0655 13.2407 12.2455 13.2407 11.5955 12.8307L5.05552 8.74072C4.80552 8.58072 4.65552 8.31072 4.65552 8.02072C4.65552 7.35072 5.38552 6.95072 5.95552 7.30072L12.6555 11.4907L19.3555 7.30072C19.9255 6.95072 20.6555 7.35072 20.6555 8.02072C20.6555 8.31072 20.5055 8.58072 20.2555 8.74072Z" fill="#828282" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1_7">
                                <rect width="24" height="24" fill="white" transform="translate(0.655518 0.490723)" />
                            </clipPath>
                        </defs>
                    </svg>
                </span>


            </div>
            <div class="flex items-center gap-3 px-3 h-10 max-w-[360px] border rounded-md border-[#BDBDBD] mb-4">
                <input type="password" name="password" id="password" placeholder="Password" class="h-9 w-full outline-none">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                        <g clip-path="url(#clip0_1_12)">
                            <path d="M18.6555 8.99072H17.6555V6.99072C17.6555 4.23072 15.4155 1.99072 12.6555 1.99072C9.89552 1.99072 7.65552 4.23072 7.65552 6.99072V8.99072H6.65552C5.55552 8.99072 4.65552 9.89072 4.65552 10.9907V20.9907C4.65552 22.0907 5.55552 22.9907 6.65552 22.9907H18.6555C19.7555 22.9907 20.6555 22.0907 20.6555 20.9907V10.9907C20.6555 9.89072 19.7555 8.99072 18.6555 8.99072ZM12.6555 17.9907C11.5555 17.9907 10.6555 17.0907 10.6555 15.9907C10.6555 14.8907 11.5555 13.9907 12.6555 13.9907C13.7555 13.9907 14.6555 14.8907 14.6555 15.9907C14.6555 17.0907 13.7555 17.9907 12.6555 17.9907ZM9.65552 8.99072V6.99072C9.65552 5.33072 10.9955 3.99072 12.6555 3.99072C14.3155 3.99072 15.6555 5.33072 15.6555 6.99072V8.99072H9.65552Z" fill="#828282" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1_12">
                                <rect width="24" height="24" fill="white" transform="translate(0.655518 0.990723)" />
                            </clipPath>
                        </defs>
                    </svg>
                </span>


            </div>
            <div class="flex justify-end">
                <button type="submit" class="w-1/3 bg-blue-600 text-white rounded-md py-1 px-2 focus:outline-none hover:bg-indigo-700 ">
                    Ingresar
                </button>
            </div>
    </div>
    </form>
    </div>

    <body class="flex items-center justify-center flex-col h-screen bg-amber-100">
        <div class="w-28 h-30">
            <img src="/aa_views//imagenes//logo.jpg" alt="logo">
        </div>

        <div class="bg-white p-5 rounded-none shadow-md h-70 w-80">
            <h2 class="text-xl font-semibold text-[#BDBDBD] mb-4 flex justify-center">Bienvenido, ingresa con tu cuenta</h2>
            <form method="post" action="login.php">
            </form>
        </div>

        <button class="mt-4 bg-blue-600 text-white rounded-md py-1 px-2 focus:outline-none hover:bg-indigo-700" onclick="mostrarVentanaEmergente()">Ver Credenciales</button>

        <div id="credencialesModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-700 opacity-75"></div>
                </div>

                <!-- modal -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

                <div class="inline-block align-bottom bg-amber-100 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-9 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <img src="/aa_views/imagenes/logo.jpg" alt="logo" alt="Logotipo de la universidad" class="w-20 mx-auto mt-4">

                    <div class="bg-white px-4 pt-5 pb-4 sm:p-7.5 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 bg-cream-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-1000" id="modal-headline">
                                    Credenciales de acceso
                                </h3>
                                <div class="mt-2">
                                    <!-- Agrega las credenciales para admin, maestro y alumno aquí -->
                                    <p class="text-sm text-gray-700">
                                        <strong>Admin:</strong> Usuario - admi@admi, Contraseña - 333
                                    </p>
                                    <p class="text-sm text-gray-700">
                                        <strong>Maestro:</strong> Usuario - maestro7@maestro, Contraseña - 333
                                    </p>
                                    <p class="text-sm text-gray-700">
                                        <strong>Alumno:</strong> Usuario - estudiante1@estudiante1
                                        Contraseña - 333
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                            <button id="cerrarModal" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Cerrar
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function mostrarVentanaEmergente() {
                var modal = document.getElementById("credencialesModal");
                modal.style.display = "block";
            }

            function cerrarVentanaEmergente() {
                var modal = document.getElementById("credencialesModal");
                modal.style.display = "none";
            }
            var botonCerrar = document.getElementById("cerrarModal");
            botonCerrar.addEventListener("click", cerrarVentanaEmergente);
        </script>



    </body>

</html>
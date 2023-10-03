<?php

session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['id_rol'] != 1) {
    header('Location: login.php');
    // Redirigir si no se cumple la condición
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escuela_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

$sql = "SELECT `id_ud`,`dni`,`nombre`,`apellidos`,`email`,`direccion`,`fecha_nacimiento`,`nombre_materia`,`id_materia` FROM materia LEFT JOIN `maestro_materia` on materia.id_materia = maestro_materia.materia_id RIGHT JOIN `usuarios_datos` on maestro_materia.maestro_id = usuarios_datos.id_ud LEFT JOIN `usuarios_login` on id_ul = usuarios_login.datos_id WHERE id_rol=2";
$result = $conn->query($sql);


$materiaquery = "SELECT * FROM materia";
$resultmateria = $conn->query($materiaquery);



?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/dist//output.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- sidebar -->
    <div class="w-screen h-screen flex">

        <div class="flex h-full bg-blue-900 text-white w-60  py-6 flex-col justify-between">

            <div class="px-6">
                <div class="flex flex-row justify-center items-center width=50px pb-2">
                    <img src="/aa_views/imagenes/logo.jpg" alt="Logo" class="mx-auto max-w-full rounded-full" width="50px" height="50px mb-">
                    <span class="block font-semibold text-gray-300">Universidad</span>
                </div>
                <div class="border-t border-white mb-2 pt-4 text-sm">Administrador</div>
                <div class="border-t border-white pt-4 text-sm ">Menu Administracion</div>
                <div class="mt-6 space-y-2">
                    <a href="a_ingreso_per.php" class=" flex flex-row justify-center  group"><img src="/aa_views/imagenes/rights.png" alt="llave" height="32px" width="32px">
                        <p class="px-4"> Permisos </p>

                    </a>
                    <a href="a_ingreso_maestro.php" class=" flex flex-row justify-center  group">
                        <img src="/aa_views/imagenes/tutor.png" alt="" height="32px" width="32px">
                        <p class=" px-4"> Maestros </p>

                    </a>
                    <a href="a_ingreso_alumnos.php" class=" flex flex-row justify-center  group">
                        <img src="/aa_views/imagenes/students.png" alt="" height="32px" width="32px">
                        <p class="px-4"> Alumnos </p>

                    </a>
                    <a href="" class=" flex flex-row justify-center group">
                        <img src="/aa_views/imagenes/clases.png" alt="" height="32px" width="32px">
                        <p class="px-4"> Clases </p>

                    </a>
                </div>
            </div>
        </div>

        <div class="flex flex-col w-[calc(100%-15rem)] px-2">
            <!-- Barra de arriba -->
            <nav class="flex h-10 w-full  flex-row justify-between items-center">

                <div class=" flex flex-row justify-items-stretch">

                    <a href="a_panel_de_control.php" class="relative  flex flex-row items-center group">

                        <img src="/aa_views/imagenes/menu.jpeg" alt="icono menu" width="18px" height="18px px-2">
                        <p class="px-4"> Home </p>

                    </a>
                </div>

                <div class=" flex flex-row justify-between items-center">

                    <button class="relative flex justify-center items-center group">
                        <p class="px-4"> administrador </p>
                        <div class="absolute hidden group-focus:block top-full min-w-full w-max bg-white mt-1 rounded">
                            <ul class="text-left border none">
                                <li class="px-4 py-1 border-b flex flex-row gap-3"> <span><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                            <g clip-path="url(#clip0_570_384)">
                                                <path d="M10.6435 2.18596C6.04354 2.18596 2.31021 5.91929 2.31021 10.5193C2.31021 15.1193 6.04354 18.8526 10.6435 18.8526C15.2435 18.8526 18.9769 15.1193 18.9769 10.5193C18.9769 5.91929 15.2435 2.18596 10.6435 2.18596ZM10.6435 4.68596C12.0269 4.68596 13.1435 5.80263 13.1435 7.18596C13.1435 8.56929 12.0269 9.68596 10.6435 9.68596C9.26021 9.68596 8.14354 8.56929 8.14354 7.18596C8.14354 5.80263 9.26021 4.68596 10.6435 4.68596ZM10.6435 16.5193C8.56021 16.5193 6.71854 15.4526 5.64354 13.836C5.66854 12.1776 8.97688 11.2693 10.6435 11.2693C12.3019 11.2693 15.6185 12.1776 15.6435 13.836C14.5685 15.4526 12.7269 16.5193 10.6435 16.5193Z" fill="#4F4F4F" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_570_384">
                                                    <rect width="20" height="20" fill="white" transform="translate(0.643555 0.519287)" />
                                                </clipPath>
                                            </defs>
                                        </svg></span> </i> <span> Perfil</span> </li>
                                <li class="px-4 py-1 border-b flex flex-row gap-3"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <g clip-path="url(#clip0_570_373)">
                                            <path d="M8.99167 13.575C9.31667 13.9 9.84167 13.9 10.1667 13.575L13.1583 10.5833C13.4833 10.2583 13.4833 9.73333 13.1583 9.40833L10.1667 6.41667C9.84167 6.09167 9.31667 6.09167 8.99167 6.41667C8.66667 6.74167 8.66667 7.26667 8.99167 7.59167L10.5583 9.16667H3.33333C2.875 9.16667 2.5 9.54167 2.5 10C2.5 10.4583 2.875 10.8333 3.33333 10.8333H10.5583L8.99167 12.4C8.66667 12.725 8.675 13.2583 8.99167 13.575ZM15.8333 2.5H4.16667C3.24167 2.5 2.5 3.25 2.5 4.16667V6.66667C2.5 7.125 2.875 7.5 3.33333 7.5C3.79167 7.5 4.16667 7.125 4.16667 6.66667V5C4.16667 4.54167 4.54167 4.16667 5 4.16667H15C15.4583 4.16667 15.8333 4.54167 15.8333 5V15C15.8333 15.4583 15.4583 15.8333 15 15.8333H5C4.54167 15.8333 4.16667 15.4583 4.16667 15V13.3333C4.16667 12.875 3.79167 12.5 3.33333 12.5C2.875 12.5 2.5 12.875 2.5 13.3333V15.8333C2.5 16.75 3.25 17.5 4.16667 17.5H15.8333C16.75 17.5 17.5 16.75 17.5 15.8333V4.16667C17.5 3.25 16.75 2.5 15.8333 2.5Z" fill="#EB5757" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_570_373">
                                                <rect width="20" height="20" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>Salir </li>
                            </ul>
                        </div>
                        <img src="/aa_views/imagenes/downarrow_abajo_5820.png" alt="icono flecha" width="18px" height="18px">
                    </button>
                </div>


            </nav>
            <section class=" h-screen bg-blue-50">
                <div class="flex  w-full flex-row justify- items-center    ">

                    <div class="flex h-10 w-full  flex-row justify-between items-center">
                        <h1 class="text-xl"> Lista de Maestro </h1>
                        <div>
                            <a href="a_panel_de_control.php" class=" text-blue-500">Home</a>/
                            <span>Maestro</span>
                        </div>
                    </div>
                </div>

                <div class="max-w-full mx-auto p-8 bg-white rounded shadow-lg mt-8">
                    <div class="flex justify-between mb-4">
                        <h3 class="text-2xl font-semibold">Información de Maestros</h3>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 cursor-pointer" id="modalToggle">
                            Agregar Maestro
                        </button>
                    </div>
                    <!-- _______________________________________________________________Modal_____________________________________________________ -->


                    <div id="modal" class="hidden fixed top-0 left-0 w-full h-full flex justify-center items-center bg-opacity-50 bg-black">
                        <div class="bg-white p-8 rounded shadow-lg w-1/2">
                            <h2 class="text-2xl font-semibold mb-4">Agregar Maestro</h2>
                            
                            <form action="procesar_agregar_maestro.php" method="POST">
                                <div class="mb-2">
                                    <label for="email" class="block font-medium">Correo Electrónico:</label>
                                    <input type="email" id="email" name="email" placeholder="Ingresa el email electrónico" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300" required>
                                </div>
                                <div class="mb-2">
                                    <label for="nombre" class="block font-medium">Nombre(s):</label>
                                    <input type="text" id="nombre" name="nombre" placeholder="Ingresa el nombre" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300" required>
                                </div>
                                <div class="mb-2">
                                    <label for="apellidos" class="block font-medium">Apellido(s):</label>
                                    <input type="text" id="apellidos" name="apellidos" placeholder="Ingresa los apellidos" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300" required>
                                </div>
                                <div class="mb-2">
                                    <label for="direccion" class="block font-medium">Dirección:</label>
                                    <input type="text" id="direccion" name="direccion" placeholder="Ingresa la dirección" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300" required>
                                </div>
                                <div class="mb-2">
                                    <label for="fecha_nacimiento" class="block font-medium">Fecha de Nacimiento:</label>
                                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300" required>
                                </div>

                                <!-- Agrega un campo de confirmación de contraseña -->
                                <div class="mb-2">
                                    <label for="confirmar_contrasena" class="block font-medium">Confirmar Contraseña:</label>
                                    <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" placeholder="Confirma la contraseña" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300" required>
                                </div>

                                <!-- asignacion de clase -->
                                <div class="mb-2">
                                    <label for="clase_asignada" class="block font-medium">Clase Asignada:</label>
                                    <select id="clase_asignada" name="clase_asignada" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300" required>
                                        <option selected value="">Selecciona materia</option>
                                        <?php
                                        if ($resultmateria->num_rows > 0) {
                                            while ($row = $resultmateria->fetch_assoc()) {
                                        ?>
                                                <option value="<?= $row['id_materia'] ?>"><?= $row['materia'] ?></option>

                                                
                                        <?php
                                            }
                                        }
                                        ?>
                                        <!-- _______________________________________________________________Modal_____________________________________________________ -->

                                    </select>
                                    <div class="flex justify-end gap-2 mt-6">
                                        <button type="button" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500" id="closeModal">Cerrar</button>
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" id="createBtn">Crear</button>
                                    </div>
                            </form>
                        </div>
                    </div>

                    <!-- En a_ingreso_maestro.php -->

                    <div class="modal" id="modal-editar">

                        <form id="form-editar" method="POST" action="procesar_agregar_maestro.php">
                            <!-- Campos del formulario aqui -->
                        </form>

                    </div>

                    <!-- Actualizar -->
                    <div id="updateModal" class="hidden fixed top-0 left-0 w-full h-full flex justify-center items-center bg-opacity-50 bg-black">
                        <div class="bg-white p-8 rounded shadow-lg w-1/2">
                            <h2 class="text-2xl font-semibold mb-4">Actualizar Maestro</h2>

                            <!-- actualizar maestro -->
                            <form action="p_actualizar_al_maestro.php" method="POST">

                                <input type="hidden" id="updateId" name="updateId">
                                <div class="mb-2">
                                    <label for="updateCorreo" class="block font-medium">Correo Electrónico:</label>
                                    <input type="email" id="updateCorreo" name="updateCorreo" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                                </div>
                                <div class="mb-2">
                                    <label for="updateNombre" class="block font-medium">Nombre(s):</label>
                                    <input type="text" id="updateNombre" name="updateNombre" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                                </div>
                                <div class="mb-2">
                                    <label for="updateApellidos" class="block font-medium">Apellidos:</label>
                                    <input type="text" id="updateApellidos" name="updateApellidos" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                                </div>
                                <div class="mb-2">
                                    <label for="updateDireccion" class="block font-medium">Direccion:</label>
                                    <input type="text" id="updateDireccion" name="updateDireccion" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                                </div>
                                <div class="mb-2">
                                    <label for="updatefecha_nacimiento" class="block font-medium">Fecha de
                                        Nacimiento:</label>
                                    <input type="text" id="updatefecha_nacimiento" name="updatefecha_nacimiento" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                                </div>
                                <div class="mb-2">
                                    <label for="updatefecha_nacimiento" class="block font-medium">Clase Asignada</label>
                                    <input type="text" id="updatefecha_nacimiento" name="updatefecha_nacimiento" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                                </div>

                                <!-- actualización -->
                                <div class="flex justify-end gap-2 mt-6">
                                    <button type="button" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500" id="closeUpdateModal">Cerrar</button>
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" id="updateBtn">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- información de maestros  -->
                    <table class=" w-full border-collapse border" id="tablaMaestros">
                        <thead>

                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-r">id</th>

                                <th class="py-2 px-4 border-r">Nombre</th>

                                <th class="py-2 px-4 border-r">Apellido</th>

                                <th class="py-2 px-4 border-r">Email</th>

                                <th class="py-2 px-4 border-r">Dirección</th>

                                <th class="py-2 px-4 border-r">Fec. Nacimiento</th>

                                <th class="py-2 px-4 border-r">Clase Asignada</th>

                                <th class="py-2 px-4 border-r">Editar</th>
                                <th class="py-2 px-4 border-r">Eliminar</th>
                                <!-- //__________________________________________tabla d botones________________________________ -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Iterar y generar 
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {

                                    echo '<tr class="bg-white">';
                                    echo '<td class="py-2 px-4 border-r">' . $row["id_ud"] . '</td>';
                                    echo '<td class="py-2 px-4 border-r">' . $row["nombre"] . '</td>';
                                    echo '<td class="py-2 px-4 border-r">' . $row["apellidos"] . '</td>';
                                    echo '<td class="py-2 px-4 border-r">' . $row["email"] . '</td>';
                                    echo '<td class="py-2 px-4 border-r">' . $row["direccion"] . '</td>';
                                    echo '<td class="py-2 px-4 border-r">' . $row["fecha_nacimiento"] . '</td>';
                                    echo '<td class="py-2 px-4 border-r">' . $row["nombre_materia"] . '</td>';
                                    echo '<td class="py-2 px-4 border-r">';
                                    echo '<button class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded hover:underline" onclick="openUpdateModal(this)">Editar</button>';
                                    echo '</td>';
                                    echo '<td class="py-2 px-4 border-r">';
                                    echo '<button class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded hover:underline" onclick="eliminarMaestro(' . $row["id_ud"] . ')">Eliminar</button>';
                                    echo '</td>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr class="bg-white">';
                                echo '<td class="py-2 px-4 border-r" colspan="7">No se encontraron maestros</td>';
                                echo '</tr>';
                            }

                            // Cerrar 
                            $conn->close();
                            ?>
                            <!-- //__________________________________________tabla d botones________________________________ -->
                        </tbody>
                    </table>
                    </div>
                </div>

                <script>
    // Función para mostrar la tabla de maestros
    function mostrarTabla() {
        document.getElementById('tablaMaestros').style.display = 'block';
    }

    // Función para mostrar el modal de agregar maestro
    function mostrarModalAgregarMaestro() {
        document.getElementById('modal').classList.remove('hidden');
    }

    // Función para ocultar el modal de agregar maestro
    function ocultarModalAgregarMaestro() {
        document.getElementById('modal').classList.add('hidden');
    }




                
              
                    const modal = document.querySelector('#modal');
                    const modalToggle = document.querySelector('#modalToggle');
                    const closeModal = document.querySelector('#closeModal');

                    modalToggle.addEventListener('click', function() {
                        modal.classList.remove('hidden');
                    });

                    closeModal.addEventListener('click', function() {
                        modal.classList.add('hidden');
                    });

                    const updateModal = document.querySelector('#updateModal');
                    const closeUpdateModal = document.aquerySelector('#closeUpdateModal');

                    function openUpdateModal(button) {
                        const row = button.closest('tr');
                        const id = row.cells[0].textContent;
                        const nombre = row.cells[1].textContent;
                        const apellidos = row.cells[2].textContent;
                        const email = row.cells[3].textContent;
                        const direccion = row.cells[4].textContent;
                        const fechaNacimiento = row.cells[5].textContent;

                        document.getElementById('updateNombre').value = nombre;
                        document.getElementById('updateCorreo').value = email;
                        document.getElementById('updateApellidos').value = apellidos;
                        document.getElementById('updateDireccion').value = direccion;
                        document.getElementById('updatefecha_nacimiento').value = fechaNacimiento;
                        document.getElementById('updateId').value = id;

                        updateModal.classList.remove('hidden');
                    }

                    closeUpdateModal.addEventListener('click', function() {
                        updateModal.classList.add('hidden');
                    });

                    function eliminarMaestro(idMaestro) {
                        if (confirm("¿Estás seguro de que deseas eliminar a este maestro?")) {
                            // Realiza una redirección al archivo que manejará la eliminación con el ID del maestro a eliminar.
                            window.location.href = 'eliminar_maestro.php?id_ud=' + idMaestro;
                        }
                    }
                    

                </script>

            </section>
        </div>

    </div>
</body>

</html>
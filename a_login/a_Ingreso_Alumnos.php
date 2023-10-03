<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['id_rol'] != 1) {
    header('Location: login.php');
    // Redirigir si no se cumple la condición
    exit();
}
//  archivo de conexión a la base de datos
include('./conectar.php');
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
                    <a href="a_ingreso_clases.php" class=" flex flex-row justify-center group">
                        <img src="/aa_views/imagenes/clases.png" alt="" height="32px" width="32px">
                        <p class="px-4"> Clases </p>


                    </a>
                </div>
            </div>
        </div>

        <div class="flex flex-col w-[calc(100%-15rem)] px-2">
            <!-- Contenido topnav -->
            <nav class="flex h-10 w-full  flex-row justify-between items-center">


                <div class=" flex flex-row justify-items-stretch">

                    <a href="a_panel_de_control.php" class="relative  flex flex-row items-center group">

                        <img src="/aa_views/imagenes/menu.jpeg" alt="icono menu" width="18px" height="18px px-2">
                        <p class="px-4"> Home </p>


                    </a>
                </div>

                <div class=" flex flex-row justify-between items-center">

                    <button class="relative flex justify-center items-center group">
                        <p class="px-4"> Administrador </p>
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
                                <!-- //SALIR_________________________________________________________________________________ -->
                            </ul>
                        </div>
                        <img src="/aa_views/imagenes/" alt="icono flecha" width="18px" height="18px">
                    </button>
                </div>



            </nav>
            <section class=" h-screen bg-blue-50">
                <div class="flex  w-full flex-row justify- items-center    ">
                    <!-- Contenido Dashboard -->

                    <!-- top nav -->
                    <div class="flex h-10 w-full  flex-row justify-between items-center">
                        <h1 class="text-xl"> Lista de Alumno</h1>
                        <div>
                            <a href="a_panel_de_control.php" class=" text-blue-500">Home</a>/
                            <span>Alumnos</span>
                        </div>
                    </div>
                </div>




                <!-- HTML con el botón de agregar alumno y la tabla -->
                <div class="max-w-4x2 mx-auto p-9 bg-white rounded shadow-lg mt-8">
                    <div class="flex justify-between mb-5">
                        <h2 class="text-2xl font-semibold">Informacion Alumnos</h2>
                        <!-- Botón para abrir el modal de agregar alumno -->
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 cursor-pointer" id="openModal">Agregar Alumno</button>
                    </div>

                    <!-- Modal de agregar alumno -->
                    <div class="modal-overlay hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-50">
                        <div class="modal flex justify-center items-center h-screen">
                            <div class="bg-white p-8 rounded shadow-lg w-1/2">
                                <h2 class="text-2xl font-semibold mb-4">Agregar Alumno</h2>
                                <form action="p_agregando_al_alumno.php" method="POST">
                                    <div class="mb-4">
                                        <label for="dni" class="block font-medium">DNI:</label>
                                        <input type="text" id="dni" name="dni" placeholder="Ingresa la Matricula" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">

                                        <div class="mb-4">
                                            <label for="nombre" class="block font-medium">Nombre(s):</label>
                                            <input type="text" id="nombre" name="nombre" placeholder="Ingresa Nombre(s)" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                                        </div>
                                        <div class="mb-4">
                                            <label for="apellidos" class="block font-medium">Apellido(s):</label>
                                            <input type="text" id="apellidos" name="apellidos" placeholder="Ingresa  Apellido(s)" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                                        </div>
                                        <!-- modal aer alumno___________________________________________________________________                                     -->
                                    </div>

                                    <div class="flex justify-end gap-2 mt-6">
                                        <button type="button" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500" id="closeBtn">Cerrar</button>
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" id="createBtn">Crear</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <table class="w-full border-collapse border mt-4">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-r">#</th>
                                <th class="py-2 px-4 border-r">DNI</th>
                                <th class="py-2 px-4 border-r">Nombre</th>
                                <th class="py-2 px-4 border-r">Apellidos</th>  
                                <th class="py-2 px-4 border-r">Editar</th>
                                <th class="py-2 px-4 border-r">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query  = "SELECT `id_ud`,`dni`,`nombre`,`apellidos` FROM usuarios_datos LEFT Join usuarios_login on id_ul = datos_id WHERE id_rol = 3;";
                            $result = $mysqli->query($query);

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr class='bg-white'>";
                                echo "<td class='py-2 px-4 border-r'>" . $row['id_ud'] . "</td>";
                                echo "<td class='py-2 px-4 border-r'>" . $row['dni'] . "</td>";
                                echo "<td class='py-2 px-4 border-r'>" . $row['nombre'] . "</td>";
                                echo "<td class='py-2 px-4 border-r'>" . $row['apellidos'] . "</td>";
                               
                                echo '<td class="py-2 px-4 border-r">';
                                echo '<button class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded hover:underline" onclick="openUpdateModal(this)">Editar</button>';
                                echo '</td>';
                                echo '<td class="py-2 px-4 border-r">';
                                echo '<button class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded hover:underline" onclick="eliminarAlumno(' . $row['id_ud'] . ')">Eliminar</button>';
                                echo '</td>';
                                echo "</tr>";
                            }


                            $result->free();
                            ?>
                        </tbody>
                    </table>



                    <!-- Modal para actualizar alumno -->
                    <div id="updateModal" class="hidden fixed top-0 left-0 w-full h-full flex justify-center items-center bg-opacity-50 bg-black">
                        <div class="bg-white p-8 rounded shadow-lg w-1/2">
                            <h2 class="text-2xl font-semibold mb-4">Actualizar Alumno</h2>

                            <form action="p_actualizar_al_alumno.php" method="POST">
                                <input type="hidden" id="updateId" name="updateId">
                                <div class="mb-2">
                                    <label for="updateDni" class="block font-medium">DNI:</label>
                                    <input type="int" id="updateDni" name="updateDni" placeholder="Ingresa la Matricula" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                                </div>
                                
                                <div class="mb-2">
                                    <label for="updateNombre" class="block font-medium">Nombre(s):</label>
                                    <input type="text" id="updateNombre" name="updateNombre" placeholder="Ingresa Nombre(s)" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                                </div>
                                <div class="mb-2">
                                    <label for="updateApellidos" class="block font-medium">Apellido(s):</label>
                                    <input type="text" id="updateApellidos" name="updateApellidos" placeholder="Ingresa  Apellido(s)" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                                </div>
                                
                          
                                <div class="flex justify-end gap-2 mt-6">
                                    <button type="button" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500" id="closeUpdateModal">Cerrar</button>
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" id="updateBtn">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>




                    <script>
                        const openModalBtn = document.getElementById('openModal');
                        const modalOverlay = document.querySelector('.modal-overlay');
                        const closeBtn = document.getElementById('closeBtn');

                        openModalBtn.addEventListener('click', function() {
                            modalOverlay.classList.remove('hidden');
                        });

                        closeBtn.addEventListener('click', function() {
                            modalOverlay.classList.add('hidden');
                        });

                        function openUpdateModal(button) {
                            const row = button.closest('tr');
                            const id = row.cells[0].textContent;
                            const dni = row.cells[1].textContent;
                            const nombre = row.cells[2].textContent;
                            const apellidos = row.cells[3].textContent;
                            const email = row.cells[4].textContent;
                            const direccion = row.cells[5].textContent;
                            const fechaNacimiento = row.cells[6].textContent;


                            document.getElementById('updateId').value = id;
                            document.getElementById('updateDni').value = dni;
                            document.getElementById('updateNombre').value = nombre;
                            document.getElementById('updateApellidos').value = apellidos;
                
                            updateModal.classList.remove('hidden');
                        }



                        const updateModal = document.querySelector(
                            '#updateModal'); 
                        const closeUpdateModal1 = document.querySelector('#closeUpdateModal');
                        closeUpdateModal.addEventListener('click', function() {
                            updateModal.classList.add('hidden');
                        });

                        function eliminarAlumno(id) {
                            if (confirm("¿Estás seguro de que deseas eliminar a este alumno?")) {



                                fetch('eliminar_alumno.php?id=' + id, {
                                        method: 'DELETE'
                                    })
                                    .then(response => {
                                        if (response.ok) {

                                            location.reload();
                                        } else {
                                            alert('Error al eliminar el alumno.');
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert('Error al eliminar el alumno.');
                                    });
                            }
                        }
                    </script>
            </section>
        </div>
    </div>
</body>

</html>
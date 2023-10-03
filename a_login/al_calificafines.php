<?php

session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['id_rol'] != 1) {
    header('Location: login.php');
    // Redirigir si no se cumple la condición
    exit();
}
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
                <div class="border-t border-white mb-2 pt-4 text-sm">Alumno <br> <span> Nombre</span></div>
                <div class="border-t border-white pt-4 text-sm ">Menu Alumno</div>
                <div class="mt-6 space-y-2">




                    <div class="  ">
                        <ul class="">
                            <li class=" "> Ver Calificaciones </li>

                            <li class=" "> Administra tus Clases </li>
                        </ul>

                    </div>
                    </button>

                </div>
            </div>
        </div>

        <div class="flex flex-col w-[calc(100%-15rem)] px-2">
            <!-- Contenido topnav -->
            <nav class="flex h-10 w-full  flex-row justify-between items-center">


                <div class=" flex flex-row justify-items-stretch">

                    <a href="al_panel_de_control.php" class="relative  flex flex-row items-center group">

                        <img src="/aa_views/imagenes/menu.jpeg" alt="icono menu" width="18px" height="18px px-2">
                        <p class="px-4"> Home </p>


                    </a>
                </div>

                <div class=" flex flex-row justify-between items-center">

                    <button class="relative flex justify-center items-center group">
                        <p class="px-4"> Alumno</p>
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
                        <img src="/aa_views/imagenes/downarrow_abajo_5820.png" alt="icono flecha" width="16px" height="16px">
                    </button>
                </div>


            </nav>
            <section class=" h-screen bg-blue-50">
                <div class="flex  w-full flex-row justify- items-center    ">
                    <!-- Contenido Dashboard -->

                    <!-- top nav -->
                    <div class="flex h-10 w-full  flex-row justify-between items-center">
                        <h1 class="text-xl"> Esquema de Clases </h1>
                        <div>
                            <a href="al_panel_de_control.php" class=" text-blue-500">Home</a>/
                            <span>Alumnos</span>
                        </div>
                    </div>
                </div>
                <div class="flex p-4 gap-2 flex-row justify-between">
                    <div class="w-1/2 ">
                        <h2 class="text-lg font-bold mb-2">Tus Materias Inscritas</h2>
                        <div class="shadow-md rounded-lg overflow-hidden">
                            <table class="w-full table-auto">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="py-2 px-3 text-center">#</th>
                                        <th class="py-2 px-3 text-center">Materia</th>
                                        <th class="py-2 px-3 text-center">Darse de Baja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white">
                                        <td class="py-2 px-3 text-center">1</td>
                                        <td class="py-2 px-3 text-center">Materia 1</td>
                                        <td class="py-2 px-3 text-center"><a href="#" class="text-blue-500">Darse de
                                                Baja</a></td>
                                    </tr>
                                    <tr class="bg-gray-50">
                                        <td class="py-2 px-3 text-center">2</td>
                                        <td class="py-2 px-3 text-center">Materia 2</td>
                                        <td class="py-2 px-3 text-center"><a href="#" class="text-blue-500">Darse de
                                                Baja</a></td>
                                    </tr>
                                    <tr class="bg-white">
                                        <td class="py-2 px-3 text-center">3</td>
                                        <td class="py-2 px-3 text-center">Materia 3</td>
                                        <td class="py-2 px-3 text-center"><a href="#" class="text-blue-500">Darse de
                                                Baja</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="w-1/4 pl-4">
                        <h2 class="text-lg font-bold mb-2">Materias para inscribir</h2>
                        <div class="shadow-md rounded-lg p-4 ">
                            <label class="block font-semibold mb-2">Selecciona la(s) Clase(s) usa la tecla ctrl:</label>
                            <select multiple class="w-full border rounded-lg p-2 mb-4">
                                <option>Materia A</option>
                                <option>Materia B</option>
                                <option>Materia C</option>
                                <option>Materia D</option>
                                <!-- Agrega más opciones de materias aquí -->
                            </select>
                            <button class="bg-blue-500 text-white px-3 py-1 rounded-lg ">Inscribir</button>
                        </div>
                    </div>
                </div>


            </section>
        </div>
    </div>
</body>

</html>
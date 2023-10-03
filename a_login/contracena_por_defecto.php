<?php


function crear_usuario($email, $dato_id)
{
    include('./conectar.php');

    try {

        $hash = password_hash('funval', PASSWORD_DEFAULT);



        $querycontra = "INSERT INTO `usuarios_datos`(`id_ul`, `email`, `password`, `datos_id`) VALUES (0,'$email','$hash',$dato_id)";

        $mysqli->query($querycontra);

        header('location: a_ingreso_maestro.php');

        exit();
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
}
<?php
if (!function_exists('Conecta')) {

function Conecta()
{
    $server = "localhost";
    $user = "root";
    $password = "";
    $dataBase = "tiendabowser"; 

   
    $conexion = mysqli_connect($server, $user, $password, $dataBase);

   
    if (!$conexion) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    
    mysqli_set_charset($conexion, "utf8mb4");

    return $conexion;
}

function Desconecta($conexion)
{
    
    mysqli_close($conexion);
}

}
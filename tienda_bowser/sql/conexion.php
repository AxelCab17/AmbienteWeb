<?php
if (!function_exists('Conecta')) {
    function Conecta()
    {
        $server = "localhost";
        $user = "root";
        $password = "";
        $dataBase = "tiendabowser"; 

        $conn = mysqli_connect($server, $user, $password, $dataBase);

        if (!$conn) {
            die("Error al conectar a la base de datos: " . mysqli_connect_error());
        }

        mysqli_set_charset($conn, "utf8mb4");

        return $conn;
    }

    function Desconecta($conn)
    {
        mysqli_close($conn);
    }
}
?>
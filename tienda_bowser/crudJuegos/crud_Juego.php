<?php
include 'sql/conexion.php';

// Verifica si la conexión está establecida, y si no, intenta conectar.
if (!isset($conexion)) {
    $conexion = Conecta();
}

// Agregar Juego
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["agregar"])) {
    $nombre = $_POST["nombre"];
    $consola = $_POST["consola"];
    $precio = $_POST["precio"];
    $existencias = $_POST["existencias"];
    $ruta_imagen = $_POST["ruta_imagen"];

    $agregarJuegoResult = agregarJuego($conexion, $nombre, $consola, $precio, $existencias, $ruta_imagen);

    if ($agregarJuegoResult) {
        echo '<script>alert("Juego agregado exitosamente.");</script>';
    } else {
        echo '<script>alert("Error al agregar el juego. Inténtalo de nuevo.");</script>';
    }
}

// Editar Juego
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editar"])) {
    $id_juego = $_POST["id_juego"];
    $nombre = $_POST["nombre"];
    $consola = $_POST["consola"];
    $precio = $_POST["precio"];
    $existencias = $_POST["existencias"];
    $ruta_imagen = $_POST["ruta_imagen"];

    $editarJuegoResult = editarJuego($conexion, $id_juego, $nombre, $consola, $precio, $existencias, $ruta_imagen);

    if ($editarJuegoResult) {
        echo '<script>alert("Juego editado exitosamente.");</script>';
    } else {
        echo '<script>alert("Error al editar el juego. Inténtalo de nuevo.");</script>';
    }
}

// Eliminar Juego
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar"])) {
    $id_juego = $_POST["id_juego"];

    $eliminarJuegoResult = eliminarJuego($conexion, $id_juego);

    if ($eliminarJuegoResult) {
        echo '<script>alert("Juego eliminado exitosamente.");</script>';
    } else {
        echo '<script>alert("Error al eliminar el juego. Inténtalo de nuevo.");</script>';
    }
}

// Función para obtener la lista de juegos
function obtenerJuegos($conexion) {
    $query = "SELECT * FROM juego";
    $result = mysqli_query($conexion, $query);
    return $result;
}

// Función para obtener la información de un juego por su ID
function obtenerJuegoPorId($conexion, $id_juego) {
    $query = "SELECT * FROM juego WHERE id_juego = $id_juego";
    $result = mysqli_query($conexion, $query);
    return $result;
}

// Función para agregar un juego
function agregarJuego($conexion, $nombre, $consola, $precio, $existencias, $ruta_imagen) {
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $consola = mysqli_real_escape_string($conexion, $consola);
    $ruta_imagen = mysqli_real_escape_string($conexion, $ruta_imagen);

    $query = "INSERT INTO juego (nombre, consola, precio, existencias, ruta_imagen, activo) 
              VALUES ('$nombre', '$consola', '$precio', '$existencias', '$ruta_imagen', true)";

    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

// Función para editar un juego
function editarJuego($conexion, $id_juego, $nombre, $consola, $precio, $existencias, $ruta_imagen) {
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $consola = mysqli_real_escape_string($conexion, $consola);
    $ruta_imagen = mysqli_real_escape_string($conexion, $ruta_imagen);

    $query = "UPDATE juego 
              SET nombre='$nombre', consola='$consola', precio='$precio', existencias='$existencias', ruta_imagen='$ruta_imagen'
              WHERE id_juego='$id_juego'";

    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

// Función para eliminar un juego
function eliminarJuego($conexion, $id_juego) {
    $query = "DELETE FROM juego WHERE id_juego='$id_juego'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}
?>
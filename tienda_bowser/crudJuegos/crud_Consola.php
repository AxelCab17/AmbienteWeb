<?php
include 'sql/conexion.php';

// Verifica si la conexión está establecida, y si no, intenta conectar.
if (!isset($conexion)) {
    $conexion = Conecta();
}

// Agregar Consola
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["agregar"])) {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $existencias = $_POST["existencias"];
    $ruta_imagen = $_POST["ruta_imagen"];

    $agregarConsolaResult = agregarConsola($conexion, $nombre, $precio, $existencias, $ruta_imagen);

    if ($agregarConsolaResult) {
        echo '<script>alert("Consola agregada exitosamente.");</script>';
    } else {
        echo '<script>alert("Error al agregar la consola. Inténtalo de nuevo.");</script>';
    }
}

// Editar Consola
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editar"])) {
    $id_consola = $_POST["id_consola"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $existencias = $_POST["existencias"];
    $ruta_imagen = $_POST["ruta_imagen"];

    $editarConsolaResult = editarConsola($conexion, $id_consola, $nombre, $precio, $existencias, $ruta_imagen);

    if ($editarConsolaResult) {
        echo '<script>alert("Consola editada exitosamente.");</script>';
    } else {
        echo '<script>alert("Error al editar la consola. Inténtalo de nuevo.");</script>';
    }
}

// Eliminar Consola
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar"])) {
    $id_consola = $_POST["id_consola"];

    $eliminarConsolaResult = eliminarConsola($conexion, $id_consola);

    if ($eliminarConsolaResult) {
        echo '<script>alert("Consola eliminada exitosamente.");</script>';
    } else {
        echo '<script>alert("Error al eliminar la consola. Inténtalo de nuevo.");</script>';
    }
}

// Función para obtener la lista de consolas
function obtenerConsolas($conexion) {
    $query = "SELECT * FROM consola";
    $result = mysqli_query($conexion, $query);
    return $result;
    
}

// Función para obtener la información de una consola por su ID
function obtenerConsolaPorId($conexion, $id_consola) {
    $query = "SELECT * FROM consola WHERE id_consola = $id_consola";
    $result = mysqli_query($conexion, $query);
    return $result;
}

// Función para agregar una consola
function agregarConsola($conexion, $nombre, $precio, $existencias, $ruta_imagen) {
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $ruta_imagen = mysqli_real_escape_string($conexion, $ruta_imagen);

    $query = "INSERT INTO consola (nombre, precio, existencias, ruta_imagen, activo) 
              VALUES ('$nombre', '$precio', '$existencias', '$ruta_imagen', true)";

    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

// Función para editar una consola
function editarConsola($conexion, $id_consola, $nombre, $precio, $existencias, $ruta_imagen) {
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $ruta_imagen = mysqli_real_escape_string($conexion, $ruta_imagen);

    $query = "UPDATE consola 
              SET nombre='$nombre', precio='$precio', existencias='$existencias', ruta_imagen='$ruta_imagen'
              WHERE id_consola='$id_consola'";

    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

// Función para eliminar una consola
function eliminarConsola($conexion, $id_consola) {
    $query = "DELETE FROM consola WHERE id_consola='$id_consola'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

?>
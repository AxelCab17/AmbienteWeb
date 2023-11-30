<?php
include 'sql/conexion.php';

// Verifica si la conexión está establecida, y si no, intenta conectar.
if (!isset($conexion)) {
    $conexion = Conecta();
}

// Agregar Accesorio
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["agregar"])) {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $existencias = $_POST["existencias"];
    $ruta_imagen = $_POST["ruta_imagen"];

    $agregarAccesorioResult = agregarAccesorio($conexion, $nombre, $precio, $existencias, $ruta_imagen);

    if ($agregarAccesorioResult) {
        echo '<script>alert("Accesorio agregado exitosamente.");</script>';
    } else {
        echo '<script>alert("Error al agregar el accesorio. Detalles: ' . mysqli_error($conexion) . '");</script>';
    }
}

// Editar Accesorio
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editar"])) {
    $id_accesorio = $_POST["id_accesorio"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $existencias = $_POST["existencias"];
    $ruta_imagen = $_POST["ruta_imagen"];

    $editarAccesorioResult = editarAccesorio($conexion, $id_accesorio, $nombre, $precio, $existencias, $ruta_imagen);

    if ($editarAccesorioResult) {
        echo '<script>alert("Accesorio editado exitosamente.");</script>';
    } else {
        echo '<script>alert("Error al editar el accesorio. Inténtalo de nuevo.");</script>';
    }
}

// Eliminar Accesorio
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar"])) {
    $id_accesorio = $_POST["id_accesorio"];

    $eliminarAccesorioResult = eliminarAccesorio($conexion, $id_accesorio);

    if ($eliminarAccesorioResult) {
        echo '<script>alert("Accesorio eliminado exitosamente.");</script>';
    } else {
        echo '<script>alert("Error al eliminar el accesorio. Inténtalo de nuevo.");</script>';
    }
}

// Función para obtener la lista de accesorios
function obtenerAccesorios($conexion) {
    $query = "SELECT * FROM accesorio";
    $result = mysqli_query($conexion, $query);
    return $result;
}

// Función para obtener la información de un accesorio por su ID
function obtenerAccesorioPorId($conexion, $id_accesorio) {
    $query = "SELECT * FROM accesorio WHERE id_accesorio = $id_accesorio";
    $result = mysqli_query($conexion, $query);
    return $result;
}

// Función para agregar un accesorio
function agregarAccesorio($conexion, $nombre, $precio, $existencias, $ruta_imagen) {
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $ruta_imagen = mysqli_real_escape_string($conexion, $ruta_imagen);

    $query = "INSERT INTO accesorio (nombre, precio, existencias, ruta_imagen, activo) 
              VALUES ('$nombre', '$precio', '$existencias', '$ruta_imagen', true)";

    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

// Función para editar un accesorio
function editarAccesorio($conexion, $id_accesorio, $nombre, $precio, $existencias, $ruta_imagen) {
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $ruta_imagen = mysqli_real_escape_string($conexion, $ruta_imagen);

    $query = "UPDATE accesorio 
              SET nombre='$nombre', precio='$precio', existencias='$existencias', ruta_imagen='$ruta_imagen'
              WHERE id_accesorio='$id_accesorio'";

    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

// Función para eliminar un accesorio
function eliminarAccesorio($conexion, $id_accesorio) {
    $query = "DELETE FROM accesorio WHERE id_accesorio='$id_accesorio'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}
?>
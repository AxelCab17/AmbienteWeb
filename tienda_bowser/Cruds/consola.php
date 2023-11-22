<?php
include '../sql/conexion.php';

function agregarConsola($nombre, $id_categoria, $precio, $existencias, $ruta_imagen, $activo) {
    $conexion = Conecta();
    $query = "INSERT INTO consola (nombre, id_categoria, precio, existencias, ruta_imagen, activo) VALUES ('$nombre', $id_categoria, $precio, $existencias, '$ruta_imagen', $activo)";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}

function obtenerConsolas() {
    $conexion = Conecta();
    $query = "SELECT * FROM consola";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}

function obtenerConsolaPorId($id_consola) {
    $conexion = Conecta();
    $query = "SELECT * FROM consola WHERE id_consola = $id_consola";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}

function actualizarConsola($id_consola, $nombre, $id_categoria, $precio, $existencias, $ruta_imagen, $activo) {
    $conexion = Conecta();
    $query = "UPDATE consola SET nombre = '$nombre', id_categoria = $id_categoria, precio = $precio, existencias = $existencias, ruta_imagen = '$ruta_imagen', activo = $activo WHERE id_consola = $id_consola";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}

function eliminarConsola($id_consola) {
    $conexion = Conecta();
    $query = "DELETE FROM consola WHERE id_consola = $id_consola";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}
?>

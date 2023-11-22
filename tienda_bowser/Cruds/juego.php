<?php
include 'conexion.php';

function agregarJuego($id_categoria, $nombre, $consola, $precio, $existencias, $ruta_imagen, $activo) {
    $conexion = Conecta();
    $query = "INSERT INTO juego (id_categoria, nombre, consola, precio, existencias, ruta_imagen, activo) VALUES ($id_categoria, '$nombre', '$consola', $precio, $existencias, '$ruta_imagen', $activo)";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}

function obtenerJuegos() {
    $conexion = Conecta();
    $query = "SELECT * FROM juego";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}

function actualizarJuego($id_juego, $id_categoria, $nombre, $consola, $precio, $existencias, $ruta_imagen, $activo) {
    $conexion = Conecta();
    $query = "UPDATE juego SET id_categoria = $id_categoria, nombre = '$nombre', consola = '$consola', precio = $precio, existencias = $existencias, ruta_imagen = '$ruta_imagen', activo = $activo WHERE id_juego = $id_juego";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}

function eliminarJuego($id_juego) {
    $conexion = Conecta();
    $query = "DELETE FROM juego WHERE id_juego = $id_juego";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}

?>

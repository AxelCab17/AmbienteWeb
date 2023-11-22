<?php
include '../sql/conexion.php';

function agregarAccesorio($id_categoria, $nombre, $precio, $existencias, $ruta_imagen, $activo) {
    $conexion = Conecta();
    $query = "INSERT INTO accesorio (id_categoria, nombre, precio, existencias, ruta_imagen, activo) VALUES ($id_categoria, '$nombre', $precio, $existencias, '$ruta_imagen', $activo)";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}

function obtenerAccesorios() {
    $conexion = Conecta();
    $query = "SELECT * FROM accesorio";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}

function obtenerAccesorioPorId($id_accesorio) {
    $conexion = Conecta();
    $query = "SELECT * FROM accesorio WHERE id_accesorio = $id_accesorio";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}

function actualizarAccesorio($id_accesorio, $id_categoria, $nombre, $precio, $existencias, $ruta_imagen, $activo) {
    $conexion = Conecta();
    $query = "UPDATE accesorio SET id_categoria = $id_categoria, nombre = '$nombre', precio = $precio, existencias = $existencias, ruta_imagen = '$ruta_imagen', activo = $activo WHERE id_accesorio = $id_accesorio";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}

function eliminarAccesorio($id_accesorio) {
    $conexion = Conecta();
    $query = "DELETE FROM accesorio WHERE id_accesorio = $id_accesorio";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}
?>

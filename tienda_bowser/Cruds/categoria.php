<?php
include '../sql/conexion.php';
function agregarCategoria($descripcion, $ruta_imagen, $activo) {
    $conexion = Conecta();
    $query = "INSERT INTO categoria (descripcion, ruta_imagen, activo) VALUES ('$descripcion', '$ruta_imagen', $activo)";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}

function obtenerCategorias() {
    $conexion = Conecta();
    $query = "SELECT * FROM categoria";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}

function actualizarCategoria($id_categoria, $descripcion, $ruta_imagen, $activo) {
    $conexion = Conecta();
    $query = "UPDATE categoria SET descripcion = '$descripcion', ruta_imagen = '$ruta_imagen', activo = $activo WHERE id_categoria = $id_categoria";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}

function eliminarCategoria($id_categoria) {
    $conexion = Conecta();
    $query = "DELETE FROM categoria WHERE id_categoria = $id_categoria";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}
?>

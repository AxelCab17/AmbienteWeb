<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $ruta_imagen = $_POST["ruta_imagen"];

    // Insertar usuario en la base de datos
    $registroExitoso = registrarUsuario($username, $password, $nombre, $apellidos, $correo, $telefono, $ruta_imagen);

    if ($registroExitoso) {
        echo "¡Registro exitoso!";
    } else {
        echo "Error al registrar usuario. Inténtalo de nuevo.";
    }
}

function registrarUsuario($username, $password, $nombre, $apellidos, $correo, $telefono, $ruta_imagen) {
    $conexion = Conecta();
    $username = mysqli_real_escape_string($conexion, $username);
    $query = "INSERT INTO usuario (username, password, nombre, apellidos, correo, telefono, ruta_imagen, activo) VALUES ('$username', '$password', '$nombre', '$apellidos', '$correo', '$telefono', '$ruta_imagen', 1)";
    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}
?>

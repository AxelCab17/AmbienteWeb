<?php
include '../sql/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $ruta_imagen = $_POST["ruta_imagen"];

    // Llamar a la función de registro
    $registroResult = registrarUsuario($username, $password, $nombre, $apellidos, $correo, $telefono, $ruta_imagen);

    if ($registroResult) {
        // Registro exitoso
        // Redirigir a la página de inicio de sesión u otra página
        echo "Registro exitoso. Ahora puedes iniciar sesión.";
    } else {
        // Error en el registro
        echo "Error en el registro. Inténtalo de nuevo.";
    }
}

function registrarUsuario($username, $password, $nombre, $apellidos, $correo, $telefono, $ruta_imagen) {
    $conexion = Conecta();
    $username = mysqli_real_escape_string($conexion, $username);
    $password = mysqli_real_escape_string($conexion, $password);
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $apellidos = mysqli_real_escape_string($conexion, $apellidos);
    $correo = mysqli_real_escape_string($conexion, $correo);
    $telefono = mysqli_real_escape_string($conexion, $telefono);
    $ruta_imagen = mysqli_real_escape_string($conexion, $ruta_imagen);

    $query = "INSERT INTO usuario (username, password, nombre, apellidos, correo, telefono, ruta_imagen, activo) 
              VALUES ('$username', '$password', '$nombre', '$apellidos', '$correo', '$telefono', '$ruta_imagen', true)";

    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}
?>

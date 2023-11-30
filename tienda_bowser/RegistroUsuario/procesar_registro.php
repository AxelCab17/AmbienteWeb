<?php
include 'sql/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];

    // Llamar a la función de registro
    $registroResult = registrarUsuario($username, $password, $nombre, $apellidos, $correo, $telefono);

    if ($registroResult) {
        // Registro exitoso
        // Agregar script de JavaScript para redirigir al inicio de sesión
        echo '<script>';
        echo 'alert("Registro exitoso. Ahora puedes iniciar sesión.");';
        echo 'window.location.href = "login.php";'; // Cambia "/ruta/a/tu/iniciar_sesion.php" por la ruta correcta
        echo '</script>';
    } else {
        // Error en el registro
        echo "Error en el registro. Inténtalo de nuevo.";
    }
}

function registrarUsuario($username, $password, $nombre, $apellidos, $correo, $telefono) {
    $conexion = Conecta();
    $username = mysqli_real_escape_string($conexion, $username);
    $password = mysqli_real_escape_string($conexion, $password);
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $apellidos = mysqli_real_escape_string($conexion, $apellidos);
    $correo = mysqli_real_escape_string($conexion, $correo);
    $telefono = mysqli_real_escape_string($conexion, $telefono);

    $query = "INSERT INTO usuario (username, password, nombre, apellidos, correo, telefono,activo) 
              VALUES ('$username', '$password', '$nombre', '$apellidos', '$correo', '$telefono', true)";

    $resultado = mysqli_query($conexion, $query);
    Desconecta($conexion);
    return $resultado;
}
?>

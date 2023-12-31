<?php
include 'sql/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Llamar a la función de inicio de sesión
    $loginResult = login($username, $password);

    if ($loginResult) {
        // Inicio de sesión exitoso
        // Redirigir a la página de inicio o realizar acciones según el rol
        echo "Inicio de sesión exitoso." . implode(', ', $loginResult['roles']);

        // Establecer la variable de sesión
        session_start();
        $_SESSION['usuario_autenticado'] = true;

            // Agregar script de JavaScript para redirigir y mostrar mensaje
            echo '<script>';
            echo 'alert("Inicio de sesión exitoso. Serás redirigido al menú principal.");';
            echo 'window.location.href = "index.php";'; // Cambia "/ruta/a/tu/menu_principal.php" por la ruta correcta
            echo '</script>';
        } else {
            // Usuario o contraseña incorrectos
            echo "Usuario o contraseña incorrectos. Inténtalo de nuevo.";
        }
    }
function login($username, $password)
{
    $conexion = Conecta();
    $username = mysqli_real_escape_string($conexion, $username);
    $query = "SELECT * FROM usuario WHERE username = '$username'";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);

        if (password_verify($password, $usuario['password'])) {
            // Contraseña correcta
            $roles = obtenerRolesUsuario($usuario['id_usuario']);
            Desconecta($conexion);
            return array('usuario' => $usuario, 'roles' => $roles);
        }
    }

    Desconecta($conexion);
    return null;
}

function obtenerRolesUsuario($id_usuario)
{
    $conexion = Conecta();
    $query = "SELECT nombre FROM rol WHERE id_usuario = $id_usuario";
    $resultado = mysqli_query($conexion, $query);
    $roles = array();

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $roles[] = $fila['nombre'];
    }

    Desconecta($conexion);
    return $roles;
}

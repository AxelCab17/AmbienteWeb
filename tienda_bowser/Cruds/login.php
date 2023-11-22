<?php
include 'conexion.php';

function login($username, $password) {
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

function obtenerRolesUsuario($id_usuario) {
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

// Uso de las funciones
// $loginResult = login('usuario', 'contrasena');
// if ($loginResult) {
//     $usuario = $loginResult['usuario'];
//     $roles = $loginResult['roles'];
//     // Realizar acciones según el login y roles
// } else {
//     // Usuario o contraseña incorrectos
// }
?>

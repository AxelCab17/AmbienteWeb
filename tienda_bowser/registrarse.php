<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "RegistroUsuario/procesar_registro.php";
}
?>

<!DOCTYPE html>
<html lang="es">
<head th:fragment="head">
    <title>Tienda Bowser</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>
    <h2>Registrarse</h2>
    <form action="" method="post">
        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required>

        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo">

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono">

        <label for="ruta_imagen">URL Imagen:</label>
        <input type="text" id="ruta_imagen" name="ruta_imagen">

        <button type="submit">Registrarse</button>
    </form>
</body>
</html>

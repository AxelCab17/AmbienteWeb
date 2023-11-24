<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "crudJuegos/crud_Juego.php";
}
?>

<!DOCTYPE html>
<html lang="es">
<head th:fragment="head">
    <title>Tienda Bowser - Juegos</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Juegos</h2>

    <!-- Agregar Juego Formulario -->
    <form action="" method="post">
        <h3>Agregar Juego</h3>
        <label for="nombre">Nombre del Juego:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="consola">Consola:</label>
        <input type="text" id="consola" name="consola" required>

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" required>

        <label for="existencias">Existencias:</label>
        <input type="number" id="existencias" name="existencias" required>

        <label for="ruta_imagen">URL Imagen:</label>
        <input type="text" id="ruta_imagen" name="ruta_imagen">

        <button type="submit" name="agregar">Agregar Juego</button>
    </form>

    <!-- Lista de Juegos -->
    <h3>Lista de Juegos</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Consola</th>
            <th>Precio</th>
            <th>Existencias</th>
            <th>Acciones</th>
        </tr>

        <?php
        $juegos = obtenerJuegos($conexion);

        while ($row = mysqli_fetch_assoc($juegos)) {
            echo "<tr>";
            echo "<td>" . $row['id_juego'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['consola'] . "</td>";
            echo "<td>" . $row['precio'] . "</td>";
            echo "<td>" . $row['existencias'] . "</td>";
            echo "<td>
                    <form action='' method='post'>
                        <input type='hidden' name='id_juego' value='" . $row['id_juego'] . "'>
                        <button type='submit' name='ver'>Ver</button>
                        <button type='submit' name='editar'>Editar</button>
                        <button type='submit' name='eliminar'>Eliminar</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <!-- Ver, Editar, Eliminar Juego Formulario -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST["ver"]) || isset($_POST["editar"]))) {
        $id_juego = $_POST["id_juego"];
        $juego = obtenerJuegoPorId($conexion, $id_juego);
        $row = mysqli_fetch_assoc($juego);

        echo "<form action='' method='post'>
                <h3>Detalles del Juego</h3>
                <label for='nombre'>Nombre del Juego:</label>
                <input type='text' id='nombre' name='nombre' value='" . $row['nombre'] . "' required>
        
                <label for='consola'>Consola:</label>
                <input type='text' id='consola' name='consola' value='" . $row['consola'] . "' required>
        
                <label for='precio'>Precio:</label>
                <input type='number' step='0.01' id='precio' name='precio' value='" . $row['precio'] . "' required>
        
                <label for='existencias'>Existencias:</label>
                <input type='number' id='existencias' name='existencias' value='" . $row['existencias'] . "' required>
        
                <label for='ruta_imagen'>URL Imagen:</label>
                <input type='text' id='ruta_imagen' name='ruta_imagen' value='" . $row['ruta_imagen'] . "'>
        
                <button type='submit' name='editar'>Guardar Cambios</button>
              </form>";
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ver"])) {
        $id_juego = $_POST["id_juego"];
        $juego = obtenerJuegoPorId($conexion, $id_juego);
        $row = mysqli_fetch_assoc($juego);

        echo "<h3>Detalles del Juego</h3>";
        echo "<p><strong>ID:</strong> " . $row['id_juego'] . "</p>";
        echo "<p><strong>Nombre:</strong> " . $row['nombre'] . "</p>";
        echo "<p><strong>Consola:</strong> " . $row['consola'] . "</p>";
        echo "<p><strong>Precio:</strong> $" . $row['precio'] . "</p>";
        echo "<p><strong>Existencias:</strong> " . $row['existencias'] . "</p>";
        echo "<p><strong>Ruta de Imagen:</strong> " . $row['ruta_imagen'] . "</p>";
        echo "<button type='button' onclick='history.go(-1);'>Volver</button>";
    }
    ?>

</body>
</html>
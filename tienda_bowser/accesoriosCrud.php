<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "crudJuegos/crud_Accesorio.php";
}
?>

<!DOCTYPE html>
<html lang="es">
<head th:fragment="head">
    <title>Tienda Bowser - Accesorios</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Accesorios</h2>

    <!-- Agregar Accesorio Formulario -->
    <form action="" method="post">
        <h3>Agregar Accesorio</h3>
        <label for="nombre">Nombre del Accesorio:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" required>

        <label for="existencias">Existencias:</label>
        <input type="number" id="existencias" name="existencias" required>

        <label for="ruta_imagen">URL Imagen:</label>
        <input type="text" id="ruta_imagen" name="ruta_imagen">

        <button class="botonCrud" type="submit" name="agregar">Agregar Accesorio</button>
    </form>

    <!-- Lista de Accesorios -->
    <h3>Lista de Accesorios</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Existencias</th>
            <th>Acciones</th>
        </tr>

        <?php
        $accesorios = obtenerAccesorios($conexion);

        while ($row = mysqli_fetch_assoc($accesorios)) {
            echo "<tr>";
            echo "<td>" . $row['id_accesorio'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['precio'] . "</td>";
            echo "<td>" . $row['existencias'] . "</td>";
            echo "<td>
                    <form action='' method='post'>
                        <input type='hidden' name='id_accesorio' value='" . $row['id_accesorio'] . "'>
                        <button type='submit' name='ver'>Ver</button>
                        <button type='submit' name='editar'>Editar</button>
                        <button type='submit' name='eliminar'>Eliminar</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <!-- Ver, Editar, Eliminar Accesorio Formulario -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST["ver"]) || isset($_POST["editar"]))) {
        $id_accesorio = $_POST["id_accesorio"];
        $accesorio = obtenerAccesorioPorId($conexion, $id_accesorio);
        $row = mysqli_fetch_assoc($accesorio);

        echo "<form action='' method='post'>
                <h3>Detalles del Accesorio</h3>
                <label for='nombre'>Nombre del Accesorio:</label>
                <input type='text' id='nombre' name='nombre' value='" . $row['nombre'] . "' required>
        
                <label for='precio'>Precio:</label>
                <input type='number' step='0.01' id='precio' name='precio' value='" . $row['precio'] . "' required>
        
                <label for='existencias'>Existencias:</label>
                <input type='number' id='existencias' name='existencias' value='" . $row['existencias'] . "' required>
        
                <label for='ruta_imagen'>URL Imagen:</label>
                <input type='text' id='ruta_imagen' name='ruta_imagen' value='" . $row['ruta_imagen'] . "'>
        
                <button type='submit' name='editar'>Guardar Cambios</button>
              </form>";
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ver"])) {
        $id_accesorio = $_POST["id_accesorio"];
        $accesorio = obtenerAccesorioPorId($conexion, $id_accesorio);
        $row = mysqli_fetch_assoc($accesorio);

        echo "<h3>Detalles del Accesorio</h3>";
        echo "<p><strong>ID:</strong> " . $row['id_accesorio'] . "</p>";
        echo "<p><strong>Nombre:</strong> " . $row['nombre'] . "</p>";
        echo "<p><strong>Precio:</strong> $" . $row['precio'] . "</p>";
        echo "<p><strong>Existencias:</strong> " . $row['existencias'] . "</p>";
        echo "<p><strong>Ruta de Imagen:</strong> " . $row['ruta_imagen'] . "</p>";
        echo "<button type='button' onclick='history.go(-1);'>Volver</button>";
    }
    ?>

</body>
</html>
<?php
include("funciones.php");
$menu = getMenu();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "crudJuegos/crud_Consola.php";
}
?>



<!DOCTYPE html>
<html lang="es">
<head th:fragment="head">
    <title>Tienda Bowser - Consolas</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header th:fragment="header" class="header">
        <nav>
            <div class="logo">
                <img src="https://cdn.discordapp.com/attachments/1165381757655318588/1165405392671612969/3bW7WPi.png?ex=6546bb59&is=65344659&hm=ac23a5d55495c86e72cfb26cde8d26778547d6d94563612029d304492f5109c9&" class="logo"
                    alt="Tienda Bowser">
                </div>
                <ul class="menu">
                    <?php foreach ($menu as $item) { ?>
                        <li><a href="<?php echo $item["url"] ?>"><?php echo $item["name"] ?></a></li>
                    <?php } ?>
                </ul>
        </nav>
    <h2>Consolas</h2>

    <!-- Agregar Consola Formulario -->
    <form action="" method="post">
        <h3>Agregar Consola</h3>
        <label for="nombre">Nombre de la Consola:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="id_categoria">Categoría:</label>
        <select id="id_categoria" name="id_categoria" required>
            <!-- Puedes llenar este select con opciones de categorías existentes si lo deseas -->
        </select>

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" required>

        <label for="existencias">Existencias:</label>
        <input type="number" id="existencias" name="existencias" required>

        <label for="ruta_imagen">URL Imagen:</label>
        <input type="text" id="ruta_imagen" name="ruta_imagen">

        <button class="botonCrud" type="submit" name="agregar">Agregar Consola</button>
    </form>

    <!-- Lista de Consolas -->
    <h3>Lista de Consolas</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Existencias</th>
            <th>Acciones</th>
        </tr>

        <?php
        $consolas = obtenerConsolas($conexion);

        while ($row = mysqli_fetch_assoc($consolas)) {
            echo "<tr>";
            echo "<td>" . $row['id_consola'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['id_categoria'] . "</td>";
            echo "<td>" . $row['precio'] . "</td>";
            echo "<td>" . $row['existencias'] . "</td>";
            echo "<td>
                    <form action='' method='post'>
                        <input type='hidden' name='id_consola' value='" . $row['id_consola'] . "'>
                        <button type='submit' name='ver'>Ver</button>
                        <button type='submit' name='editar'>Editar</button>
                        <button type='submit' name='eliminar'>Eliminar</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <!-- Ver, Editar, Eliminar Consola Formulario -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST["ver"]) || isset($_POST["editar"]))) {
        $id_consola = $_POST["id_consola"];
        $consola = obtenerConsolaPorId($conexion, $id_consola);
        $row = mysqli_fetch_assoc($consola);

        echo "<form action='' method='post'>
                <h3>Detalles de la Consola</h3>
                <label for='nombre'>Nombre de la Consola:</label>
                <input type='text' id='nombre' name='nombre' value='" . $row['nombre'] . "' required>

                <label for='id_categoria'>Categoría:</label>
                <select id='id_categoria' name='id_categoria' required>
                    <!-- Puedes llenar este select con opciones de categorías existentes si lo deseas -->
                </select>

                <label for='precio'>Precio:</label>
                <input type='number' step='0.01' id='precio' name='precio' value='" . $row['precio'] . "' required>

                <label for='existencias'>Existencias:</label>
                <input type='number' id='existencias' name='existencias' value='" . $row['existencias'] . "' required>

                <label for='ruta_imagen'>URL Imagen:</label>
                <input type='text' id='ruta_imagen' name='ruta_imagen' value='" . $row['ruta_imagen'] . "'>

                <button type='submit' name='editar'>Guardar Cambios</button>
              </form>";
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ver"])) {
        $id_consola = $_POST["id_consola"];
        $consola = obtenerConsolaPorId($conexion, $id_consola);
        $row = mysqli_fetch_assoc($consola);

        echo "<h3>Detalles de la Consola</h3>";
        echo "<p><strong>ID:</strong> " . $row['id_consola'] . "</p>";
        echo "<p><strong>Nombre:</strong> " . $row['nombre'] . "</p>";
        echo "<p><strong>Categoría:</strong> " . $row['id_categoria'] . "</p>";
        echo "<p><strong>Precio:</strong> $" . $row['precio'] . "</p>";
        echo "<p><strong>Existencias:</strong> " . $row['existencias'] . "</p>";
        echo "<p><strong>Ruta de Imagen:</strong> " . $row['ruta_imagen'] . "</p>";
        echo "<button type='button' onclick='history.go(-1);'>Volver</button>";
    }
    ?>
<footer>
        <div class="container">
            <div class="col">
                <p class="lead text-center">&COPY Tienda Bowser, Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>

</html>
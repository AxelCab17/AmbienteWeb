<?php
include 'sql/conexion.php';
include 'funciones.php';
include "crudJuegos/crud_Consola.php";
$menu = getMenu();
?>

<!DOCTYPE html>
<html lang="es">

<head th:fragment="head">
    <title>Tienda Bowser</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<header th:fragment="header" class="header">
        <nav class="navbar navbar-expand-lg navbar-danger bg-dark">
            <a class="logo navbar-brand" href="#">
                <img src="https://cdn.discordapp.com/attachments/1165381757655318588/1165405392671612969/3bW7WPi.png?ex=6546bb59&is=65344659&hm=ac23a5d55495c86e72cfb26cde8d26778547d6d94563612029d304492f5109c9&"
                    class="logo" alt="Tienda Bowser">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="menu collapse navbar-collapse ml-auto" id="navbarNav">
                <ul class="navbar-nav">
                    <?php foreach ($menu as $item) { ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo $item["url"] ?>">
                                <?php echo $item["name"] ?>
                            </a></li>
                    <?php } ?>
                    <!-- Menú desplegable de "Consola" -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="consolaDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Consola
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="consolaDropdown">
                            <a class="dropdown-item" href="#">Agregar Consola</a>
                            <a class="dropdown-item" href="#">Ver Consola</a>
                            <a class="dropdown-item" href="#">Editar Consola</a>
                        </div>
                    </li>
                    <!-- Menú desplegable de "Juego" -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="juegoDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Juego
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="juegoDropdown">
                            <a class="dropdown-item" href="#">Agregar Juego</a>
                            <a class="dropdown-item" href="#">Ver Juego</a>
                            <a class="dropdown-item" href="#">Editar Juego</a>
                        </div>
                    </li>
                    <!-- Menú desplegable de "Accesorio" -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="accesorioDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Accesorio
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="accesorioDropdown">
                            <a class="dropdown-item" href="accesoriosCrud.php">Agregar Accesorio</a>
                            <a class="dropdown-item" href="#">Ver Accesorio</a>
                            <a class="dropdown-item" href="#">Editar Accesorio</a>
                        </div>
                    </li>
                </ul>
            </div>
            <button id="themeChangeBtn" class="btn btn-light" onclick="toggleTheme()">
                <span id="themeIcon" class="fas fa-moon"></span>
            </button>
        </nav>
    </header>
            <button id="themeChangeBtn" class="btn btn-light" onclick="toggleTheme()">
                <span id="themeIcon" class="fas fa-moon"></span>
            </button>
        </nav>
        <div class="container mt-5">
            <h2>Consolas</h2>

            <!-- Agregar Consola Formulario -->
            <form action="" method="post" class="mt-4">
                <h3>Agregar Consola</h3>
                <div class="form-group">
                    <label for="nombre">Nombre de la Consola:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                </div>

                <div class="form-group">
                    <label for="existencias">Existencias:</label>
                    <input type="number" class="form-control" id="existencias" name="existencias" required>
                </div>

                <div class="form-group">
                    <label for="ruta_imagen">URL Imagen:</label>
                    <input type="text" class="form-control" id="ruta_imagen" name="ruta_imagen">
                </div>

                <button class="btn btn-danger" type="submit" name="agregar">Agregar Consola</button>
            </form>

            <!-- Lista de Consolas -->
            <h3 class="mt-4">Lista de Consolas</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Existencias</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($conexion instanceof mysqli) {
                        $consolas = obtenerConsolas($conexion);

                        while ($row = mysqli_fetch_assoc($consolas)) {
                            echo "<tr>";
                            echo "<td>" . $row['id_consola'] . "</td>";
                            echo "<td>" . $row['nombre'] . "</td>";
                            echo "<td>$" . $row['precio'] . "</td>";
                            echo "<td>" . $row['existencias'] . "</td>";
                            echo "<td>
                                    <form action='' method='post'>
                                        <input type='hidden' name='id_consola' value='" . $row['id_consola'] . "'>
                                        <button type='submit' name='ver' class='btn btn-info'>Ver</button>
                                        <button type='submit' name='editar' class='btn btn-warning'>Editar</button>
                                        <button type='submit' name='eliminar' class='btn btn-danger'>Eliminar</button>
                                    </form>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Error: La conexión a la base de datos no está establecida correctamente.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <!-- Ver, Editar, Eliminar Consola Formulario -->
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST["ver"]) || isset($_POST["editar"]))) {
                $id_consola = $_POST["id_consola"];
                $consola = obtenerConsolaPorId($conexion, $id_consola);
                $row = mysqli_fetch_assoc($consola);

                echo "<form action='' method='post' class='mt-4'>
                        <h3>Detalles de la Consola</h3>
                        <div class='form-group'>
                            <label for='nombre'>Nombre de la Consola:</label>
                            <input type='text' class='form-control' id='nombre' name='nombre' value='" . ($row['nombre'] ?? '') . "' required>
                        </div>

                        <div class='form-group'>
                            <label for='precio'>Precio:</label>
                            <input type='number' step='0.01' class='form-control' id='precio' name='precio' value='" . ($row['precio'] ?? '') . "' required>
                        </div>

                        <div class='form-group'>
                            <label for='existencias'>Existencias:</label>
                            <input type='number' class='form-control' id='existencias' name='existencias' value='" . ($row['existencias'] ?? '') . "' required>
                        </div>

                        <div class='form-group'>
                            <label for='ruta_imagen'>URL Imagen:</label>
                            <input type='text' class='form-control' id='ruta_imagen' name='ruta_imagen' value='" . ($row['ruta_imagen'] ?? '') . "'>
                        </div>

                        <button type='submit' name='editar' class='btn btn-warning'>Guardar Cambios</button>
                      </form>";
            } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ver"])) {
                $id_consola = $_POST["id_consola"];
                $consola = obtenerConsolaPorId($conexion, $id_consola);
                $row = mysqli_fetch_assoc($consola);

                echo "<h3>Detalles de la Consola</h3>";
                echo "<div class='form-group'><strong>ID:</strong> " . $row['id_consola'] . "</div>";
                echo "<div class='form-group'><strong>Nombre:</strong> " . $row['nombre'] . "</div>";
                echo "<div class='form-group'><strong>Precio:</strong> $" . $row['precio'] . "</div>";
                echo "<div class='form-group'><strong>Existencias:</strong> " . $row['existencias'] . "</div>";
                echo "<div class='form-group'><strong>Ruta de Imagen:</strong> " . $row['ruta_imagen'] . "</div>";
                echo "<button type='button' onclick='history.go(-1);' class='btn btn-secondary'>Volver</button>";
            }
            ?>
        </div>
    </header>

    <footer class="bg-dark text-white mt-5">
        <div class="container">
            <div class="col">
                <p class="lead text-center">&COPY Tienda Bowser, Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>

</html>
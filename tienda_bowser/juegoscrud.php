<?php
include("funciones.php");
include 'sql/conexion.php';
include "crudJuegos/crud_Juego.php";
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
    <div class="container mt-5">
        <h2 class="mb-4">Juegos</h2>

        <!-- Agregar Juego Formulario -->
        <form action="" method="post" class="bg-light p-4 rounded">
            <h3>Agregar Juego</h3>
            <div class="form-group">
                <label for="nombre">Nombre del Juego:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="consola">Consola:</label>
                <input type="text" id="consola" name="consola" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" step="0.01" id="precio" name="precio" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="existencias">Existencias:</label>
                <input type="number" id="existencias" name="existencias" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="ruta_imagen">URL Imagen:</label>
                <input type="text" id="ruta_imagen" name="ruta_imagen" class="form-control">
            </div>

            <button type="submit" name="agregar" class="btn btn-danger">Agregar Juego</button>
        </form>

        <!-- Lista de Juegos -->
        <h3 class="mt-4">Lista de Juegos</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Consola</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $juegos = obtenerJuegos($conexion);

                while ($row = mysqli_fetch_assoc($juegos)) {
                    echo "<tr>";
                    echo "<td>" . $row['id_juego'] . "</td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['consola'] . "</td>";
                    echo "<td>$" . $row['precio'] . "</td>";
                    echo "<td>" . $row['existencias'] . "</td>";
                    echo "<td>
                                <form action='' method='post'>
                                    <input type='hidden' name='id_juego' value='" . $row['id_juego'] . "'>
                                    <button type='submit' name='ver' class='btn btn-info btn-sm'>Ver</button>
                                    <button type='submit' name='editar' class='btn btn-warning btn-sm'>Editar</button>
                                    <button type='submit' name='eliminar' class='btn btn-danger btn-sm'>Eliminar</button>
                                </form>
                              </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Ver, Editar, Eliminar Juego Formulario -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST["ver"]) || isset($_POST["editar"]))) {
            $id_juego = $_POST["id_juego"];
            $juego = obtenerJuegoPorId($conexion, $id_juego);
            $row = mysqli_fetch_assoc($juego);

            echo "<form action='' method='post' class='bg-light p-4 rounded'>
                        <h3>Detalles del Juego</h3>
                        <div class='form-group'>
                            <label for='nombre'>Nombre del Juego:</label>
                            <input type='text' id='nombre' name='nombre' value='" . $row['nombre'] . "' class='form-control' required>
                        </div>

                        <div class='form-group'>
                            <label for='consola'>Consola:</label>
                            <input type='text' id='consola' name='consola' value='" . $row['consola'] . "' class='form-control' required>
                        </div>

                        <div class='form-group'>
                            <label for='precio'>Precio:</label>
                            <input type='number' step='0.01' id='precio' name='precio' value='" . $row['precio'] . "' class='form-control' required>
                        </div>

                        <div class='form-group'>
                            <label for='existencias'>Existencias:</label>
                            <input type='number' id='existencias' name='existencias' value='" . $row['existencias'] . "' class='form-control' required>
                        </div>

                        <div class='form-group'>
                            <label for='ruta_imagen'>URL Imagen:</label>
                            <input type='text' id='ruta_imagen' name='ruta_imagen' value='" . $row['ruta_imagen'] . "' class='form-control'>
                        </div>

                        <button type='submit' name='editar' class='btn btn-warning'>Guardar Cambios</button>
                      </form>";
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ver"])) {
            $id_juego = $_POST["id_juego"];
            $juego = obtenerJuegoPorId($conexion, $id_juego);
            $row = mysqli_fetch_assoc($juego);

            echo "<div class='bg-light p-4 rounded'>
                        <h3>Detalles del Juego</h3>
                        <p><strong>ID:</strong> " . $row['id_juego'] . "</p>
                        <p><strong>Nombre:</strong> " . $row['nombre'] . "</p>
                        <p><strong>Consola:</strong> " . $row['consola'] . "</p>
                        <p><strong>Precio:</strong> $" . $row['precio'] . "</p>
                        <p><strong>Existencias:</strong> " . $row['existencias'] . "</p>
                        <p><strong>Ruta de Imagen:</strong> " . $row['ruta_imagen'] . "</p>
                        <button type='button' onclick='history.go(-1);' class='btn btn-secondary'>Volver</button>
                      </div>";
        }
        ?>
    </div>
    <footer>
        <div class="container">
            <div class="col">
                <p class="lead text-center">&COPY Tienda Bowser, Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
    <script>
            modoOscuro();

            scrollSmooth();

            logoHover();
        </script>
</body>
</html>
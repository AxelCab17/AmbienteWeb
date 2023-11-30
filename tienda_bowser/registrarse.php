<?php
include("funciones.php");
$menu = getMenu();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "RegistroUsuario/procesar_registro.php";
}
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
        <div class="container mt-5">
        <h2 class="mb-4">Registrarse</h2>
            <form action="" method="post" class="bg-light p-4 rounded">
                <div class="form-group">
                    <label for="username">Nombre de Usuario:</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" class="form-control">
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" class="form-control">
                </div>

                <button type="submit" class="btn btn-danger">Registrarse</button>
            </form>
            </div>
        <footer>
            <div class="container">
                <div class="col">
                    <p class="lead text-center">&COPY Tienda Bowser, Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>
</body>

</html>
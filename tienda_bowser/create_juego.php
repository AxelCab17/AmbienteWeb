<?php
include("funciones.php");
include "sql/conexion.php";
$menu = getMenu();
$usuario_autenticado = false;
session_start();

if(!empty($_SESSION['usuario_autenticado'])) {
    $usuario_autenticado = true; 
  }
  
  if($usuario_autenticado) {
  
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "Login/procesar_login.php";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tienda Bowser</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body>
    <header th:fragment="header" class="header">
        <nav class="navbar navbar-expand-lg navbar-danger bg-dark">
            <a class="logo navbar-brand" href="#">
                <img src="https://cdn.discordapp.com/attachments/1165381757655318588/1165405392671612969/3bW7WPi.png?ex=6546bb59&is=65344659&hm=ac23a5d55495c86e72cfb26cde8d26778547d6d94563612029d304492f5109c9&" class="logo" alt="Tienda Bowser">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="menu collapse navbar-collapse ml-auto" id="navbarNav">
    <ul class="navbar-nav">
        <?php foreach ($menu as $item) { ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo $item["url"] ?>">
                    <?php echo $item["name"] ?>
                </a></li>
        <?php } ?>
        <?php if ($usuario_autenticado): ?>
            <!-- Menú desplegable de "Consola" -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="consolaDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Consola
                </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="consolaDropdown">
                    <a class="dropdown-item" href="create_consola.php">Crear</a>
                    <a class="dropdown-item" href="update_consola.php">Actualizar</a>
                    <a class="dropdown-item" href="delete_consola.php">Eliminar</a>
                    
                </div>
            </li>
            <!-- Menú desplegable de "Juego" -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="juegoDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Juego
                </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="juegoDropdown">
                    <a class="dropdown-item" href="create_juego.php">Crear</a>
                    <a class="dropdown-item" href="update_juego.php">Actualizar</a>
                    <a class="dropdown-item" href="delete_juego.php">Eliminar</a>
                    
                </div>
            </li>
            <!-- Menú desplegable de "Accesorio" -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="accesorioDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Accesorio
                </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="accesorioDropdown">
                    <a class="dropdown-item" href="create_accesorio.php">Crear</a>
                    <a class="dropdown-item" href="update_accesorios.php">Actualizar</a>
                    <a class="dropdown-item" href="delete_accesorio.php">Eliminar</a>
                    
                </div>
            </li>
        <?php endif; ?>
        <?php if ($usuario_autenticado): ?>
    <!-- Menú desplegable de "Cerrar Sesión" -->
    <li class="nav-item">
        <form method="post" action="procesar_logout.php">
            <button type="submit" class="btn btn-link" name="cerrar_sesion">Cerrar Sesión</button>
        </form>
    </li>
<?php endif; ?>
    </ul>
</div>
            <button id="themeChangeBtn" class="btn btn-light" onclick="toggleTheme()">
                <span id="themeIcon" class="fas fa-moon"></span>
            </button>
        </nav>
    </header>
<body>

<div class="container mt-5">
    <h1>Crear Juego</h1>

    <form action="crudJuegos.php" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="consola">Consola:</label>
            <input type="text" class="form-control" name="consola" required>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" step="0.01" class="form-control" name="precio" required>
        </div>

        <div class="form-group">
            <label for="existencias">Existencias:</label>
            <input type="number" class="form-control" name="existencias" required>
        </div>

        <div class="form-group">
            <label for="ruta_imagen">Ruta de la Imagen:</label>
            <input type="text" class="form-control" name="ruta_imagen">
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="activo">
            <label class="form-check-label" for="activo">Activo</label>
        </div>

        <input type="hidden" name="create" value="true">
        <button type="submit" class="btn btn-primary">Crear Juego</button>
    </form>
</div>
<footer class="bg-dark text-white mt-5">
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

<?php
include("funciones.php");
$menu = getMenu();
?>

<!DOCTYPE html>
<html>

<head th:fragment="head">
    <title>Tienda Bowser</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body class="body">
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
                <li class="nav-item"><a class="nav-link" href="<?php echo $item["url"] ?>"><?php echo $item["name"] ?></a></li>
            <?php } ?>
            <!-- Menú desplegable de "Consola" -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="consolaDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <a class="nav-link dropdown-toggle" href="#" id="juegoDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <a class="nav-link dropdown-toggle" href="#" id="accesorioDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
</nav>
    </header>
    <footer>
        <div class="container">
            <div class="col">
                <p class="lead text-center">&COPY Tienda Bowser, Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>

</html>
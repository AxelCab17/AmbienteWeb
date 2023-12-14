<?php
include("funciones.php");
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

<head th:fragment="head">
    <title>Tienda Bowser</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
                    <a class="dropdown-item" href="consolasCrud.php">Administrar</a>
                    
                </div>
            </li>
            <!-- Menú desplegable de "Juego" -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="juegoDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Juego
                </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="juegoDropdown">
                    <a class="dropdown-item" href="juegosCrud.php">Administrar</a>
                    
                </div>
            </li>
            <!-- Menú desplegable de "Accesorio" -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="accesorioDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Accesorio
                </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="accesorioDropdown">
                    <a class="dropdown-item" href="accesoriosCrud.php">Administrar</a>
                    
                </div>
            </li>
        <?php endif; ?>
        <?php if ($usuario_autenticado): ?>
    <!-- Menú desplegable de "Cerrar Sesión" -->
    <li class="nav-item">
        <form method="post" action="procesar_logout.php">
            <button type="submit" class="nav-link" name="cerrar_sesion">Cerrar Sesión</button>
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
    
    <section>
        <h3 class="titulonosotros">Nuestra Historia</h3>
        <p class="historianosotros">Hace unos años, un grupo apasionado de entusiastas de los videojuegos decidió unir fuerzas para crear algo único: una tienda en línea especializada en productos inspirados en el famoso personaje de videojuegos, Bowser. Su amor por los juegos de la serie Super Mario Bros. y la fascinación por el icónico villano Bowser los llevaron a la idea de lanzar "Tienda Bowser".</p>
        <p class="historianosotros">El equipo comenzó con una lluvia de ideas, definiendo qué tipo de productos querían ofrecer. Desde juegos de diferentes consolas, accesorios de consolas hasta consolas, la variedad de productos inspirados en Bowser era asombrosa. Decidieron que la tienda en línea no solo sería un lugar para comprar mercancía, sino también un espacio para que los fanáticos de videojuegos se conectaran y compartieran su entusiasmo.</p>
    </section>
    <style>
        .accordion-button:not(.collapsed) {
            background-color: black;
            color: white;
        }

        .accordion-item.active strong {
            background-color: black;
            color: white;
            /* Color del texto dentro de <strong> cuando el botón está abierto */
        }
    </style>
    <h3 class="titulonosotros">Creadores</h3>
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Adriana Viquez Jimenez
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <strong>Mi nombre es Adriana Viquez</strong> Mi edad es de 25 años, vivo en Alajuela La Garita, Mis pasatiempos son jugar a videojuegos, ver series, y estudio Ingenieria en Sistemas
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    Axel Noel Cabezas Cerda
                </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <strong>Mi nombre es Axel Noel Cabezas Cerda</strong> Vivo en Heredia San Francisco, Tengo 19 años, Mis pasatiempos es jugar voleibol, ir al gym, tocar guitarra y estudio Ingeniería en Sistemas
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    Enzo Leonardo Quesada Arand
                </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <strong>Mi nombre es Enzo Leonardo Quesada Arand</strong> Vivo en San José Sabana Norte, Tengo 20 años, Mis pasatiempos es ir al gym, ensamblar PCs y estudio Ingeniería en Sistemas
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                Ronald Alejandro Mendoza Wong
                </button>
            </h2>
            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                <div class="accordion-body">
                <strong>Mi nombre es Ronald Alejandro Mendoza Wong</strong> Vivo en San José Pavas, Tengo 23 años, Mis pasatiempos es ir al gym, escuchar música y los videojuegos y estudio Ingeniería en Sistemas
                </div>
            </div>
        </div>
    </div>
    <br>
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
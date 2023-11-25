<?php
include("funciones.php");
$menu = getMenu();
?>

<!DOCTYPE html>
<html>

<head th:fragment="head">
    <title>Tienda Bowser</title>
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
    </header>
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
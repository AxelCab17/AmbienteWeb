<?php 

function getMenu(){
    $menu = array(array("url" => "index.php", "name" => "Inicio"), array("url" => "nosotros.php", "name" => "Nosotros"));
    $menu[] = array("url" => "juegos.php", "name" => "Juegos");
    $menu[] = array("url" => "accesorios.php", "name" => "Accesorios");
    $menu[] = array("url" => "consolas.php", "name" => "Consolas");
    $menu[] = array("url" => "registrarse.php", "name" => "Registrarse");
    $menu[] = array("url" => "login.php", "name" => "Ingresar");
    return $menu;
}


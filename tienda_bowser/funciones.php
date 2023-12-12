<?php 

function getMenu(){
    $menu = array(array("url" => "index.php", "name" => "Inicio"), array("url" => "nosotros.php", "name" => "Nosotros"));
    $menu[] = array("url" => "listar_juegos.php", "name" => "Juegos");
    $menu[] = array("url" => "listar_accesorios.php", "name" => "Accesorios");
    $menu[] = array("url" => "listar_consolas.php", "name" => "Consolas");
    $menu[] = array("url" => "registrarse.php", "name" => "Registrarse");
    $menu[] = array("url" => "login.php", "name" => "Ingresar");
    return $menu;
}


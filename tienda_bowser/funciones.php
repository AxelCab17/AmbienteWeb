<?php 
function getMenu(){
    $menu = array(array("url" => "index.php", "name" => "Inicio"), array("url" => "nosotros.php", "name" => "Nosotros"));
    $menu[] = array("url" => "categorias.php", "name" => "Categorias");
    $menu[] = array("url" => "juegoscrud.php", "name" => "Juegos");
    $menu[] = array("url" => "accesoriosCrud.php", "name" => "Accesorios");
    $menu[] = array("url" => "consolasCrud.php", "name" => "Consoloas");
    $menu[] = array("url" => "registrarse.php", "name" => "Registrarse");
    $menu[] = array("url" => "login.php", "name" => "Ingresar");
    return $menu;
}

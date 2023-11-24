<?php 
function getMenu(){
    $menu = array(array("url" => "index.php", "name" => "Inicio"), array("url" => "nosotros.php", "name" => "Nosotros"));
    $menu[] = array("url" => "juegos.php", "name" => "Juegos");
    $menu[] = array("url" => "categorias.php", "name" => "Categorias");
    $menu[] = array("url" => "consolas.php", "name" => "Consolas");
    $menu[] = array("url" => "accesorios.php", "name" => "Accesorios");
    $menu[] = array("url" => "juegoscrud.php", "name" => "CRUD Juegos");
    $menu[] = array("url" => "accesoriosCrud.php", "name" => "CRUD Accesorios");
    $menu[] = array("url" => "consolasCrud.php", "name" => "CRUD Accesorios");
    $menu[] = array("url" => "registrarse.php", "name" => "Registrarse");
    $menu[] = array("url" => "login.php", "name" => "Ingresar");
    return $menu;
}

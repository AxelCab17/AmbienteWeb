<?php 
function getMenu(){
    $menu = array(array("url" => "index.php", "name" => "Inicio"), array("url" => "nosotros.php", "name" => "Nosotros"));
    $menu[] = array("url" => "juegos.php", "name" => "Juegos");
    $menu[] = array("url" => "categorias.php", "name" => "Categorias");
    $menu[] = array("url" => "consolas.php", "name" => "Consolas");
    $menu[] = array("url" => "accesorios.php", "name" => "Accesorios");
    $menu[] = array("url" => "", "name" => "Ingresar");
    return $menu;
}

<?php
session_start();

// Destruir todas las variables de sesión.
$_SESSION = array();

// Si se desea destruir la sesión, también es útil borrar la cookie de sesión.
// Nota: ¡Esto destruirá la sesión y no la información de la sesión!
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}

// Finalmente, destruir la sesión.
session_destroy();

// Redirigir a la página de inicio o a donde desees después de cerrar sesión.
header("Location: index.php");
exit;
?>
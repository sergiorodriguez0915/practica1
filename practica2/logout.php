<?php
ob_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION = array();

if (isset($_COOKIE["recordar_usuario"])) {
    setcookie("recordar_usuario", "", time() - 3600, "/"); // Borrar cookie
}

if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}

header("Location: login.php");
exit();
?>

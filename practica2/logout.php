<?php
session_start();


$_SESSION = array();


if (isset($_COOKIE["recordar_usuario"])) {
    setcookie("recordar_usuario", "", time() - 3600, "/");
}


session_destroy();

header("Location: login.php");
exit();
?>

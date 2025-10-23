<?php
session_start();

// Si no hay sesión, pero sí cookie, recreamos la sesión
if (!isset($_SESSION["key"]) && isset($_COOKIE["recordar_usuario"])) {
    $_SESSION["key"] = "algo";
}

// Si no hay sesión ni cookie, redirigir al login
if (!isset($_SESSION["key"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Bienvenido</h1>
    <p>Has iniciado sesión correctamente.</p>

    <form action="logout.php" method="POST">
        <button type="submit">Cerrar sesión</button>
    </form>
</body>
</html>

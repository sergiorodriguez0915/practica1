<?php
session_start();

if (!isset($_SESSION["key"]) && isset($_COOKIE["recordar_usuario"])) {
    $_SESSION["key"] = "algo";
}

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
    <h1>Bienvenidos</h1>

    <form action="logout.php" method="POST">
        <button type="submit">Cerrar sesión</button>
    </form>
</body>
</html>

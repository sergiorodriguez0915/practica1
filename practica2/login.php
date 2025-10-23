<?php
session_start();

// Si ya hay sesión o cookie, redirigir a inicio
if (isset($_SESSION["key"]) || isset($_COOKIE["recordar_usuario"])) {
    header("Location: inicio.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: #f9f9f9;
        }
        form {
            background: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }
        input { 
            width: 100%; 
            padding: 8px; 
            margin: 5px 0; 
            box-sizing: border-box; 
        }
        input[type="submit"] {
            background: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<form action="validar_login.php" method="POST">
    <h2>Iniciar Sesión</h2>
    <input type="text" name="usuario" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <label>
        <input type="checkbox" name="recordar" value="si"> Recordarme
    </label>
    <input type="submit" value="Iniciar sesión">
</form>

</body>
</html>

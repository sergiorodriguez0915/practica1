<?php
session_start();

$usuario_valido = "admin";
$password_valido = "1234";

if ($_POST['usuario'] === $usuario_valido && $_POST['password'] === $password_valido) {
    $_SESSION["key"] = "algo";

    // Si se marcó "Recordarme", crear cookie válida por 7 días
    if (isset($_POST['recordar']) && $_POST['recordar'] === 'si') {
        setcookie("recordar_usuario", $_POST['usuario'], time() + (7 * 24 * 60 * 60), "/"); 
    }

    header("Location: inicio.php");
    exit();
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Error de inicio de sesión</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                text-align: center;
                margin-top: 100px;
                background-color: #f8d7da;
                color: #721c24;
            }
            .error-box {
                display: inline-block;
                padding: 30px;
                border: 1px solid #f5c6cb;
                background-color: #f8d7da;
                border-radius: 8px;
            }
            button {
                margin-top: 20px;
                padding: 10px 20px;
                font-size: 16px;
                cursor: pointer;
                border: none;
                border-radius: 5px;
                background-color: #721c24;
                color: white;
            }
            button:hover {
                background-color: #501217;
            }
        </style>
    </head>
    <body>
        <div class="error-box">
            <h2>Error</h2>
            <p>Usuario o contraseña incorrectos</p>
            <form action="login.php" method="get">
                <button type="submit">Regresar</button>
            </form>
        </div>
    </body>
    </html>
    <?php
    exit();
}
?>

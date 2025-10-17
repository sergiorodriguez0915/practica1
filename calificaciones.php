<?php
$alumnos = ["Fualano", "Mengano", "Sutano", "Emiliano", "Brayan",
             "Grabiel", "Cintia", "Britanny", "Kevin", "José Carlos"];

$calificaciones = ["1","2","3","4","5","6","7","8","9","10", "NP"];
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Calificaciones</title>
</head>
<body>
<h1>Mis Alumnos</h1>
<form method="POST" action="estadisticas.php">
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Calificación</th>
        </tr>
        <?php foreach ($alumnos as $index => $alumno): ?>
        <tr>
            <td>
                <label><?php echo $alumno; ?></label>
            </td>
            <td>
                <select name="cbo[<?php echo $index; ?>]">
                    <?php foreach ($calificaciones as $calif): ?>
                        <option value="<?php echo $calif; ?>"><?php echo $calif; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <input type="submit" value="Enviar">
</form>
</body>
</html>

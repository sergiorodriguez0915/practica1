<?php
$alumnos = ["Fualano", "Mengano", "Sutano", "Emiliano", "Brayan",
             "Grabiel", "Cintia", "Britanny", "Kevin", "Elias"];

$calificaciones = [];
$npAlumnos = [];

foreach ($alumnos as $alumno) {
    $key = "cbo" . $alumno;
    if (isset($_POST[$key])) {
        $valor = $_POST[$key];

        if (strtoupper($valor) === "NP") {
            $npAlumnos[$alumno] = "NP";
        } else {
            $calificaciones[$alumno] = floatval($valor);
        }
    }
}

$totalEvaluados = count($calificaciones);
$suma = array_sum($calificaciones);
$promedio = $suma / $totalEvaluados;
$aprovechamiento = ($promedio / 10) * 100;

$mejor = max($calificaciones);
$peor = min($calificaciones);

$areaOportunidad = [];
foreach ($calificaciones as $nombre => $calif) {
    if ($calif == $peor) {
        $areaOportunidad[] = $nombre;
    }
}

$aprobados = 0;
$reprobados = 0;

foreach ($calificaciones as $calif) {
    if ($calif >= 6) {
        $aprobados++;
    } else {
        $reprobados++;
    }
}

$porcAprobados = ($aprobados / $totalEvaluados) * 100;
$porcReprobados = ($reprobados / $totalEvaluados) * 100;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Estadísticas de Calificaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 25px;
        }
        table {
            border-collapse: collapse;
            width: 60%;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #eaeaea;
        }
        h1, h2 {
            color: #333;
        }
    </style>
</head>
<body>

<h1>Resultados de Calificaciones</h1>

<table>
    <tr>
        <th>Alumno</th>
        <th>Calificación</th>
    </tr>
    <?php foreach ($alumnos as $alumno): ?>
        <tr>
            <td><?php echo $alumno; ?></td>
            <td>
                <?php
                    if (isset($npAlumnos[$alumno])) {
                        echo 'NP';
                    } elseif (isset($calificaciones[$alumno])) {
                        echo $calificaciones[$alumno];
                    } else {
                        echo "-";
                    }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<h2>Estadísticas Generales</h2>
<table class="resultados">
    <tr><th>Promedio general</th><td><?php echo number_format($promedio, 2); ?></td></tr>
    <tr><th>Aprovechamiento general</th><td><?php echo number_format($aprovechamiento, 1); ?>%</td></tr>
    <tr><th>Mejor calificación</th><td><?php echo $mejor; ?></td></tr>
    <tr><th>Peor calificación</th><td><?php echo $peor; ?></td></tr>
    <tr><th>% Aprobados</th><td><?php echo number_format($porcAprobados, 1); ?>% (<?php echo $aprobados; ?>)</td></tr>
    <tr><th>% Reprobados</th><td><?php echo number_format($porcReprobados, 1); ?>% (<?php echo $reprobados; ?>)</td></tr>
    <tr><th>Área de oportunidad</th><td><?php echo implode(", ", $areaOportunidad); ?></td></tr>
</table>

<h2>Notificaciones</h2>
<p>
    <?php
        if (!empty($npAlumnos)) {
            echo "Los siguientes alumnos tienen NP y no fueron contabilizados: " 
                . implode(", ", array_keys($npAlumnos)) . ".";
        } else {
            echo "Todos los alumnos presentaron calificación.";
        }
    ?>
</p>

</body>
</html>

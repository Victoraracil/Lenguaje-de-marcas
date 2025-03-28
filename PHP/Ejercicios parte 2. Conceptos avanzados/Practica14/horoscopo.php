<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.14</title>
</head>
<body>
    <h1>Ejercicio 2.13 - Tu Horóscopo</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signo'])) {
        $signo = htmlspecialchars($_POST['signo']);
        echo "<p>Has seleccionado el signo: <strong>$signo</strong></p>";
    } else {
        echo "<p>No se ha seleccionado ningún signo.</p>";
    }
    ?>
    <a href="zodiaco.html">Volver al formulario</a>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.15</title>
</head>
<body>
    <h1>Ejercicio 2.15</h1>
    <?php
        include 'cripto.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $frase = htmlspecialchars($_POST['frase']);
            $desplazamiento = intval($_POST['desplazamiento']);

            // Codificar la frase
            $fraseCodificada = codificar($frase, $desplazamiento);
        } else {
            $fraseCodificada = "No se ha enviado ninguna frase.";
        }
        ?>
    <p><strong>Frase original:</strong> <?php echo isset($frase) ? $frase : "No disponible"; ?></p>
    <p><strong>Frase codificada:</strong> <?php echo $fraseCodificada; ?></p>
    <a href="codificar.html">Volver al formulario</a>
</body>
</html>
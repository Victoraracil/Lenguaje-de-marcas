<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.12</title>
</head>
<body>
    <h1>Ejercicio 2.12</h1>
    <?php
        include 'cripto.php';

        $frase = "hola mundo";
        $desplazamiento = 3;

        $fraseCodificada = codificar($frase, $desplazamiento);
        $fraseDecodificada = decodificar($fraseCodificada, $desplazamiento);
    ?>
    <p><strong>Frase original:</strong> <?php echo $frase; ?></p>
    <p><strong>Frase codificada:</strong> <?php echo $fraseCodificada; ?></p>
    <p><strong>Frase decodificada:</strong> <?php echo $fraseDecodificada; ?></p>
</body>
</html>

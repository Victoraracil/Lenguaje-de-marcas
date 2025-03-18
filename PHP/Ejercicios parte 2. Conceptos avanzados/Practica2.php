<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.2</title>
</head>
<body>
    <h1>Ejercicio 2.2</h1>
    <?php
        /*Muestra de la frase "El perro de San Roque no tiene rabo":
             Las letras totales de la frase.
             El número de palabras de la frase.
             Una línea con el número de letras de cada palabra.*/
            $frase = "El perro de San Roque no tiene rabo";
            $palabras = explode(" ", $frase);
            $letras = 0;
            echo "<h3>Frase: $frase </h3>";
            echo "<br>Letras totales de la frase: " . strlen($frase);
            echo "<br>Número de palabras de la frase: " . count($palabras);
            echo "<br>Número de letras de cada palabra: ";
            for($i = 0; $i < count($palabras); $i++) {
                echo "<br>Palara: " . ($i + 1) . ": " . strlen($palabras[$i]);
            }
    ?>
</body>
</html>
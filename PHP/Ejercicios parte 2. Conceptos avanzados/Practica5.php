<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.5</title>
</head>
<body>
    <h1>Ejercicio 2.5</h1>
    <?php
        /*Haz un array indexado numéricamente que contenga las letras del abecedario
        en minúsculas. Luego recórrelo, y muéstralo por pantalla cada letra del array,
        primero en minúsculas y luego en mayúsculas*/
        $abecedario = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "ñ", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        for($i = 0; $i < count($abecedario); $i++) {
            echo $abecedario[$i] . " - " . strtoupper($abecedario[$i]) . "<br>";
        }
        

    ?>
</body>
</html>
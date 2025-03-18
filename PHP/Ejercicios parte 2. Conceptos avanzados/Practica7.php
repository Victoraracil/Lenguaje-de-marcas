<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.6</title>
</head>
<body>
    <h1>Ejercicio 2.6</h1>
    <?php
        /*Haz un programa para codificar por desplazamiento una frase utilizando el array
        de letras del ejercicio anterior. La idea es que convierta cada letra por la siguiente
        del abecedario y a la última le asigne la primera letra: a la "a" le corresponde la
        "b", a la "b" la "c", y así sucesivamente hasta que a la "z" la "a". Si la frase
        contiene espacios debe dejarlos igual.
        Sugerencia: puede resultar útil la operación módulo para tratar los índices del
        array
        
        
        Modifica el programa anterior para que el desplazamiento sea variable. Es decir,
        en un desplazamiento 3 se transforma la letra por la que está 3 posiciones más
        adelante.*/
        $abecedario = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "ñ", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        $frase = "hola mundo";
        $desplazamiento = 3;
        $fraseCodificada = "";
        for($i = 0; $i < strlen($frase); $i++) {
            if($frase[$i] == " ") {
                $fraseCodificada .= " ";
            } else {
                $posicion = array_search($frase[$i], $abecedario);
                $fraseCodificada .= $abecedario[($posicion + $desplazamiento) % count($abecedario)];
            }
        }
        echo "Frase sin codificar: " . $frase . "<br>";
        echo "Frase codificada: " . $fraseCodificada;
        
    ?>
</body>
</html>
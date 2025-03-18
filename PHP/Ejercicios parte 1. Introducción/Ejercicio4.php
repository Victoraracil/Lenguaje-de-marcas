<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1.4</title>
</head>
<body>
    <h1>Ejercicio 1.4</h1>
    <?php
        /*4. Script php que calcule la suma de los 10 primeros números pares y el
        producto de los 10 primeros números impares, simultáneamente, y que muestre
        los resultados por pantalla*/
        $sumaPares = 0;
        $productoImpares = 1;
        $contadorPares = 0;
        $contadorImpares = 0;
        $i = 1;
        while ($contadorPares < 10 || $contadorImpares < 10) {
            if ($i % 2 == 0) {
                $sumaPares += $i;
                $contadorPares++;
            } else {
                $productoImpares *= $i;
                $contadorImpares++;
            }
            $i++;
        }
        echo "La suma de los 10 primeros números pares es: " . $sumaPares . "<br>";
        echo "El producto de los 10 primeros números impares es: " . $productoImpares;
    ?>
</body>
</html>
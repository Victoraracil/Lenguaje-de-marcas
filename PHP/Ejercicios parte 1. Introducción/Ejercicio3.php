<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1.3</title>
</head>
<body>
    <h1>Ejercicio 1.3</h1>
    <?php
        /*3. Script php que genere y muestre 10 números aleatorios (del 1 al 500) y
        diga cuál es el mayor.*/
        $mayor = 0;
        for ($i = 0; $i < 10; $i++) {
            $num = rand(1, 500);
            echo $num . " ";
            if ($num > $mayor) {
                $mayor = $num;
            }
        }
        echo "<br>El número mayor es: " . $mayor;
    ?>
</body>
</html>
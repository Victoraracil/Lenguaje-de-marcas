<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1.1</title>
</head>
<body>
    <h1>Ejercicio 1.1</h1>
    <?php
        /*1. Script PHP que calcule y muestre la suma y el producto de los 10 primeros
        números naturales*/
        $suma = 0;
        $producto = 1;
        for ($i=1; $i <= 10; $i++) { 
            $suma += $i;
            $producto *= $i;
        }
        echo "La suma de los 10 primeros números naturales es: $suma<br>";
        echo "El producto de los 10 primeros números naturales es: $producto";
    ?>
</body>
</html>
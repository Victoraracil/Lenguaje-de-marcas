<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1.5</title>
</head>
<body>
    <h1>Ejercicio 1.5</h1>
    <?php
        /*5. Script php que muestre para los 15 primeros números naturales, el número,
        su doble y su triple.*/
        for ($i = 1; $i <= 15; $i++) {
            echo "Número: " . $i . "<br>";
            echo "Doble: " . $i * 2 . "<br>";
            echo "Triple: " . $i * 3 . "<br>";
            echo "<br>";
        }
    ?>
</body>
</html>
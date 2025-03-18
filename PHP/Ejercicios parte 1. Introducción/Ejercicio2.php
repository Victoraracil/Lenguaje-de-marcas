<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1.2</title>
</head>
<body>
    <h1>Ejercicio 1.2</h1>
    <?php
        /*2. Script php que, dados tres números, los ordene de menor a mayor.*/
        $tabla = [3, 5, 1];
        foreach ($tabla as $key => $value) {
            for ($i = 0; $i < count($tabla); $i++) {
                if ($tabla[$i] > $tabla[$key]) {
                    $aux = $tabla[$i];
                    $tabla[$i] = $tabla[$key];
                    $tabla[$key] = $aux;
                }
            }
        }
        echo "Los números ordenados de menor a mayor son: ";
        foreach ($tabla as $key => $value) {
            echo $value . " ";
        }
    ?>
</body>
</html>
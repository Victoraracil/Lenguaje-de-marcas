<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.11</title>
</head>
<body>
    <h1>Ejercicio 2.11</h1>
    <?php
        /*Divide el script en dos. Uno que contenga las funciones (biblioteca de
        funciones), llamado “conv_precios.php”, y otro que lo utilice luego*/
        include 'conv_precios.php';

        $precio_kg = array(
            "Manzanas" => 2.50,
            "Peras" => 1.80,
            "Plátanos" => 2.00,
            "Naranjas" => 1.50
        );

        $lista_compra = array(
            "Manzanas" => 2,
            "Peras" => 3,
            "Plátanos" => 1,
            "Naranjas" => 4
        );

        $total = 0;

        foreach ($precio_kg as $producto => $precio) {
            $subtotal = $precio * $lista_compra[$producto];
            $total += $subtotal;
            echo "El precio de {$lista_compra[$producto]} kg de $producto es de $subtotal €<br>";
        }

        echo "El precio total de la compra es de $total €<br>";
        echo "El precio total de la compra es de " . euros_a_pesetas($total) . " ptas";

    ?>
</body>
</html>
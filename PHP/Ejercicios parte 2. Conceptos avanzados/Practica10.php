<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.10</title>
</head>
<body>
    <h1>Ejercicio 2.10</h1>
    <?php
        /*Escribe el código para las siguientes funciones.
         Función pesetas_a_euros($pesetas): recibe como parámetro un valor en
        pesetas y devuelve el equivalente en euros (1 euro = 166.368 ptas).
         Función euros_a_pesetas($euros): recibe como parámetro un valor en
        euros y devuelve el equivalente en pesetas.
        Modifica el programa del ejercicio 9 para mostrar el tiquet de compras en euros
        y en pesetas haciendo la conversión con estas funciones.*/
        function pesetas_a_euros($pesetas) {
            return $pesetas / 166.368;
        }
        function euros_a_pesetas($euros) {
            return $euros * 166.368;
        }
        $precio_kg = array("Manzanas" => 2.50, "Peras" => 1.80, "Plátanos" => 2.00, "Naranjas" => 1.50);
        $lista_compra = array("Manzanas" => 2, "Peras" => 3, "Plátanos" => 1, "Naranjas" => 4);
        $total = 0;
        foreach ($precio_kg as $producto => $precio) {
            $total += $precio * $lista_compra[$producto];
            echo "El precio de $lista_compra[$producto] kg de $producto es de " . $precio * $lista_compra[$producto] . "€<br>";
        }
        echo "El precio total de la compra es de $total €<br>";
        echo "El precio total de la compra es de " . euros_a_pesetas($total) . "ptas";

    ?>
</body>
</html>
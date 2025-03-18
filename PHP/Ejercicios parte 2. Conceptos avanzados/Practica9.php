<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.9</title>
</head>
<body>
    <h1>Ejercicio 2.9</h1>
    <?php
        /*Vuelve a programar la práctica 5 del tema anterior pero esta vez usando arrays
        asociativos. Las estructuras de datos necesarias son:
         Un array $precio_kg. Cada elemento tiene como clave el nombre del
        producto y como valor el precio por kg del mismo.
         Un array $lista_compra. Cada elemento tiene como clave el nombre del
        producto y como valor la cantidad en kg comprada.
        Una vez almacenados los datos en los arrays procésalos mediante bucles para
        obtener el mismo resultado que en el ejercicio 8.*/
        $precio_kg = array("Manzanas" => 2.50, "Peras" => 1.80, "Plátanos" => 2.00, "Naranjas" => 1.50);
        $lista_compra = array("Manzanas" => 2, "Peras" => 3, "Plátanos" => 1, "Naranjas" => 4);
        $total = 0;
        foreach ($precio_kg as $producto => $precio) {
            $total += $precio * $lista_compra[$producto];
            echo "El precio de $lista_compra[$producto] kg de $producto es de " . $precio * $lista_compra[$producto] . "€<br>";
        }
        echo "El precio total de la compra es de $total €";

    ?>
</body>
</html>
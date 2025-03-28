<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio arrays</title>
</head>
<body>
    <h1>Ejercicio arrays</h1>
    <?php
        /*Crea una página llamada coches.php. 
        Define dentro un array bidimensional mixto donde:

        La primera dimensión sea asociativa. 
        Aquí pondremos matrículas de coches
        La segunda dimensión será numérica. 
        En cada casilla guardaremos la marca, modelo y número 
        de puertas del coche en cuestión. 
        Por ejemplo, el coche con matrícula “111BCD” puede ser 
        un “Ford” (casilla 0), modelo “Focus” (casilla 1) 
        de 5 puertas (casilla 2).

        Rellena el array con al menos 3 o 4 coches, 
        y después utiliza las estructuras adecuadas
        para recorrerlo mostrando los datos de los coches 
        ordenados por matrícula.*/
        $coches = array(
            "111BCD" => array("Ford", "Focus", 5),
            "222BCD" => array("Renault", "Clio", 3),
            "333BCD" => array("Seat", "Ibiza", 5),
            "444BCD" => array("Opel", "Corsa", 3)
        );
        ksort($coches);
        foreach ($coches as $matricula => $datos) {
            echo "Matrícula: $matricula<br>";
            echo "Marca: $datos[0]<br>";
            echo "Modelo: $datos[1]<br>";
            echo "Número de puertas: $datos[2]<br><br>";
        }
        
    ?>
</body>
</html>
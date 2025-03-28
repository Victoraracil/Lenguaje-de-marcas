<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.13</title>
</head>
<body>
    <h1>Ejercicio 2.13</h1>
    <?php
        /*Declara en un script un array $ciudades cuyos elementos contengan nombres
        de ciudades. Haciendo uso de la biblioteca “cripto.php” creada en la práctica
        anterior codifica estas palabras y guárdalas en un nuevo array llamado
        $codificado.
        Luego decodifica esta lista y guárdala en un array nuevo llamado $decodificado.
        Finalmente recorre los tres arrays y muestra por pantalla cada palabra antes de
        codificarla, tras codificarla y después de volverla a decodificar.*/
        include 'cripto.php';
        
        $ciudades = ["Madrid", "Barcelona", "Valencia", "Sevilla", "Zaragoza"];
        $desplazamiento = 3;

        $codificado = array_map(function($ciudad) use ($desplazamiento) {
            return codificar($ciudad, $desplazamiento);
        }, $ciudades);
        
        $decodificado = array_map(function($ciudadCodificada) use ($desplazamiento) {
            return decodificar($ciudadCodificada, $desplazamiento);
        }, $codificado);
        
        // Mostrar los resultados
        echo "<table border='1'>";
        echo "<tr><th>Original</th><th>Codificado</th><th>Decodificado</th></tr>";
        for ($i = 0; $i < count($ciudades); $i++) {
            echo "<tr>";
            echo "<td>{$ciudades[$i]}</td>";
            echo "<td>{$codificado[$i]}</td>";
            echo "<td>{$decodificado[$i]}</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>
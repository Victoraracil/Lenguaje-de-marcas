<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.8</title>
</head>
<body>
    <h1>Ejercicio 2.8</h1>
    <?php
        /*En esta práctica se pide crear una array asociativo con parejas de datos nombres
        de persona - altura. Luego se usará una estructura foreach para recorrerlo y
        mostrar, por cada elemento del array, el mensaje correspondiente del tipo "María
        mide 1.75 m".*/
        $personas = array("María" => 1.75, "Juana" => 1.80, "Pedro" => 1.70, "Ana" => 1.65);
        foreach ($personas as $nombre => $altura) {
            echo "$nombre mide $altura m<br>";
        }

    ?>
</body>
</html>
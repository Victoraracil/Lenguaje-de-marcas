<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 2.1</title>
</head>
<body>
    <h1>Ejercicio 2.1</h1>
    <?php
        /*Crea la función mostrar_impares que muestre los caracteres en posiciones
        impares de una cadena predefinida. Ejecútalo con la frase "A quien madruga
        Dios le ayuda"*/
        function mostrar_impares($cadena) {
            for ($i = 0; $i < 
            ($cadena); $i++) {
                if ($i % 2 != 0) {
                    echo $cadena[$i];
                }
            }
        }
        echo "<br>A quien madruga Dios le ayuda";
        echo "<br>Caracteres en posiciones impares: ";
        mostrar_impares("A quien madruga Dios le ayuda"); 
    ?>
</body>
</html>
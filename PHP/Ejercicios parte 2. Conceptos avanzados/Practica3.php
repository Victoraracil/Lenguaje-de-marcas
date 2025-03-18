<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.3</title>
</head>
<body>
    <h1>Ejercicio 2.3</h1>
    <?php
        /*Comprobar si un NIF es válido. Un NIF ha de constar exactamente de 8 números
        y una letra. Para comprobar si un carácter es un número o una letra se puede
        usar la función ord() que nos da el código ASCII de dicho carácter. En el código
        ASCII los números se encuentran en las posiciones 48 a 57 y las letras en las
        posiciones 65 a 90 (mayúsculas) y 97 a 122 (minúsculas). Una vez comprobado
        que es correcto debe mostrar el DNI por pantalla con la última letra en
        mayúsculas, independientemente de como estuviera en el dato de entrada.
        Un ejemplo con llamadas a la función ord():
        <?php
        echo ord("7") . "<br>"; // Vale 55, luego es un número
        echo ord("c") . "<br>"; // Vale 99, luego es una letra
        echo ord("-") . "<br>"; // Vale 45, ni letra ni número
        ?>*/
        $nif = "12345678z";
        $letra = substr($nif, -1);
        $numeros = substr($nif, 0, -1);
        $valido = true;
        if(strlen($nif) != 9) {
            $valido = false;
        } else {
            for($i = 0; $i < strlen($numeros); $i++) {
                if(ord($numeros[$i]) < 48 || ord($numeros[$i]) > 57) {
                    $valido = false;
                    break;
                }
            }
            if(ord($letra) < 65 || ord($letra) > 90) {
                $valido = false;
            }
        }
        if($valido) {
            echo "NIF válido: " . substr($nif, 0, -1) . strtoupper($letra);
        } else {
            echo "NIF no válido";
        }
    ?>
</body>
</html>
<?php
function codificar($frase, $desplazamiento) {
    $resultado = '';
    $longitud = strlen($frase);

    for ($i = 0; $i < $longitud; $i++) {
        $caracter = $frase[$i];
        if (ctype_alpha($caracter)) {
            $codigoAscii = ord($caracter);
            $base = ctype_upper($caracter) ? ord('A') : ord('a');
            $nuevoCodigoAscii = ($codigoAscii - $base + $desplazamiento) % 26 + $base;
            $resultado .= chr($nuevoCodigoAscii);
        } else {
            $resultado .= $caracter;
        }
    }

    return $resultado;
}

function decodificar($fraseCodificada, $desplazamiento) {
    return codificar($fraseCodificada, 26 - $desplazamiento);
}
?>
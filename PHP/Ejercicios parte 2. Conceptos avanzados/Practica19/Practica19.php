<?php
// Directorio a listar
$directorio = __DIR__ . '/listar';

// Extensión a filtrar
$extension = 'php';

// Abrir el directorio
if (is_dir($directorio)) {
    if ($gestor = opendir($directorio)) {
        echo "Archivos con extensión .$extension en el directorio '$directorio':<br><br>";
        
        // Leer los contenidos del directorio
        while (($archivo = readdir($gestor)) !== false) {
            // Verificar si es un archivo y tiene la extensión deseada
            if (is_file("$directorio/$archivo") && pathinfo($archivo, PATHINFO_EXTENSION) === $extension) {
                echo $archivo . "<br>";
            }
        }
        
        // Cerrar el gestor del directorio
        closedir($gestor);
    } else {
        echo "No se pudo abrir el directorio.";
    }
} else {
    echo "El directorio especificado no existe.";
}
?>
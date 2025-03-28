<?php
// Define the directorio to list files from
$directorio = __DIR__ . '/listar';

// Check if the directory exists
if (is_dir($directorio)) {
    // Open the directory
    if ($handle = opendir($directorio)) {
        echo "Archivos en el directorio 'listar':<br>";

        // Loop through the directory contents
        while (($file = readdir($handle)) !== false) {
            // Skip the current and parent directory entries
            if ($file !== '.' && $file !== '..') {
                echo $file . '<br>';
            }
        }

        // Close the directory handle
        closedir($handle);
    } else {
        echo "No se pudo abrir el directorio.";
    }
} else {
    echo "El directorio 'listar' no existe.";
}
?>
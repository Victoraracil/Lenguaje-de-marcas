<?php
$directorioDestino = 'descargas/';

if (!file_exists($directorioDestino)) {
    mkdir($directorioDestino, 0777, true);
}

if ($_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
    $nombreArchivo = basename($_FILES['archivo']['name']);
    $rutaArchivo = $directorioDestino . $nombreArchivo;

    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaArchivo)) {
        header("Location: confirmar.php?archivo=$nombreArchivo");
        exit();
    } else {
        echo "Error al mover el archivo.";
    }
} else {
    echo "Error en la subida del archivo.";
}
?>
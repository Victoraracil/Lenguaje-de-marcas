<?php
$archivo = $_GET['archivo'] ?? 'Desconocido';
$rutaArchivo = "descargas/" . $archivo;

if (file_exists($rutaArchivo)) {
    $extension = pathinfo($archivo, PATHINFO_EXTENSION);
    $tamano = filesize($rutaArchivo);
} else {
    $extension = "Desconocida";
    $tamano = "Desconocido";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación</title>
</head>
<body>
    <h1>Archivo Subido con Éxito</h1>
    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($archivo); ?></p>
    <p><strong>Extensión:</strong> <?php echo $extension; ?></p>
    <p><strong>Tamaño:</strong> <?php echo $tamano; ?> bytes</p>

    <a href="subir.php">Subir otro archivo</a> |
    <a href="listar.php">Ver archivos subidos</a>
</body>
</html>
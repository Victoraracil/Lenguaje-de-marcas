<?php
$directorio = 'descargas/';
$archivos = array_diff(scandir($directorio), array('.', '..'));

usort($archivos, function($a, $b) {
    return strcasecmp($a, $b);
});
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Archivos</title>
</head>
<body>
    <h1>Archivos Subidos</h1>
    
    <?php if (empty($archivos)): ?>
        <p>No hay archivos subidos.</p>
    <?php else: ?>
        <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Extensión</th>
                <th>Tamaño</th>
                <th>Descargar</th>
            </tr>
            <?php foreach ($archivos as $archivo): 
                $rutaArchivo = $directorio . $archivo;
                $extension = pathinfo($archivo, PATHINFO_EXTENSION);
                $tamano = filesize($rutaArchivo);
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($archivo); ?></td>
                    <td><?php echo $extension; ?></td>
                    <td><?php echo $tamano; ?> bytes</td>
                    <td><a href="<?php echo $rutaArchivo; ?>" download>Descargar</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <br>
    <a href="subir.php">Subir otro archivo</a> |
    <a href="index.php">Volver al inicio</a>
</body>
</html>
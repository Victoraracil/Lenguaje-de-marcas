<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivo</title>
</head>
<body>
    <h1>Subir un Archivo</h1>
    <form action="procesar_subida.php" method="post" enctype="multipart/form-data">
        <label for="archivo">Seleccione un archivo:</label>
        <input type="file" name="archivo" id="archivo" required>
        <br><br>
        <button type="submit">Subir</button>
    </form>
    <br>
    <a href="index.php">Volver al inicio</a>
</body>
</html>
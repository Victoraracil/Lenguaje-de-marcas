<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

include("basedatos.inc");

$titulo = $_POST['titulo'];
$valoracion = $_POST['valoracion'];
$efectividad = $_POST['efectividad'];
$tipo = $_POST['tipo'];
$resumen = $_POST['resumen'];
$descripcion = $_POST['descripcion'];
$autor = $_SESSION['usuario'];
$imagen = "";

// Subida de imagen (opcional)
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
    $carpetaDestino = "consejos/imagenes/$tipo/";
    if (!file_exists($carpetaDestino)) {
        mkdir($carpetaDestino, 0777, true);
    }
    $nombreArchivo = basename($_FILES['imagen']['name']);
    $rutaCompleta = $carpetaDestino . $nombreArchivo;

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaCompleta)) {
        $imagen = $rutaCompleta;
    }
}

// Insertar en la base de datos
$stmt = $conn->prepare("INSERT INTO consejos (titulo, valoracion, efectividad, tipo, resumen, descripcion, imagen, autor)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("iiisssss", $titulo, $valoracion, $efectividad, $tipo, $resumen, $descripcion, $imagen, $autor);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    header("Location: formulario.php?error=1");
}
$stmt->close();
$conn->close();
?>

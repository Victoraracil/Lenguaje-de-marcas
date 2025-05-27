<?php
session_start();
if (!isset($_SESSION["usuario"])) {//Verifica si el usuario ha iniciado sesión
    header("Location: login.php");
    exit;
}

$nombre = $_POST["nombre"] ?? "";
$provincia = $_POST["provincia"] ?? "";
$estrellas = $_POST["estrellas"] ?? "";

if (empty($nombre) || empty($provincia) || empty($estrellas)) {//Validacion de campos
    header("Location: error.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "hoteles");
//Se usa una consulta preparada para insertar el nuevo hotel. Si hay éxito, se redirige a index.php, si no, a error.php.
$stmt = $conn->prepare("INSERT INTO hoteles (nombre, provincia, estrellas) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $nombre, $provincia, $estrellas);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    header("Location: error.php");
}

<?php
include 'usuarios.php';

$usuario = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';

$archivo = 'accesos.txt';
$mensaje = '';

if (isset($usuarios[$usuario]) && $usuarios[$usuario] === $password) {
    $mensaje = "El usuario $usuario ha accedido al sistema.\n";
    file_put_contents($archivo, $mensaje, FILE_APPEND);
    header("Location: ok.php");
} else {
    $mensaje = "Intento fallido de acceso del usuario $usuario.\n";
    file_put_contents($archivo, $mensaje, FILE_APPEND);
    header("Location: error.html");
}
exit();
?>
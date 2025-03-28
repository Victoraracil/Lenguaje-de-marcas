//Para conectarme al localhost
<?php
$host = "localhost";
$nombreBD = "videojuegos";
$usuario = "root";
$password = "";

//if (isset($))
$pdo = new PDO("mysql:host=$host;dbname=$nombreBD;charset=utf8",
    $usuario, $password);

    $insercion = $pdo->prepare("INSERT INTO videojuegos(titulo, genero, precio)" .
    " VALUES('Fifa 2020', 'Deportes', 40.95)");
    $insercion->execute()
?>
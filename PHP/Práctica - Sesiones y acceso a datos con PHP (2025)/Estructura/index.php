<?php
session_start();
if (!isset($_SESSION["usuario"])) {//Verificar si el usuario esta loggeado, si no redirige al login
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "hoteles");//conexion a base de datos
$provincia = $_GET["provincia"] ?? "";
$estrellas = $_GET["estrellas"] ?? "";

$query = "SELECT * FROM hoteles WHERE 1";//construye una consulta SQL dinámica en función de lo que el usuario filtre
$params = [];
$types = "";

if (!empty($provincia)) {
    $query .= " AND provincia=?";
    $types .= "s";
    $params[] = $provincia; //mostrar resultados en una tabla
}
if (!empty($estrellas)) {
    $query .= " AND estrellas=?";
    $types .= "i";
    $params[] = $estrellas;
}

$stmt = $conn->prepare($query);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
?>

<form method="get">
    Provincia: <input type="text" name="provincia">
    Estrellas: <input type="number" name="estrellas">
    <input type="submit" value="Filtrar">
</form>

<h2>Listado de Hoteles</h2>
<a href="nuevo_hotel.php"> Añadir nuevo hotel</a>
<table border="1">
    <tr><th>ID</th><th>Nombre</th><th>Provincia</th><th>Estrellas</th></tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row["id"] ?></td>
        <td><?= $row["nombre"] ?></td>
        <td><?= $row["provincia"] ?></td>
        <td><?= $row["estrellas"] ?></td>
    </tr>
    <?php endwhile; ?>
</table>

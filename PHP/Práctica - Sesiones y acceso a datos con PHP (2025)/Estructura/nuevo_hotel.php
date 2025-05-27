<?php
session_start();
if (!isset($_SESSION["usuario"])) {//Verifica si el usuario ha iniciado sesión
    header("Location: login.php");
    exit;
}
?>

<!--Muestra un formulario HTML que se envía a guardar_hotel.php-->
<form method="post" action="guardar_hotel.php">
    Nombre: <input type="text" name="nombre"><br>
    Provincia: <input type="text" name="provincia"><br>
    Estrellas: <input type="number" name="estrellas"><br>
    <input type="submit" value="Guardar hotel">
</form>

<?php
session_start(); // Inicia sesión (para guardar login del usuario)
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "hoteles");
    $login = $_POST["login"];
    $password = $_POST["password"];
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE login=? AND password=?");// Prepara la consulta para evitar inyecciones SQL
    $stmt->bind_param("ss", $login, $password);//Si se encuentra una coincidencia, se guarda el login en la sesión
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $_SESSION["usuario"] = $login;//Identifica al usuario en otras páginas. Si no se encuentra, se muestra un error.
        header("Location: index.php");
        exit;
    } else {
        $mensaje = "Credenciales incorrectas";
    }
}
?>

<form method="post">
    Usuario: <input type="text" name="login"><br>
    Contraseña: <input type="password" name="password"><br>
    <input type="submit" value="Entrar">
</form>
<p style="color:red;"><?= $mensaje ?></p>

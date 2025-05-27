<?php
session_start();
$tituloPagina = "Iniciar Sesión";
include("cabecera.inc");
include("basedatos.inc");

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM usuarios WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $stmt->bind_result($hash);
    if ($stmt->fetch() && password_verify($password, $hash)) {
        $_SESSION['usuario'] = $login;
        // Ruta absoluta basada en tu estructura
        header("Location: /Blog_Ciberseguridad/Estructura/index.php");
        exit;
    } else {
        $mensaje = "Usuario o contraseña incorrectos.";
    }
    $stmt->close();
}
?>
    <form name="form2" id="form2" action="pagina.php" method="post">
        <label>
            Nombre de Usuario: 
            <input type="text" name="user" id="user" required>
        </label>
        <label>
            Contraseña:
            <input type="password" name="password" pattern="[A-Za-z0-9]{8}[A-Za-z0-9]*" id="password" required>
        </label>
        <input type="submit" value="Iniciar Sesion" id="enviar">
        <h5 id="login"><a href="register.php">¿No tienes cuenta?</a></h5>
    </form>

    
    
</body>
</html>
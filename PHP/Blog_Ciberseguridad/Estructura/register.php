<?php
session_start();
$tituloPagina = "Registro de Usuario";
include("cabecera.inc");
include("basedatos.inc");

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = trim($_POST['login']);
    $password = $_POST['password'];
    $confirmar = $_POST['confirmar'];

    if ($password !== $confirmar) {
        $mensaje = "Las contraseñas no coinciden.";
    } else {
        $stmt = $conn->prepare("SELECT login FROM usuarios WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $mensaje = "El usuario ya existe.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO usuarios (login, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $login, $hash);
            if ($stmt->execute()) {
                // Registro exitoso, redirigir a login
                header("Location: /Blog_Ciberseguridad/Estructura/login.php");
                exit;
            } else {
                $mensaje = "Error al registrar el usuario.";
            }
        }
        $stmt->close();
    }
}
?>
    <form name="form" id="form" action="pagina.php" method="post">
        <label>
            Nombre de Usuario: 
            <input type="text" name="user" id="user" required>
        </label>
        <label>
            E-mail:
            <input type="email" name="email" id="email" required>
        </label>
        <label>
            Contraseña:
            <input type="password" name="password" pattern="[A-Za-z0-9]{8}[A-Za-z0-9]" id="password" required>
        </label>
        <label>
            Repetir contraseña :
            <input type="password" name="password2" id="password2" required>
        </label>
        <input type="submit" value="Registrar" id="enviar">
        <h5 id="login"><a href="login.php">¿Ya tienes cuenta?</a></h5>
    </form>
    
</body>
</html>
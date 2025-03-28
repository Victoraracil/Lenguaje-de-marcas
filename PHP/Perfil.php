<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--Crea la clasica pantalla de perfil de usuario al registrarse en una pagina-->
    <h1>Perfil de usuario</h1>
    <?php
        if (isset($_REQUEST['login'])) {
            $login = $_REQUEST['login'];
            $pass = $_REQUEST['pass'];
            if ($login == "admin" && $pass == "admin") {
                echo "Bienvenido administrador";
            } else {
                echo "Usuario o contraseña incorrectos";
            }
        }
    ?>
    <form action="Perfil.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" size="20"><br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" size="50"><br>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" size="50"><br>
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" id="telefono" size="50"><br>
        <input type="submit" value="Enviar" />
    </form>
    <?php
        if (isset($_REQUEST['nombre'])) {
            $nombre = $_REQUEST['nombre'];
            $apellidos = $_REQUEST['apellidos'];
            $email = $_REQUEST['email'];
            $telefono = $_REQUEST['telefono'];
            echo "Nombre: $nombre<br>";
            echo "Apellidos: $apellidos<br>";
            echo "Email: $email<br>";
            echo "Telefono: $telefono<br>";
        }
    ?>
</body>
</html>
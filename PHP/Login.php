<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Login</title>
</head>
<body>
    <h1>Ejercicio Login</h1>
        <form action="Perfil.php" method="post">
            <label for="login">Login:</label>
            <input type="text" name="login" id="login" size="20"><br>
            <label for="email">Password:</label>
            <input type="text" name="pass" id="pass" size="50"><br>
            <input type="submit" value="Enviar" />
        </form>
    <?php
        /*Basandote en el codigo html, crea una validacion de formilario en php.*/
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
</body>
</html>

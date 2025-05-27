<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($tituloPagina) ? $tituloPagina : 'Blog Educativo de Ciberseguridad'; ?></title>
    <link rel="icon" type="image/x-icon" href="icono.png">
    <link rel="stylesheet" href="CSS/styles.css">
    <script src="JS/inicio.js"></script>
    <script src="JS/consejos.js"></script>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="register">
                <?php if (isset($_SESSION['usuario'])): ?>
                    <span>Bienvenido, <?= $_SESSION['usuario'] ?> | <a href="logout.php">Cerrar sesión</a></span>
                <?php else: ?>
                    <a href="register.php">Registrate/Inicia Sesion</a>
                <?php endif; ?>
            </div>
            <h1>Blog Educativo de Ciberseguridad</h1>
            <nav class="navigation">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="categorias.php">Categorías</a></li>
                    <li><a href="consejos.php">Consejos</a></li>
                    <li><a href="formulario.php">Añadir</a></li>
                </ul>
            </nav>
        </div>
    </header>


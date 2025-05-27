<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: /Blog_Ciberseguridad/Estructura/login.php");
    exit;
}
$tituloPagina = "Añadir Consejo";
include("cabecera.inc");
?>

<main class="main-content">
    <div class="container">
        <h2>Añadir Consejo</h2>

        <?php if (isset($_GET['error'])): ?>
            <p style="color:red;">Error al insertar el consejo.</p>
        <?php endif; ?>

        <form action="insertar_consejo.php" method="POST" enctype="multipart/form-data">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>

            <label for="valoracion">Valoración (0-10):</label>
            <input type="number" id="valoracion" name="valoracion" min="0" max="10" required>

            <label for="efectividad">Efectividad (0-10):</label>
            <input type="number" id="efectividad" name="efectividad" min="0" max="10" required>

            <label for="tipo">Tipo:</label>
            <select id="tipo" name="tipo">
                <option value="Malware">Malware</option>
                <option value="Phishing">Phishing</option>
                <option value="Hacking Ético">Hacking Ético</option>
                <option value="Otro">Otro</option>
            </select>

            <label for="resumen">Breve resumen:</label>
            <input type="text" id="resumen" name="resumen" required>

            <label for="descripcion">Descripción detallada:</label>
            <textarea id="descripcion" name="descripcion" rows="5" required></textarea>

            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" accept="image/*">

            <br><br>
            <button type="submit">Guardar Consejo</button>
        </form>
    </div>
</main>

<footer class="footer">
    <div class="container">
        <p>© 2025 Blog Educativo de Ciberseguridad. Todos los derechos reservados.</p>
        <p>Contacto: victoraracil55@gmail.com -- 666828002</p>
        <p></p>
    </div>
</footer>

</body>
</html>

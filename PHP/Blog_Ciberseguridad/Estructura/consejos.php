<?php
session_start();
$tituloPagina = "Consejos de Ciberseguridad";
include("cabecera.inc");
include("basedatos.inc");

// Recoger parámetros GET
$busqueda = $_GET['busqueda'] ?? '';
$categoria = $_GET['categoria'] ?? '';
$valoracion = $_GET['valoracion'] ?? '';
$efectividad = $_GET['efectividad'] ?? '';

// Construcción dinámica de la consulta SQL
$sql = "SELECT * FROM consejos WHERE 1=1";
$params = [];
$types = "";

// Filtros de texto (búsqueda por título o resumen)
if ($busqueda !== '') {
    $sql .= " AND (titulo LIKE ? OR resumen LIKE ?)";
    $like = '%' . $busqueda . '%';
    $params[] = $like;
    $params[] = $like;
    $types .= "ss";
}

// Filtros por categoría y valores numéricos
if ($categoria !== '') {
    $sql .= " AND tipo = ?";
    $params[] = $categoria;
    $types .= "s";
}
if ($valoracion !== '') {
    $sql .= " AND valoracion >= ?";
    $params[] = (int)$valoracion;
    $types .= "i";
}
if ($efectividad !== '') {
    $sql .= " AND efectividad >= ?";
    $params[] = (int)$efectividad;
    $types .= "i";
}

$sql .= " ORDER BY fecha DESC";

$stmt = $conn->prepare($sql);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$resultado = $stmt->get_result();
?>

<main class="main-content">
    <div class="container">
        <h2>Consejos de Ciberseguridad</h2>

        <!-- Barra de búsqueda -->
        <form method="GET" style="margin-bottom: 10px;">
            <input type="text" name="busqueda" placeholder="Buscar por título o resumen" value="<?= htmlspecialchars($busqueda) ?>" style="width: 60%;">
            <button type="submit">Buscar</button>
            <button type="button" onclick="toggleFiltros()">Filtros</button>
            <a href="consejos.php"><button type="button">Limpiar</button></a>

            <!-- Filtros desplegables -->
            <div id="filtros-avanzados" style="margin-top: 10px; display: none; border: 1px solid #ccc; padding: 10px; border-radius: 8px;">
                <label for="categoria">Categoría:</label>
                <select name="categoria" id="categoria">
                    <option value="">-- Todas --</option>
                    <option value="Malware" <?= $categoria == "Malware" ? "selected" : "" ?>>Malware</option>
                    <option value="Phishing" <?= $categoria == "Phishing" ? "selected" : "" ?>>Phishing</option>
                    <option value="Hacking Ético" <?= $categoria == "Hacking Ético" ? "selected" : "" ?>>Hacking Ético</option>
                    <option value="Otro" <?= $categoria == "Otro" ? "selected" : "" ?>>Otro</option>
                </select>

                <label for="valoracion">Valoración mínima:</label>
                <input type="number" name="valoracion" id="valoracion" min="0" max="10" value="<?= htmlspecialchars($valoracion) ?>">

                <label for="efectividad">Efectividad mínima:</label>
                <input type="number" name="efectividad" id="efectividad" min="0" max="10" value="<?= htmlspecialchars($efectividad) ?>">
            </div>
        </form>

        <!-- Mostrar resultados -->
        <?php if ($resultado && $resultado->num_rows > 0): ?>
            <?php while ($fila = $resultado->fetch_assoc()): ?>
                <article class="consejo">
                    <h3><?= htmlspecialchars($fila['titulo']) ?></h3>
                    <p><strong>Autor:</strong> <?= htmlspecialchars($fila['autor']) ?> |
                       <strong>Categoría:</strong> <?= htmlspecialchars($fila['tipo']) ?> |
                       <strong>Valoración:</strong> <?= $fila['valoracion'] ?>/10 |
                       <strong>Efectividad:</strong> <?= $fila['efectividad'] ?>/10
                    </p>

                    <?php if (!empty($fila['imagen'])): ?>
                        <img src="<?= htmlspecialchars($fila['imagen']) ?>" alt="Imagen del consejo" style="max-width: 400px;">
                    <?php endif; ?>

                    <p><strong>Resumen:</strong> <?= htmlspecialchars($fila['resumen']) ?></p>
                    <p><?= nl2br(htmlspecialchars($fila['descripcion'])) ?></p>
                    <hr>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No se encontraron consejos que coincidan con los criterios.</p>
        <?php endif; ?>
    </div>
</main>

<script>
    function toggleFiltros() {
        const filtros = document.getElementById("filtros-avanzados");
        filtros.style.display = (filtros.style.display === "none" || filtros.style.display === "") ? "block" : "none";
    }
</script>

    <footer class="footer">
        <div class="container">
            <p>© 2025 Blog Educativo de Ciberseguridad. Todos los derechos reservados.</p>
            <p>Contacto: victoraracil55@gmail.com -- 666828002</p>
        </div>
    </footer>
</body>

</html>

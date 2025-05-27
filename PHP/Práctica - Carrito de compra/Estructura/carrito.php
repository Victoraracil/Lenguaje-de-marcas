<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'carrito');
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

// Eliminar artículo de la base de datos
if (isset($_GET['delete_articulo'])) {
    $id = intval($_GET['delete_articulo']);
    $conn->query("DELETE FROM articulos WHERE id = $id");
    header('Location: carrito.php');
    exit;
}

// Eliminar artículo del carrito (sesión)
if (isset($_GET['delete_carrito'])) {
    unset($_SESSION['articulos_carrito'][$_GET['delete_carrito']]);
    header('Location: carrito.php');
    exit;
}

// Vaciar todo el carrito
if (isset($_GET['vaciar_carrito'])) {
    unset($_SESSION['articulos_carrito']);
    header('Location: carrito.php');
    exit;
}

// Eliminar todos los artículos de la base de datos
if (isset($_GET['eliminar_todo'])) {
    $conn->query("DELETE FROM articulos");
    header('Location: carrito.php');
    exit;
}

// Añadir o actualizar artículo en la base de datos    falta añadir imagen como fondo de articulo (en vez de un fondo blanco, la imagen)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nuevo_articulo'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stmt = $conn->prepare("SELECT id FROM articulos WHERE nombre = ?");
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt = $conn->prepare("UPDATE articulos SET precio = ? WHERE nombre = ?");
        $stmt->bind_param("ds", $precio, $nombre);
    } else {
        $stmt = $conn->prepare("INSERT INTO articulos (nombre, precio) VALUES (?, ?)");
        $stmt->bind_param("sd", $nombre, $precio);
    }
    $stmt->execute();
    header('Location: carrito.php');
    exit;
}

// Añadir artículo al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comprar'])) {
    $nombre = $_POST['articulo'];
    $cantidad = intval($_POST['cantidad']);
    $stmt = $conn->prepare("SELECT id FROM articulos WHERE nombre = ?");
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $stmt->bind_result($id);
    if ($stmt->fetch()) {
        $_SESSION['articulos_carrito'][$id] = $cantidad;
    }
    header('Location: carrito.php');
    exit;
}

// Añadir artículo por drag & drop
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['arrastrar'])) {
    $id = intval($_POST['id']);
    if (isset($_SESSION['articulos_carrito'][$id])) {
        $_SESSION['articulos_carrito'][$id]++;
    } else {
        $_SESSION['articulos_carrito'][$id] = 1;
    }
    exit;
}

// Exportar CSV
if (isset($_GET['export_csv'])) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="articulos.csv"');
    $output = fopen("php://output", "w");
    fputcsv($output, ['id', 'nombre', 'precio']);
    $result = $conn->query("SELECT * FROM articulos");
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
    fclose($output);
    exit;
}

// Importar CSV
if (isset($_POST['importar_csv'])) {
    if (isset($_FILES['csv']) && $_FILES['csv']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['csv']['tmp_name'];

        if (($csv = fopen($file, 'r')) !== false) {
            fgetcsv($csv); // omitir cabecera

            while (($data = fgetcsv($csv)) !== false) {
                if (count($data) === 3) {
                    list($id, $nombre, $precio) = $data;
                    $stmt = $conn->prepare("REPLACE INTO articulos (id, nombre, precio) VALUES (?, ?, ?)");
                    $stmt->bind_param("isd", $id, $nombre, $precio);
                    $stmt->execute();
                }
            }

            fclose($csv);
            header('Location: carrito.php');
            exit;
        } else {
            echo "<p style='color:red;'>Error: No se pudo abrir el archivo CSV.</p>";
        }
    } else {
        echo "<p style='color:red;'>Error: No se ha subido el archivo correctamente.</p>";
    }
}
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito PHP</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div id="contenedor_articulos">
<?php
$result = $conn->query("SELECT * FROM articulos");
while($row = $result->fetch_assoc()) {
    echo '<div class="articulo" draggable="true" ondragstart="arrastrar(event)" data-id="' . $row['id'] . '">';
    echo '<a href="?delete_articulo=' . $row['id'] . '" class="delete"></a>';
    echo '<label class="nombre">' . htmlspecialchars($row['nombre']) . '</label>';
    echo '<label class="precio">' . htmlspecialchars($row['precio']) . ' €</label>';
    echo '</div>';
}
?>
</div>
<hr class="clear" />

<div id="contenedor_carrito">
  <div id="titulo_carrito">
      <span>Carrito</span>
  </div>
  <div id="barra_carrito">
      <div id="articulos_carrito" class="fondo"
           ondragover="event.preventDefault();"
           ondrop="soltarArticulo(event)">
      <?php
      if (!empty($_SESSION['articulos_carrito'])) {
          foreach ($_SESSION['articulos_carrito'] as $id => $cantidad) {
              $result = $conn->query("SELECT nombre FROM articulos WHERE id = $id");
              if ($row = $result->fetch_assoc()) {
                  echo '<div class="articulo">';
                  echo '<a href="?delete_carrito=' . $id . '" class="delete"></a>';
                  echo '<label class="nombre">' . htmlspecialchars($row['nombre']) . '</label>';
                  echo '<label class="cantidad">' . $cantidad . '</label>';
                  echo '</div>';
              }
          }
      }
      ?>
      </div>
  </div>
</div>
<hr class="clear" />

<div id="formularios">
    <div class="form">
        <p>Nuevo artículo</p>
        <form method="post">
            <input type="hidden" name="nuevo_articulo" value="1">
            <label>Nombre:</label><input type="text" name="nombre">
            <label>Precio:</label><input type="text" name="precio">
            <input type="submit" class="boton" value="Añadir o Actualizar">
        </form>
    </div>
    <div class="form">
        <p>Nueva compra</p>
        <form method="post">
            <input type="hidden" name="comprar" value="1">
            <label>Artículo:</label><input type="text" name="articulo">
            <label>Cantidad:</label><input type="text" name="cantidad">
            <input type="submit" class="boton" value="Comprar">
        </form>
    </div>
    <div class="form">
        <p>CSV</p>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="csv">
            <button type="submit" name="importar_csv">Importar CSV</button>
        </form>
        <a href="?export_csv=1">Exportar CSV</a>
    </div>
    <div class="form">
        <p>Acciones</p>
        <form method="post">
            <a href="?vaciar_carrito=1" class="boton">Vaciar carrito</a>
            <a href="?eliminar_todo=1" class="boton" onclick="return confirm('¿Eliminar todos los artículos del sistema?')">Eliminar todos los artículos</a>
        </form>
    </div>
</div>

<script>
function arrastrar(ev) {
    ev.dataTransfer.setData("text/plain", ev.target.getAttribute("data-id"));
}

function soltarArticulo(ev) {
    ev.preventDefault();
    const id = ev.dataTransfer.getData("text/plain");

    fetch('carrito.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'arrastrar=1&id=' + encodeURIComponent(id)
    }).then(() => window.location.reload());
}
</script>

</body>
</html>
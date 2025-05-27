<?php
session_start();
session_destroy();
// Ruta absoluta de regreso al inicio
header("Location: /Blog_Ciberseguridad/Estructura/index.php");
exit;
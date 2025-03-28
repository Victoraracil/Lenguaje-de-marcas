<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego - Registro de Partidas</title>
</head>
<body>
    <?php
    // Inicializar variables de partidas ganadas, empatadas y perdidas
    $ganadas = isset($_REQUEST["ganadas"]) ? intval($_REQUEST["ganadas"]) : 0;
    $empatadas = isset($_REQUEST["empatadas"]) ? intval($_REQUEST["empatadas"]) : 0;
    $perdidas = isset($_REQUEST["perdidas"]) ? intval($_REQUEST["perdidas"]) : 0;

    // Lógica del juego
    $opciones = ["piedra", "papel", "tijera"];
    $jugador = isset($_REQUEST["jugador"]) ? $_REQUEST["jugador"] : null;
    $maquina = $opciones[array_rand($opciones)];
    $resultado = "";

    if ($jugador) {
        if ($jugador === $maquina) {
            $resultado = "Empate";
            $empatadas++;
        } elseif (
            ($jugador === "piedra" && $maquina === "tijera") ||
            ($jugador === "papel" && $maquina === "piedra") ||
            ($jugador === "tijera" && $maquina === "papel")
        ) {
            $resultado = "Ganaste";
            $ganadas++;
        } else {
            $resultado = "Perdiste";
            $perdidas++;
        }
    }
    ?>

    <h1>Juego: Piedra, Papel o Tijera</h1>
    <form method="post">
        <label>
            Elige tu jugada:
            <select name="jugador">
                <option value="piedra">Piedra</option>
                <option value="papel">Papel</option>
                <option value="tijera">Tijera</option>
            </select>
        </label>
        <br><br>
        <input type="hidden" name="ganadas" value="<?= $ganadas ?>">
        <input type="hidden" name="empatadas" value="<?= $empatadas ?>">
        <input type="hidden" name="perdidas" value="<?= $perdidas ?>">
        <button type="submit">Jugar</button>
    </form>

    <?php if ($jugador): ?>
        <h2>Resultado</h2>
        <p>Tu jugada: <?= htmlspecialchars($jugador) ?></p>
        <p>Jugada de la máquina: <?= htmlspecialchars($maquina) ?></p>
        <p>Resultado: <?= $resultado ?></p>
    <?php endif; ?>

    <h2>Estadísticas</h2>
    <p>Partidas ganadas: <?= $ganadas ?></p>
    <p>Partidas empatadas: <?= $empatadas ?></p>
    <p>Partidas perdidas: <?= $perdidas ?></p>
</body>
</html>
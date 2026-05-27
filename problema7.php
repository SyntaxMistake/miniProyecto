<?php
require_once 'Utilidades.php';
$x = isset($_POST['x']) ? (int)$_POST['x'] : 0;

// Recopilar notas en un array (colección)
$notas = [];
for ($i = 1; $i <= $x; $i++) {
    if (isset($_POST["num{$i}"])) {
        $notas[] = (float)$_POST["num{$i}"];
    }
}

// Calcular estadísticas si hay notas ingresadas
$resultados = null;
if (count($notas) === $x && $x > 0) {
    $cantidad = count($notas);

    // Promedio
    $suma = 0;
    foreach ($notas as $nota) {
        $suma += $nota;
    }
    $promedio = $suma / $cantidad;

    // Nota mínima y máxima
    $minima = $notas[0];
    $maxima = $notas[0];
    foreach ($notas as $nota) {
        if ($nota < $minima) $minima = $nota;
        if ($nota > $maxima) $maxima = $nota;
    }

    // Desviación estándar (poblacional)
    $sumaCuadrados = 0;
    foreach ($notas as $nota) {
        $sumaCuadrados += ($nota - $promedio) ** 2;
    }
    $desviacion = sqrt($sumaCuadrados / $cantidad);

    $resultados = compact('promedio', 'minima', 'maxima', 'desviacion');
}
?>

<?= Utilidades::enlaceVolver('index.php') ?>

<div class="tarjeta">
    <h2>Problema #7 — Calculadora de Datos Estadísticos</h2>
    <p>Ingresa cuántas notas quieres calcular</p>

    <form method="POST" action="index.php?problema=7">
        <label>¿Cuántas notas desea calcular?</label>
        <input type="number" name="x" min="1"
               placeholder="Cantidad de notas"
               value="<?= htmlspecialchars($x) ?>"
               required>

        <?php if ($x > 0): ?>
        <div class="fila-5">
            <?php for ($i = 1; $i <= $x; $i++): ?>
                <input type="number"
                       name="num<?= $i ?>"
                       placeholder="N<?= $i ?>"
                       step="any" min="0"
                       value="<?= htmlspecialchars($_POST["num{$i}"] ?? '') ?>"
                       required>
            <?php endfor; ?>
        </div>
        <?php endif; ?>

        <button type="submit">Calcular</button>
    </form>

    <?php if ($resultados): ?>
    <div class="resultados">
        <h3>Resultados</h3>
        <table>
            <tr>
                <th>Promedio</th>
                <td><?= number_format($resultados['promedio'], 2) ?></td>
            </tr>
            <tr>
                <th>Desviación Estándar</th>
                <td><?= number_format($resultados['desviacion'], 2) ?></td>
            </tr>
            <tr>
                <th>Nota Mínima</th>
                <td><?= number_format($resultados['minima'], 2) ?></td>
            </tr>
            <tr>
                <th>Nota Máxima</th>
                <td><?= number_format($resultados['maxima'], 2) ?></td>
            </tr>
        </table>
    </div>
    <?php endif; ?>
</div>
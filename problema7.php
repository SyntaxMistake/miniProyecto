<?php
// Problema #7 — Calculadora de Datos Estadísticos
// El usuario elige cuántas notas ingresar (1-100)
// Calcula promedio, desviación estándar, mínima y máxima
require_once 'Utilidades.php';

// Validamos la cantidad de notas (entre 1 y 100)
$x = filter_var($_POST['x'] ?? 0, FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1, 'max_range' => 100]
]);
$x = $x === false ? 0 : $x; // Si no es válido, x = 0

$notas      = [];
$errores    = [];
$resultados = null;

// Solo procesamos si se envió el formulario con notas
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $x > 0 && isset($_POST['num1'])) {

    // Leemos y validamos cada nota
    for ($i = 1; $i <= $x; $i++) {
        $nota = Utilidades::validarNumero($_POST["num{$i}"] ?? '');
        // Las notas deben estar entre 0 y 100
        if ($nota === null || $nota > 100) {
            $errores[] = "La nota #$i debe ser un número entre 0 y 100.";
        } else {
            $notas[] = $nota;
        }
    }

    // Calculamos estadísticas solo si todas las notas son válidas
    if (empty($errores) && count($notas) === $x) {
        $resultados = [
            'promedio'   => Utilidades::calcularMedia($notas),
            'desviacion' => Utilidades::calcularDesviacion($notas),
            'minima'     => min($notas),
            'maxima'     => max($notas),
        ];
    }
}
?>

<?= Utilidades::enlaceVolver('index.php') ?>

<div class="tarjeta">
    <h2>Problema #7 — Calculadora de Datos Estadísticos</h2>
    <p>Ingresa cuántas notas quieres calcular.</p>

    <form method="POST" action="index.php?problema=7">
        <label>¿Cuántas notas desea calcular?</label>
        <input type="number" name="x" min="1" max="100"
               placeholder="Cantidad de notas"
               value="<?= $x > 0 ? htmlspecialchars($x) : '' ?>"
               required>

        <?php if ($x > 0): ?>
            <div class="fila-5" style="margin-top:12px;">
                <?php for ($i = 1; $i <= $x; $i++): ?>
                    <input type="number"
                           name="num<?= $i ?>"
                           placeholder="Nota <?= $i ?>"
                           step="any" min="0" max="100"
                           value="<?= htmlspecialchars($_POST["num{$i}"] ?? '') ?>"
                           required>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

        <br>
        <button type="submit">Calcular</button>
    </form>
</div>

<?php if (!empty($errores)): ?>
    <div class="error">
        <?php foreach ($errores as $e): ?>
            <p>⚠ <?= htmlspecialchars($e) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if ($resultados): ?>
    <div class="tarjeta">
        <h3>Resultados</h3>
        <table>
            <tr><th>Promedio</th>            <td><?= number_format($resultados['promedio'],   2) ?></td></tr>
            <tr><th>Desviación Estándar</th> <td><?= number_format($resultados['desviacion'], 2) ?></td></tr>
            <tr><th>Nota Mínima</th>         <td><?= number_format($resultados['minima'],     2) ?></td></tr>
            <tr><th>Nota Máxima</th>         <td><?= number_format($resultados['maxima'],     2) ?></td></tr>
        </table>
    </div>
<?php endif; ?>
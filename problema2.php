<?php
require_once 'Utilidades.php';

<<<<<<< HEAD
$suma = 0;
for ($i = 1; $i <= 1000; $i++) {
    $suma += $i;
=======
$errores   = [];
$multiplos = [];
$n         = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $valorRaw = $_POST['n'] ?? '';

    // Validamos que sea un número entero positivo
    $n = filter_var($valorRaw, FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1, 'max_range' => 500]
    ]);

    if ($n === false) {
        $errores[] = "Ingresa un número entero entre 1 y 500.";
    } else {

        // Generamos los múltiplos con un bucle for
        for ($i = 1; $i <= $n; $i++) {
            $resultado = 4 * $i;

            // Detectamos desbordamiento
            if ($resultado > PHP_INT_MAX) {
                $errores[] = "Desbordamiento detectado en i = $i.";
                break;
            }

            $multiplos[] = $resultado;
        }
    }
>>>>>>> a6f92529a66d42f0033f91392c24dbf3addeca5a
}
?>

<?= Utilidades::enlaceVolver('index.php') ?>

<div class="tarjeta">
    <h2>Problema #3 — N primeros múltiplos de 4</h2>
    <p>Ingresa cuántos múltiplos de 4 quieres ver (máximo 500).</p>

<<<<<<< HEAD
    <table>
        <tr><th>Rango</th>     <td>Del 1 al 1,000</td></tr>
        <tr><th>Resultado</th> <td><strong><?= number_format($suma) ?></strong></td></tr>
    </table>
</div>
=======
    <form method="POST" action="index.php?problema=3">
        <label>Cantidad de múltiplos (N):</label>
        <input type="number" name="n"
               placeholder="Ej: 10"
               min="1" max="500"
               value="<?= htmlspecialchars($_POST['n'] ?? '') ?>"
               required>
        <br><br>
        <button type="submit">Generar</button>
    </form>
</div>

<?php if (!empty($errores)): ?>
    <div class="error">
        <?php foreach ($errores as $e): ?>
            <p>⚠ <?= htmlspecialchars($e) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if (!empty($multiplos)): ?>
    <div class="tarjeta">
        <h3>Primeros <?= $n ?> múltiplos de 4</h3>
        <div class="multiplos">
            <?php foreach ($multiplos as $i => $m): ?>
                <span class="badge">
                    4 × <?= $i + 1 ?> = <?= number_format($m) ?>
                </span>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
>>>>>>> a6f92529a66d42f0033f91392c24dbf3addeca5a

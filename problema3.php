<?php
// Problema #3 — N primeros múltiplos de 4
// El usuario ingresa N y se generan los primeros N múltiplos de 4
require_once 'Utilidades.php';

$errores   = [];
$multiplos = [];
$n         = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validamos que N sea entero entre 1 y 500
    $n = filter_var($_POST['n'] ?? '', FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1, 'max_range' => 500]
    ]);

    if ($n === false) {
        $errores[] = "Ingresa un número entero entre 1 y 500.";
    } else {
        // Generamos los múltiplos con un for: 4×1, 4×2, ... 4×N
        for ($i = 1; $i <= $n; $i++) {
            $multiplos[] = 4 * $i;
        }
    }
}
?>

<?= Utilidades::enlaceVolver('index.php') ?>

<div class="tarjeta">
    <h2>Problema #3 — N primeros múltiplos de 4</h2>
    <p>Ingresa cuántos múltiplos de 4 quieres ver.</p>

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
            <p><?= htmlspecialchars($e) ?></p>
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
<?php
require_once 'Utilidades.php';

// Calculamos la suma con un bucle for
$suma = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $n = filter_var($_POST['n'] ?? '', FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1, 'max_range' => 500]
    ]);

    if ($n === false) {
        $errores[] = "Ingresa un número entero entre 1 y 500.";
    } else {
        for ($i = 1; $i <= $n; $i++) {
            $multiplos[] = 4 * $i;
        }
    }
}
?>

<!-- Enlace para volver al menú (DRY) -->
<?= Utilidades::enlaceVolver('index.php') ?>

<div class="tarjeta">
    <h2>Problema #2 — Suma del 1 al 1,000</h2>
    <p>Se suman todos los números del 1 al 1,000 usando un bucle <code>for</code>.</p>

    <table>
        <tr><th>Rango</th>        <td>Del 1 al 1,000</td></tr>
        <tr><th>Estructura</th>   <td>for ($i = 1; $i &lt;= 1000; $i++)</td></tr>
        <tr><th>Resultado</th>    <td><strong><?= number_format($suma) ?></strong></td></tr>
    </table>
</div>

<?php
require_once 'Utilidades.php';

$sumaPar   = 0;
$sumaImpar = 0;

// Recorremos del 1 al 200 con un for
// Usamos switch para separar pares e impares
for ($i = 1; $i <= 200; $i++) {

    switch ($i % 2) {
        case 0:
            // Es par (el residuo de dividir entre 2 es 0)
            $sumaPar += $i;
            break;
        default:
            // Es impar
            $sumaImpar += $i;
            break;
    }
}
?>

<?= Utilidades::enlaceVolver('index.php') ?>

<div class="tarjeta">
    <h2>Problema #4 — Suma de pares e impares del 1 al 200</h2>
    <p>Se recorren los números del 1 al 200 con un <code>for</code> y se usa <code>switch</code> para separar pares e impares.</p>

    <table>
        <tr><th>Suma de números pares</th>   <td><?= number_format($sumaPar) ?></td></tr>
        <tr><th>Suma de números impares</th> <td><?= number_format($sumaImpar) ?></td></tr>
        <tr><th>Suma total</th>              <td><?= number_format($sumaPar + $sumaImpar) ?></td></tr>
    </table>
</div>
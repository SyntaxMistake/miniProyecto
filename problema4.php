<?php
require_once 'Utilidades.php';

$sumaPar   = 0;
$sumaImpar = 0;

for ($i = 1; $i <= 200; $i++) {
    switch ($i % 2) {
        case 0:
            $sumaPar += $i;
            break;
        default:
            $sumaImpar += $i;
            break;
    }
}
?>

<?= Utilidades::enlaceVolver('index.php') ?>

<div class="tarjeta">
    <h2>Problema #4 — Suma de pares e impares del 1 al 200</h2>

    <table>
        <tr><th>Suma de números pares</th>   <td><?= number_format($sumaPar) ?></td></tr>
        <tr><th>Suma de números impares</th> <td><?= number_format($sumaImpar) ?></td></tr>
        <tr><th>Suma total</th>              <td><?= number_format($sumaPar + $sumaImpar) ?></td></tr>
    </table>
</div>
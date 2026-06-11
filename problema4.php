<?php
// Problema #4 — Suma de pares e impares del 1 al 200
// Usa for + switch para separar pares e impares
require_once 'Utilidades.php';

$sumaPar   = 0;
$sumaImpar = 0;

// Recorremos del 1 al 200
for ($i = 1; $i <= 200; $i++) {
    // $i % 2 calcula el residuo: 0 = par, 1 = impar
    switch ($i % 2) {
        case 0:
            // Número par
            $sumaPar += $i;
            break;
        default:
            // Número impar
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
        <!-- La suma total se calcula directo en la vista -->
        <tr><th>Suma total</th>              <td><?= number_format($sumaPar + $sumaImpar) ?></td></tr>
    </table>
</div>
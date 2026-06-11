<?php
// Problema #2 — Suma del 1 al 1,000
// Usa un for para acumular la suma
require_once 'Utilidades.php';

$suma = 0;

// Recorremos del 1 al 1000 sumando cada número
for ($i = 1; $i <= 1000; $i++) {
    $suma += $i; // acumulador
}
?>

<?= Utilidades::enlaceVolver('index.php') ?>

<div class="tarjeta">
    <h2>Problema #2 — Suma del 1 al 1,000</h2>

    <table>
        <tr><th>Rango</th>     <td>Del 1 al 1,000</td></tr>
        <tr><th>Resultado</th> <td><strong><?= number_format($suma) ?></strong></td></tr>
    </table>
</div>
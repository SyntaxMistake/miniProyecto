<?php
require_once 'Utilidades.php';

$suma = 0;
for ($i = 1; $i <= 1000; $i++) {
    $suma += $i;
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
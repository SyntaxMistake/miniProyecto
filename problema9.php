<?php
require_once 'Utilidades.php';

$base = filter_var($_POST['base'] ?? 4, FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1, 'max_range' => 9]
]);
$base = $base === false ? 4 : $base;

$potencias = [];
for ($i = 1; $i <= 15; $i++) {
    $potencias[] = [
        'exp'       => $i,
        'resultado' => Utilidades::calcularPotencia($base, $i),
    ];
}
?>

<?= Utilidades::enlaceVolver('index.php') ?>

<div class="tarjeta">
    <h2>Problema #9 — Primeras 15 potencias</h2>
    <p>Selecciona una base del 1 al 9.</p>

    <div class="radio-wrap mb-3">
        <?php for ($n = 1; $n <= 9; $n++): ?>
            <input type="radio" name="base"
                   id="b<?= $n ?>" value="<?= $n ?>"
                   <?= $n === $base ? 'checked' : '' ?>
                   onchange="calcularPotencias(<?= $n ?>)">
            <label for="b<?= $n ?>"><?= $n ?></label>
        <?php endfor; ?>
    </div>

    <table id="tablaPotencias" style="width:auto; font-size:13px;">
        <thead>
            <tr>
                <th style="width:40px; padding:4px 8px;">#</th>
                <th style="width:80px; padding:4px 8px;">Expresión</th>
                <th style="width:100px; padding:4px 8px;">Resultado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($potencias as $p): ?>
                <tr>
                    <td style="padding:3px 8px;"><?= $p['exp'] ?></td>
                    <td style="padding:3px 8px;">
                        <span class="badge">
                            <?= $base ?><sup><?= $p['exp'] ?></sup>
                        </span>
                    </td>
                    <td style="padding:3px 8px;"><?= number_format($p['resultado'], 0, '.', ',') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
function calcularPotencias(base) {
    const tbody = document.querySelector('#tablaPotencias tbody');
    tbody.innerHTML = '';
    for (let i = 1; i <= 15; i++) {
        const resultado = Math.pow(base, i);
        tbody.innerHTML += `
            <tr>
                <td style="padding:3px 8px;">${i}</td>
                <td style="padding:3px 8px;">
                    <span class="badge">${base}<sup>${i}</sup></span>
                </td>
                <td style="padding:3px 8px;">${resultado.toLocaleString()}</td>
            </tr>`;
    }
}
</script>
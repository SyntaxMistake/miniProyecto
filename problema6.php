<?php
// Problema #6 — Presupuesto hospitalario
// Distribuye el presupuesto entre 3 áreas con porcentajes fijos
require_once 'Utilidades.php';

$errores      = [];
$distribucion = [];
$presupuesto  = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validamos que el presupuesto sea un número positivo
    $presupuesto = Utilidades::validarNumero($_POST['presupuesto'] ?? '');

    if ($presupuesto === null || $presupuesto <= 0) {
        $errores[] = "Ingresa un presupuesto válido mayor que 0.";
    } else {
        // Arreglo de áreas con sus porcentajes en decimal
        $areas = [
            ['nombre' => 'Ginecología',   'pct' => 0.40],
            ['nombre' => 'Traumatología', 'pct' => 0.35],
            ['nombre' => 'Pediatría',     'pct' => 0.25],
        ];

        // Calculamos el monto de cada área con foreach
        foreach ($areas as $area) {
            $distribucion[] = [
                'nombre' => $area['nombre'],
                'pct'    => $area['pct'] * 100,            
                'monto'  => $presupuesto * $area['pct'], 
            ];
        }
    }
}
?>

<?= Utilidades::enlaceVolver('index.php') ?>

<div class="tarjeta">
    <h2>Problema #6 — Presupuesto hospitalario</h2>
    <p>Ingresa el presupuesto anual del hospital. Se distribuirá entre las 3 áreas.</p>

    <table>
        <tr><th>Área</th>          <th>Porcentaje</th></tr>
        <tr><td>Ginecología</td>   <td>40%</td></tr>
        <tr><td>Traumatología</td> <td>35%</td></tr>
        <tr><td>Pediatría</td>     <td>25%</td></tr>
    </table>
    <br>

    <form method="POST" action="index.php?problema=6">
        <label>Presupuesto anual ($):</label>
        <input type="number" name="presupuesto"
               placeholder="Ej: 20000"
               min="1" step="any"
               value="<?= htmlspecialchars($_POST['presupuesto'] ?? '') ?>"
               required>
        <br><br>
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

<?php if (!empty($distribucion)): ?>
    <div class="tarjeta">
        <h3>Distribución del presupuesto: $<?= number_format($presupuesto, 2) ?></h3>
        <table>
            <tr><th>Área</th><th>Porcentaje</th><th>Monto</th></tr>
            <?php foreach ($distribucion as $d): ?>
                <tr>
                    <!-- htmlspecialchars protege la salida contra XSS (OWASP) -->
                    <td><?= htmlspecialchars($d['nombre']) ?></td>
                    <td><?= $d['pct'] ?>%</td>
                    <td>$<?= number_format($d['monto'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Gráfica de pastel con Chart.js -->
    <div class="tarjeta">
        <h3>Gráfica</h3>
        <canvas id="graficaPresupuesto" width="400" height="300"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById('graficaPresupuesto'), {
            type: 'pie',
            data: {
                labels: ['Ginecología (40%)', 'Traumatología (35%)', 'Pediatría (25%)'],
                datasets: [{
                    data: [
                        <?= $distribucion[0]['monto'] ?>,
                        <?= $distribucion[1]['monto'] ?>,
                        <?= $distribucion[2]['monto'] ?>
                    ],
                    backgroundColor: ['#378ADD', '#EF9F27', '#D85A30']
                }]
            },
            options: {
                responsive: false,
                plugins: { legend: { position: 'bottom' } }
            }
        });
    </script>
<?php endif; ?>
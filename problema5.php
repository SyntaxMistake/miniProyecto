<?php
require_once 'Utilidades.php';

$errores    = [];
$personas   = [];
$conteo     = ['Niño' => 0, 'Adolescente' => 0, 'Adulto' => 0, 'Adulto mayor' => 0];
$resultados = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Leemos las 5 edades
    for ($i = 1; $i <= 5; $i++) {
        $valorRaw = $_POST["edad{$i}"] ?? '';
        $edad     = filter_var($valorRaw, FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 0, 'max_range' => 120]
        ]);

        if ($edad === false) {
            $errores[] = "La edad #$i debe ser un número entre 0 y 120.";
        } else {
            // Clasificamos con if
            if ($edad <= 12) {
                $categoria = 'Niño';
            } elseif ($edad <= 17) {
                $categoria = 'Adolescente';
            } elseif ($edad <= 64) {
                $categoria = 'Adulto';
            } else {
                $categoria = 'Adulto mayor';
            }

            $personas[] = ['edad' => $edad, 'categoria' => $categoria];
            $conteo[$categoria]++;
        }
    }

    if (empty($errores)) {
        $resultados = true;
    }
}
?>

<?= Utilidades::enlaceVolver('index.php') ?>

<div class="tarjeta">
    <h2>Problema #5 — Clasificar edades</h2>
    <p>Ingresa la edad de 5 personas. Se clasificará cada una en su categoría.</p>

    <form method="POST" action="index.php?problema=5">
        <label>Edades de las 5 personas:</label>
        <div class="fila-5">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <input type="number" name="edad<?= $i ?>"
                       placeholder="Edad <?= $i ?>"
                       min="0" max="120"
                       value="<?= htmlspecialchars($_POST["edad{$i}"] ?? '') ?>"
                       required>
            <?php endfor; ?>
        </div>
        <button type="submit">Clasificar</button>
    </form>
</div>

<?php if (!empty($errores)): ?>
    <div class="error">
        <?php foreach ($errores as $e): ?>
            <p>⚠ <?= htmlspecialchars($e) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if ($resultados): ?>

    <div class="tarjeta">
        <h3>Clasificación</h3>
        <?php foreach ($personas as $i => $p): ?>
            <p>
                Persona <?= $i + 1 ?>:
                <strong><?= $p['edad'] ?> años</strong> —
                <span class="tag tag-<?= strtolower(str_replace(' ', '-', $p['categoria'])) ?>">
                    <?= $p['categoria'] ?>
                </span>
            </p>
        <?php endforeach; ?>
    </div>

    <div class="tarjeta">
        <h3>Estadísticas</h3>
        <table>
            <?php foreach ($conteo as $cat => $cantidad): ?>
                <tr>
                    <th><?= $cat ?></th>
                    <td><?= $cantidad ?> persona(s)</td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="tarjeta">
        <h3>Gráfica</h3>
        <canvas id="grafica" width="400" height="250"></canvas>
    </div>

    <!-- Chart.js para la gráfica -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById('grafica'), {
            type: 'bar',
            data: {
                labels: ['Niño', 'Adolescente', 'Adulto', 'Adulto mayor'],
                datasets: [{
                    label: 'Personas',
                    data: [
                        <?= $conteo['Niño'] ?>,
                        <?= $conteo['Adolescente'] ?>,
                        <?= $conteo['Adulto'] ?>,
                        <?= $conteo['Adulto mayor'] ?>
                    ],
                    backgroundColor: ['#60a5fa', '#a78bfa', '#34d399', '#fbbf24']
                }]
            },
            options: {
                responsive: false,
                scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
            }
        });
    </script>

<?php endif; ?>
<?php
// Problema #1 — Estadísticas de 5 números
// Calcula media, desviación estándar, mínimo y máximo
require_once 'Utilidades.php';

// Variables iniciales
$errores    = [];
$numeros    = [];
$resultados = null;

// Procesamos el formulario solo si fue enviado por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Leemos y validamos los 5 números
    for ($i = 1; $i <= 5; $i++) {
        $valor  = $_POST["num{$i}"] ?? '';
        $numero = Utilidades::validarNumero($valor); // Valida que sea positivo

        if ($numero === null) {
            $errores[] = "El número #$i debe ser positivo.";
        } else {
            $numeros[] = $numero;
        }
    }

    // Si no hay errores calculamos los resultados
    if (empty($errores)) {
        $resultados = [
            'numeros' => $numeros,
            'media'   => Utilidades::calcularMedia($numeros),
            'desv'    => Utilidades::calcularDesviacion($numeros),
            'minimo'  => min($numeros),
            'maximo'  => max($numeros),
        ];
    }
}
?>

<!-- Enlace para volver al menú -->
<?= Utilidades::enlaceVolver('index.php') ?>

<div class="tarjeta">
    <h2>Problema #1 — Estadísticas de 5 números</h2>
    <p>Ingresa 5 números positivos.</p>

    <form method="POST" action="index.php?problema=1">
        <label>Los 5 números:</label>
        <div class="fila-5">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <!-- htmlspecialchars previene XSS al transformar el valor -->
                <input type="number" name="num<?= $i ?>"
                       placeholder="N<?= $i ?>"
                       step="any" min="0"
                       value="<?= htmlspecialchars($_POST["num{$i}"] ?? '') ?>"
                       required>
            <?php endfor; ?>
        </div>
        <button type="submit">Calcular</button>
    </form>
</div>

<!-- Mostramos errores si los hay -->
<?php if (!empty($errores)): ?>
    <div class="error">
        <?php foreach ($errores as $e): ?>
            <p><?= htmlspecialchars($e) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<!-- Mostramos resultados solo si el cálculo fue exitoso -->
<?php if ($resultados): ?>
    <div class="tarjeta">
        <h3>Resultados</h3>
        <table>
            <tr><th>Números</th>        <td><?= implode(', ', $resultados['numeros']) ?></td></tr>
            <tr><th>Media</th>          <td><?= number_format($resultados['media'], 4) ?></td></tr>
            <tr><th>Desv. estándar</th> <td><?= number_format($resultados['desv'],  4) ?></td></tr>
            <tr><th>Mínimo</th>         <td><?= number_format($resultados['minimo'], 2) ?></td></tr>
            <tr><th>Máximo</th>         <td><?= number_format($resultados['maximo'], 2) ?></td></tr>
        </table>
    </div>
<?php endif; ?>
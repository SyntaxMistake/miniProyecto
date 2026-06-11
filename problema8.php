<?php
// Problema #8 — Estación del año
// El usuario ingresa una fecha y se determina la estación
// La lógica está en Utilidades::obtenerEstacion
require_once 'Utilidades.php';

$resultado  = null;
$fechaInput = date('Y-m-d'); // Fecha de hoy como valor por defecto

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['trip-start'])) {
    // Sanitizamos la fecha antes de procesarla
    $fechaInput = Utilidades::limpiar($_POST['trip-start']);
    // La lógica de estaciones está en Utilidades
    $resultado  = Utilidades::obtenerEstacion($fechaInput);
}

// Arreglo asociativo: clave = nombre estación, valor = imagen y rango
$datos = [
    'Verano'    => ['img' => 'imagenes/verano.jpg',    'rango' => 'Del 21 de diciembre al 20 de marzo'],
    'Otoño'     => ['img' => 'imagenes/otono.webp',    'rango' => 'Del 21 de marzo al 21 de junio'],
    'Invierno'  => ['img' => 'imagenes/invierno.jpg',  'rango' => 'Del 22 de junio al 22 de setiembre'],
    'Primavera' => ['img' => 'imagenes/primavera.jpg', 'rango' => 'Del 23 de setiembre al 20 de diciembre'],
];
?>

<?= Utilidades::enlaceVolver('index.php') ?>

<div class="tarjeta">
    <h2>Problema #8 — Estación del año</h2>
    <p>Ingresa una fecha para conocer la estación del año correspondiente.</p>

    <form method="POST" action="index.php?problema=8">
        <label for="trip-start">Fecha:</label>
        <input type="date" id="trip-start" name="trip-start"
               value="<?= htmlspecialchars($fechaInput) ?>"
               min="2000-01-01" max="2099-12-31"
               required>
        <br><br>
        <button type="submit">Calcular</button>
    </form>
</div>

<!-- Mostramos resultado solo si el formulario fue enviado -->
<?php if ($resultado): $info = $datos[$resultado]; ?>
    <div class="tarjeta season-block">
        <!-- htmlspecialchars en src y alt protege contra XSS -->
        <img src="<?= htmlspecialchars($info['img']) ?>"
             alt="<?= htmlspecialchars($resultado) ?>">
        <div class="season-info">
            <div class="est-nombre"><?= htmlspecialchars($resultado) ?></div>
            <div class="est-rango"><?= htmlspecialchars($info['rango']) ?></div>
        </div>
    </div>
<?php endif; ?>
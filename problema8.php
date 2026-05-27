<?php
require_once 'Utilidades.php';
?>
<?= Utilidades::enlaceVolver('index.php') ?>
<div class="tarjeta">
    <h2>Problema #8 — Estación del Año</h2>
    <p>Ingresa una fecha y te devolvera la estación del año.</p>

    <div>
        <label for="start">Fecha:</label>

        <input
        type="date"
        id="start"
        name="trip-start"
        value="2018-07-22"
        min="2018-01-01"
        max="2018-12-31" />
        
    </div>
        <button type="submit">Calcular</button>

</div>
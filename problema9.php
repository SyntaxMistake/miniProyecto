<?php
require_once 'Utilidades.php';
?>
<?= Utilidades::enlaceVolver('index.php') ?>
<?php
$base     = isset($_POST['base']) ? (int)$_POST['base'] : 4;
$base     = max(1, min(9, $base));
$cantidad = 15;
 
$potencias = [];
for ($i = 1; $i <= $cantidad; $i++) {
    $potencias[] = [
        'exp'       => $i,
        'resultado' => pow($base, $i),
    ];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Potencias</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>


<header>
  <h1>Potencias de 4</h1>
  <p>Problema #9</p>
</header>
 
<div class="tarjeta">
  <h2>Las 15 primeras potencias del 1-9</h2>
  <p>4<sup>1</sup>, 4<sup>2</sup>, 4<sup>3</sup> … 4<sup>15</sup></p>
 
  <form method="POST" action="">
    <div class="radio-wrap">
      <?php for ($n = 1; $n <= 9; $n++): ?>
        <input
          type="radio"
          name="base"
          id="b<?= $n ?>"
          value="<?= $n ?>"
          <?= $n === $base ? 'checked' : '' ?>
        >
        <label for="b<?= $n ?>"><?= $n ?></label>
      <?php endfor; ?>
      <button type="submit">Calcular</button>
    </div>
  </form>
 
  <table>
    <thead>
      <tr><th>#</th><th>Expresión</th><th>Resultado</th></tr>
    </thead>
    <tbody>
      <?php foreach ($potencias as $p): ?>
      <tr>
        <td class="n"><?= $p['exp'] ?></td>
        <td><span class="badge"><?= $base ?><sup><?= $p['exp'] ?></sup></span></td>
        <td class="res"><?= number_format($p['resultado'], 0, '.', ',') ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</body>
</html>

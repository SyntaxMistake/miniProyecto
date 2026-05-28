<?php
require_once 'Utilidades.php';
?>
<?= Utilidades::enlaceVolver('index.php') ?>

<?php
function obtenerEstacion(string $fecha): string {
    [$y, $m, $d] = explode('-', $fecha);
    $md = (int)$m * 100 + (int)$d;
    if ($md >= 1221 || $md <= 320) return 'Verano';
    if ($md <= 621)  return 'Otoño';
    if ($md <= 922)  return 'Invierno';
    return 'Primavera';
}
 
$resultado = null;
$fechaInput = date('Y-m-d');
 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['trip-start'])) {
    $fechaInput = $_POST['trip-start'];
    $resultado  = obtenerEstacion($fechaInput);
}
 
$datos = [
    'Verano'    => ['img' => 'imagenes\verano.jpg',    'rango' => 'Del 21 de diciembre al 20 de marzo'],
    'Otoño'     => ['img' => 'imagenes\otono.webp',    'rango' => 'Del 21 de marzo al 21 de junio'],
    'Invierno'  => ['img' => 'imagenes\invierno.jpg',  'rango' => 'Del 22 de junio al 22 de setiembre'],
    'Primavera' => ['img' => 'imagenes\primavera.jpg', 'rango' => 'Del 23 de setiembre al 20 de diciembre'],
];
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

  <form method="POST" action="">
    <div>
      <label for="start">Fecha:</label>
      <input
        type="date"
        id="start"
        name="trip-start"
        value="<?= htmlspecialchars($fechaInput) ?>"
        min="2000-01-01"
        max="2099-12-31"
      />
    </div>
    <button type="submit">Calcular</button>
  </form>
  <?php if ($resultado): $info = $datos[$resultado]; ?>
  <div class="season-block">
    <img src="<?= htmlspecialchars($info['img']) ?>" alt="<?= htmlspecialchars($resultado) ?>">
    <div class="season-info">
      <div class="est-nombre"><?= htmlspecialchars($resultado) ?></div>
      <div class="est-rango"><?= htmlspecialchars($info['rango']) ?></div>
    </div>
  </div>
  <?php endif; ?>
</body>
</html>
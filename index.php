<?php
require_once 'Utilidades.php';

$problema = Utilidades::limpiar($_GET['problema'] ?? '');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mini Proyecto #2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <span>Desarrollo de Software VII</span>
</header>

<main>
<?php
switch ($problema) {
    case '1':
        require_once 'problema1.php';
        break;

    case '2':
        require_once 'problema2.php';
        break;

    case '3':
        require_once 'problema3.php';
        break;

    case '4':
        require_once 'problema4.php';
        break;

    case '5':
        require_once 'problema5.php';
        break;

    case '6':
        require_once 'problema6.php';
        break;
    
    case '7':
        require_once 'problema7.php';
        break;
    case '8':
        require_once 'problema8.php';
        break;
    case '9':
        require_once 'problema9.php';
        break;

    default:
        echo "<div class='tarjeta'>
                <h2>Mini Proyecto #2</h2>
                <p>Selecciona un problema:</p>
                <div class='menu'>
                    <a href='index.php?problema=1'>Problema #1 — Estadísticas</a>
                    <a href='index.php?problema=2'>Problema #2 — Suma del 1 al 1,000</a>
                    <a href='index.php?problema=3'>Problema #3 — Múltiplos de 4</a>
                    <a href='index.php?problema=4'>Problema #4 — Pares e impares</a>
                    <a href='index.php?problema=5'>Problema #5 — Clasificar edades</a>
                    <a href='index.php?problema=6'>Problema #6 — Presupuesto hospitalario</a>
                    <a href='index.php?problema=7'>Problema #7 — Calculadora de Datos Estadísticos</a>
                    <a href='index.php?problema=8'>Problema #8 — Estación del año</a>
                    <a href='index.php?problema=9'>Problema #9 — Solicitar un número (1 al 9)</a>

                </div>
            </div>";
        break;
}
?>
</main>

<?php require_once 'footer.php'; ?>
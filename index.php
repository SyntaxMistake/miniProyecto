<?php
require_once 'Utilidades.php';

$problema = Utilidades::limpiar($_GET['problema'] ?? '');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Proyecto #2</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="bg-primary text-white py-3 mb-4 shadow">
    <div class="container">
        <h1 class="h3 mb-0">Desarrollo de Software VII</h1>
    </div>
</header>

<main class="container mb-5">
<?php
switch ($problema) {
    case '1':
        require_once 'problema1.php';
        break;

    case '2':
        require_once 'problema3.php';
        break;

    case '3':
        require_once 'problema2.php';
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
        echo '<div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Mini Proyecto #2</h2>
                    <p class="card-text text-center text-muted mb-4">Selecciona un problema para resolver:</p>
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-4">
                            <a href="index.php?problema=1" class="btn btn-outline-primary w-100 text-start py-3">
                                <strong>Problema #1</strong><br>
                                <small class="text-muted">Estadísticas</small>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <a href="index.php?problema=2" class="btn btn-outline-primary w-100 text-start py-3">
                                <strong>Problema #2</strong><br>
                                <small class="text-muted">Suma del 1 al 1,000</small>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <a href="index.php?problema=3" class="btn btn-outline-primary w-100 text-start py-3">
                                <strong>Problema #3</strong><br>
                                <small class="text-muted">Múltiplos de 4</small>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <a href="index.php?problema=4" class="btn btn-outline-primary w-100 text-start py-3">
                                <strong>Problema #4</strong><br>
                                <small class="text-muted">Pares e impares</small>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <a href="index.php?problema=5" class="btn btn-outline-primary w-100 text-start py-3">
                                <strong>Problema #5</strong><br>
                                <small class="text-muted">Clasificar edades</small>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <a href="index.php?problema=6" class="btn btn-outline-primary w-100 text-start py-3">
                                <strong>Problema #6</strong><br>
                                <small class="text-muted">Presupuesto hospitalario</small>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <a href="index.php?problema=7" class="btn btn-outline-primary w-100 text-start py-3">
                                <strong>Problema #7</strong><br>
                                <small class="text-muted">Calculadora de Datos Estadísticos</small>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <a href="index.php?problema=8" class="btn btn-outline-primary w-100 text-start py-3">
                                <strong>Problema #8</strong><br>
                                <small class="text-muted">Estación del año</small>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <a href="index.php?problema=9" class="btn btn-outline-primary w-100 text-start py-3">
                                <strong>Problema #9</strong><br>
                                <small class="text-muted">Solicitar un número (1 al 9)</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>';
        break;
}
?>
</main>

<?php require_once 'footer.php'; ?>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
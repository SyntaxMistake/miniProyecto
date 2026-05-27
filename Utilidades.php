<?php
class Utilidades
{
    // Limpia texto para evitar XSS (OWASP)
    public static function limpiar(string $valor): string
    {
        return htmlspecialchars(trim($valor), ENT_QUOTES, 'UTF-8');
    }

    // Valida que sea número positivo
    public static function validarNumero(mixed $valor): ?float
    {
        $numero = filter_var($valor, FILTER_VALIDATE_FLOAT);
        if ($numero === false || $numero < 0) {
            return null;
        }
        return $numero;
    }

    // Calcula el promedio
    public static function calcularMedia(array $numeros): float
    {
        return array_sum($numeros) / count($numeros);
    }

    // Calcula la desviación estándar
    public static function calcularDesviacion(array $numeros): float
    {
        $media = self::calcularMedia($numeros);
        $suma  = 0;
        foreach ($numeros as $x) {
            $suma += pow($x - $media, 2);
        }
        return sqrt($suma / (count($numeros) - 1));
    }

    // Enlace para volver al menú (DRY)
    public static function enlaceVolver(string $url): string
    {
        return "<a href='" . self::limpiar($url) . "' class='btn-volver'>← Volver al menú</a>";
    }
}
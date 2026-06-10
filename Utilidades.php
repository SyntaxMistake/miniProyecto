<?php
class Utilidades
{
    public static function limpiar(string $valor): string
    {
        return htmlspecialchars(trim($valor), ENT_QUOTES, 'UTF-8');
    }

    public static function validarNumero(mixed $valor): ?float
    {
        $numero = filter_var($valor, FILTER_VALIDATE_FLOAT);
        if ($numero === false || $numero < 0) {
            return null;
        }
        return $numero;
    }

    public static function calcularMedia(array $numeros): float
    {
        return array_sum($numeros) / count($numeros);
    }

    public static function calcularDesviacion(array $numeros): float
    {
        $media = self::calcularMedia($numeros);
        $suma  = 0;
        foreach ($numeros as $x) {
            $suma += pow($x - $media, 2);
        }
        return sqrt($suma / (count($numeros) - 1));
    }

    public static function enlaceVolver(string $url): string
    {
        return "<a href='" . self::limpiar($url) . "' class='btn-volver'>← Volver al menú</a>";
    }

    public static function obtenerEstacion(string $fecha): string
    {
        [$y, $m, $d] = explode('-', $fecha);
        $md = (int)$m * 100 + (int)$d;

        if ($md >= 1221 || $md <= 320) return 'Verano';
        if ($md <= 621)                return 'Otoño';
        if ($md <= 922)                return 'Invierno';
        return 'Primavera';
    }

    public static function clasificarEdad(int $edad): string
    {
        if ($edad <= 12) return 'Niño';
        if ($edad <= 17) return 'Adolescente';
        if ($edad <= 64) return 'Adulto';
        return 'Adulto mayor';
    }

    public static function calcularPotencia(float $base, int $exp): float
    {
        return pow($base, $exp);
    }
}
<?php
/**
 * Clase Utilidades
 * Centraliza la lógica de negocio, validación y cálculos matemáticos.
 * Principio DRY: evita repetir código en cada problema.
 * Todos los métodos son estáticos — no se necesita instanciar la clase.
 */
class Utilidades
{
    /**
     * Sanitiza un texto eliminando espacios y caracteres peligrosos.
     * Previene ataques XSS - OWASP A03
     */
    public static function limpiar(string $valor): string
    {
        return htmlspecialchars(trim($valor), ENT_QUOTES, 'UTF-8');
    }

    /**
     * Valida que el valor sea un número decimal positivo.
     * Devuelve null si no es válido (para manejo de errores).
     */
    public static function validarNumero(mixed $valor): ?float
    {
        $numero = filter_var($valor, FILTER_VALIDATE_FLOAT);
        if ($numero === false || $numero < 0) {
            return null;
        }
        return $numero;
    }

    /**
     * Calcula el promedio de un arreglo de números.
     * Fórmula: suma de todos / cantidad de elementos
     */
    public static function calcularMedia(array $numeros): float
    {
        return array_sum($numeros) / count($numeros);
    }

    /**
     * Calcula la desviación estándar muestral.
     * Fórmula: sqrt( suma(x - media)² / (n - 1) )
     */
    public static function calcularDesviacion(array $numeros): float
    {
        $media = self::calcularMedia($numeros);
        $suma  = 0;
        foreach ($numeros as $x) {
            $suma += pow($x - $media, 2);
        }
        return sqrt($suma / (count($numeros) - 1));
    }

    
    // Genera el enlace HTML para volver al menú.
    public static function enlaceVolver(string $url): string
    {
        return "<a href='" . self::limpiar($url) . "' class='btn-volver'>← Volver al menú</a>";
    }

    /**
     * Determina la estación del año según la fecha.
     * Convierte mes+día a número para comparar rangos.
     * Ej: julio 15 → 715, diciembre 21 → 1221
     */
    public static function obtenerEstacion(string $fecha): string
    {
        [$y, $m, $d] = explode('-', $fecha);
        $md = (int)$m * 100 + (int)$d;

        if ($md >= 1221 || $md <= 320) return 'Verano';    // dic21 - mar20
        if ($md <= 621)                return 'Otoño';     // mar21 - jun21
        if ($md <= 922)                return 'Invierno';  // jun22 - sep22
        return 'Primavera';                                // sep23 - dic20
    }

    // Clasifica una edad en su categoría demográfica.
    public static function clasificarEdad(int $edad): string
    {
        if ($edad <= 12) return 'Niño';
        if ($edad <= 17) return 'Adolescente';
        if ($edad <= 64) return 'Adulto';
        return 'Adulto mayor';
    }

    // Calcula la potencia de un número.
    public static function calcularPotencia(float $base, int $exp): float
    {
        return pow($base, $exp);
    }
}
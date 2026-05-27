# Mini Proyecto #2 — Sentencias de Control y Clases en PHP

> **Desarrollo Web VII** · Universidad Tecnológica de Panamá  
> Facultad de Ingeniería en Sistemas Computacionales — Campus Víctor Levis Sasso  
> **Instructor:** Ing. Irina Fong  
> **Período de entrega:** 18 al 29 de mayo de 2026

---

## 📋 Descripción

Este proyecto implementa una aplicación web en **PHP con arquitectura MVC** que resuelve 9 problemas algorítmicos usando estructuras de control (if, switch, while, for, foreach), arreglos, funciones y clases. El HUB de navegación entre problemas se construye con **React** como framework de componentes de interfaz.

---

## 🛠️ Stack Tecnológico

| Capa                     | Tecnología          | Versión | Uso                                               |
| ------------------------ | ------------------- | ------- | ------------------------------------------------- |
| **Backend / Lógica**     | PHP                 | 8.x     | Lógica de negocio, estructuras de control, clases |
| **Frontend / HUB**       | React               | 18.x    | Menú principal, navegación entre problemas        |
| **Estilos**              | CSS3 / Tailwind CSS | 3.x     | Diseño visual, responsividad                      |
| **Gráficas**             | Chart.js            | 4.x     | Problema #5 (edades) y Problema #6 (presupuesto)  |
| **Servidor local**       | XAMPP / Laragon     | —       | Entorno PHP local (Apache + PHP)                  |
| **Control de versiones** | Git + GitHub        | —       | Repositorio y documentación                       |

---

## 📁 Estructura del Proyecto (MVC)

## 🧩 Problemas Implementados

| #   | Problema                                            | Estructuras clave                  |
| --- | --------------------------------------------------- | ---------------------------------- |
| 1   | Media, desviación estándar, mín y máx de 5 números  | `for`, `if`, funciones matemáticas |
| 2   | Suma de números del 1 al 1,000 (resultado: 500,500) | `for` / `while`                    |
| 3   | N primeros múltiplos de 4                           | `for`, operador ternario           |
| 4   | Suma de pares e impares entre 1 y 200               | `for`, `if-else`                   |
| 5   | Clasificación de edades + estadísticas + gráfica    | `switch`, `foreach`, Chart.js      |
| 6   | Distribución del presupuesto hospitalario + gráfica | `switch`, `foreach`, Chart.js      |
| 7   | Calculadora de datos estadísticos (notas dinámicas) | `foreach`, funciones matemáticas   |
| 8   | Estación del año según fecha ingresada              | `switch`, operador ternario        |
| 9   | 15 primeras potencias de un número (1–9)            | `for`, `pow()`                     |

---

## ⚙️ Clases Utilitarias

### `Utilidades` (métodos estáticos)

```php
// Sanitización XSS — OWASP A03:2021
public static function limpiarSalida(string $valor): string
// Valor seguro o default (NVL)
public static function nvl(&$var, $default = ""): mixed
// Enlace de navegación al menú
public static function enlaceMenu(string $url): string
// Footer con fecha dinámica
public static function fechaHoy(): string
```

### `Validacion` (métodos estáticos)

```php
public static function esNumero($valor): bool        // filter_var
public static function esEnteroPositivo($valor): bool
public static function validarRango($n, $min, $max): bool
public static function validarCSRF(): void
```

### `Matematicas` (métodos estáticos)

```php
public static function calcularMedia(array $datos): float
public static function calcularDesviacionEstandar(array $datos): float
public static function calcularPotencia($base, $exp): float  // pow()
public static function calcularRaiz($n): float               // sqrt()
```

---

## 🔒 Seguridad — Recomendaciones OWASP Aplicadas

| OWASP                       | Riesgo                         | Aplicación en el taller                                      |
| --------------------------- | ------------------------------ | ------------------------------------------------------------ |
| A03:2021 — Injection / XSS  | Inyección de scripts           | `htmlspecialchars()` en toda salida de datos del usuario     |
| A03:2021 — Input Validation | Datos inválidos del formulario | `Validacion::esNumero()` antes de procesar cualquier entrada |
| Gestión de errores segura   | Exposición de rutas internas   | `default` en todo `switch`; mensajes de error genéricos      |

---

## 📐 Principios y Estándares

- **PSR-1** — Clases en `StudlyCaps`, métodos y variables en `camelCase`
- **DRY** — Header, footer y componentes de navegación centralizados; penalización de 10 pts si se incumple
- **MVC** — Separación estricta de lógica de negocio y presentación
- **OWASP Top 10** — Validación, sanitización y gestión de errores segura

---

## 👥 Integrantes del Grupo

| Estudiante    | Cédula / ID | Rol |
| ------------- | ----------- | --- |
| Jose Barahona | 8-939-51    | —   |
| Shirley Wen   | 8-957-1526  | —   |

**Curso:** Desarrollo Web VII  
**Universidad:** Universidad Tecnológica de Panamá  
**Campus:** Víctor Levis Sasso  
**Fecha de realización:** Mayo 2026

---

> _"Código repetido es código mal diseñado."_ — Principio DRY

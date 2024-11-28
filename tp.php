<?php
function datosP() {
    return [
        [30, 28, 26, 22, 18, 12, 10, 14, 17, 20, 25, 29],
        [33, 30, 27, 22, 19, 13, 11, 15, 18, 21, 26, 31],
        [34, 32, 29, 21, 18, 14, 12, 16, 18, 21, 27, 32],
        [33, 31, 28, 22, 18, 13, 11, 14, 17, 22, 26, 31],
        [32, 30, 28, 22, 17, 12, 9, 13, 16, 20, 24, 30],
        [32, 30, 27, 23, 19, 14, 12, 11, 17, 23, 25, 29],
        [31, 29, 28, 21, 19, 13, 10, 12, 16, 22, 27, 29],
        [30, 28, 26, 20, 16, 12, 11, 13, 17, 21, 28, 30],
        [31, 29, 27, 21, 17, 12, 11, 15, 18, 22, 26, 30],
        [32, 30, 27, 20, 16, 13, 13, 15, 19, 23, 28, 31]
    ];
}

function mostrarMatriz($matriz) {
    foreach ($matriz as $fila) {
        echo implode(" ", $fila) . "\n";
    }
}

function traductorA($anio) {
    if ($anio < 2014 || $anio > 2023) {
        echo "Error: Año fuera de rango.\n";
        return -1;
    }
    return $anio - 2014;
}

function traductorMes($mes, $meses) {
    $indice = array_search($mes, $meses);
    if ($indice === false) {
        echo "Error: Mes inválido.\n";
        return -1;
    }
    return $indice;
}

function mostrarAnio($datosP, $indiceAnios, $meses) {
    echo "Temperaturas del año " . (2014 + $indiceAnios) . ":\n";
    foreach ($meses as $i => $mes) {
        echo "$mes: {$datosP[$indiceAnios][$i]}°C\n";
    }
}

function calculoPromPorMes($datosP, $indiceMes, $mes) {
    $suma = array_sum(array_column($datosP, $indiceMes));
    $promedio = $suma / count($datosP);
    echo "Promedio para $mes: $promedio°C\n";
}

function hallarMaxMin($datosP, $meses) {
    $max = -PHP_INT_MAX;
    $min = PHP_INT_MAX;
    $filaMax = $colMax = $filaMin = $colMin = 0;

    foreach ($datosP as $i => $fila) {
        foreach ($fila as $j => $valor) {
            if ($valor > $max) {
                $max = $valor;
                $filaMax = $i;
                $colMax = $j;
            }
            if ($valor < $min) {
                $min = $valor;
                $filaMin = $i;
                $colMin = $j;
            }
        }
    }

    echo "Temperatura máxima: $max°C en {$meses[$colMax]} de " . (2014 + $filaMax) . "\n";
    echo "Temperatura mínima: $min°C en {$meses[$colMin]} de " . (2014 + $filaMin) . "\n";
}

function crearMostrarPrimavera($datosP) {
    $primavera = array_map(fn($fila) => array_slice($fila, 9, 3), $datosP);
    mostrarMatriz($primavera);
}

function crearMostrarInvierno($datosP) {
    $invierno = array_map(fn($fila) => array_slice($fila, 5, 3), $datosP);
    mostrarMatriz($invierno);
}

// Programa principal
$meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
$datosP = datosP();

echo "Bienvenido al programa principal\n";
do {
    echo "¿Qué desea hacer?\n";
    echo "1. Mostrar la matriz completa\n";
    echo "2. Ingresar un año y un mes para ver su temperatura\n";
    echo "3. Ingresar un año y obtener todas las temperaturas de sus meses\n";
    echo "4. Ingresar un mes y obtener todas las temperaturas del año y su promedio\n";
    echo "5. Buscar y mostrar las temperaturas máximas y mínimas\n";
    echo "6. Mostrar datos de primavera\n";
    echo "7. Mostrar datos de invierno\n";
    echo "8. Salir\n";

    $opcion = intval(readline("Elija una opción: "));

    switch ($opcion) {
        case 1:
            mostrarMatriz($datosP);
            break;
        case 2:
            $anio = intval(readline("Ingrese el año (2014-2023): "));
            $mes = readline("Ingrese el mes: ");
            $indiceAnios = traductorA($anio);
            $indiceMeses = traductorMes($mes, $meses);
            if ($indiceAnios !== -1 && $indiceMeses !== -1) {
                echo "La temperatura en $mes de $anio fue de {$datosP[$indiceAnios][$indiceMeses]}°C\n";
            }
            break;
        case 3:
            $anio = intval(readline("Ingrese el año (2014-2023): "));
            $indiceAnios = traductorA($anio);
            if ($indiceAnios !== -1) {
                mostrarAnio($datosP, $indiceAnios, $meses);
            }
            break;
        case 4:
            $mes = readline("Ingrese el mes: ");
            $indiceMeses = traductorMes($mes, $meses);
            if ($indiceMeses !== -1) {
                calculoPromPorMes($datosP, $indiceMeses, $mes);
            }
            break;
        case 5:
            hallarMaxMin($datosP, $meses);
            break;
        case 6:
            crearMostrarPrimavera($datosP);
            break;
        case 7:
            crearMostrarInvierno($datosP);
            break;
        case 8:
            echo "Saliendo del programa.\n";
            break;
        default:
            echo "Opción no válida. Intente nuevamente.\n";
            break;
    }
} while ($opcion !== 8);

echo "Gracias por usar el programa.\n";

<?php
<?php

// Inicialización de datos predeterminados
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

// Mostrar matriz completa
function mostrarMatriz($matriz) {
    foreach ($matriz as $fila) {
        foreach ($fila as $valor) {
            echo $valor . " ";
        }
        echo "\n";
    }
}

// Traductor de año a índice
function traductorA($anio) {
    if ($anio < 2014 || $anio > 2023) {
        echo "Error: Año fuera de rango.\n";
        return -1;
    }
    return $anio - 2014;
}

// Traductor de mes a índice
function traductorMes($mes, $meses) {
    $indice = -1;
    for ($i = 0; $i < count($meses); $i++) {
        if ($meses[$i] === $mes) {
            $indice = $i;
            break;
        }
    }
    if ($indice === -1) {
        echo "Error: Mes inválido.\n";
    }
    return $indice;
}

// Calcular promedio por mes
function calculoPromPorMes($datosP, $indiceMes, $mes) {
    $suma = 0;
    $cantidadAnios = count($datosP);

    for ($i = 0; $i < $cantidadAnios; $i++) {
        $suma += $datosP[$i][$indiceMes];
    }
    $promedio = $suma / $cantidadAnios;

    echo "Promedio para " . $mes . ": " . $promedio . "\n";
}

// Mostrar temperaturas de un año
function mostrarAnio($datosP, $indiceAnios, $meses) {
    echo "Temperaturas del año " . (2014 + $indiceAnios) . ":\n";

    for ($j = 0; $j < count($meses); $j++) {
        echo $meses[$j] . ": " . $datosP[$indiceAnios][$j] . "°C\n";
    }
}

// Crear y mostrar matriz de primavera
function crearMostrarPrimavera($datosP) {
    $primavera = [];
    for ($i = 0; $i < count($datosP); $i++) {
        $primavera[$i] = [
            $datosP[$i][9],  // Octubre
            $datosP[$i][10], // Noviembre
            $datosP[$i][11]  // Diciembre
        ];
    }
    mostrarMatriz($primavera);
}

// Crear y mostrar matriz de invierno
function crearMostrarInvierno($datosP) {
    $invierno = [];
    for ($i = 0; $i < count($datosP); $i++) {
        $invierno[$i] = [
            $datosP[$i][5],  // Junio
            $datosP[$i][6],  // Julio
            $datosP[$i][7]   // Agosto
        ];
    }
    mostrarMatriz($invierno);
}

// Buscar temperatura máxima y mínima
function hallarMaxMin($datosP, $meses) {
    $max = -9999;
    $min = 9999;
    $filaMax = $colMax = $filaMin = $colMin = -1;

    for ($i = 0; $i < count($datosP); $i++) {
        for ($j = 0; $j < count($datosP[0]); $j++) {
            if ($datosP[$i][$j] > $max) {
                $max = $datosP[$i][$j];
                $filaMax = $i;
                $colMax = $j;
            }
            if ($datosP[$i][$j] < $min) {
                $min = $datosP[$i][$j];
                $filaMin = $i;
                $colMin = $j;
            }
        }
    }

    echo "Temperatura máxima: " . $max . "°C en " . $meses[$colMax] . " de " . (2014 + $filaMax) . "\n";
    echo "Temperatura mínima: " . $min . "°C en " . $meses[$colMin] . " de " . (2014 + $filaMin) . "\n";
}

// Programa Principal
$meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
$datosP = datosP();

// Ejemplo de uso
echo "Matriz completa:\n";
mostrarMatriz($datosP);

echo "\nPromedio para marzo:\n";
$indiceMes = traductorMes("marzo", $meses);
if ($indiceMes !== -1) {
    calculoPromPorMes($datosP, $indiceMes, "marzo");
}

echo "\nMostrar datos de primavera:\n";
crearMostrarPrimavera($datosP);

echo "\nMostrar datos de invierno:\n";
crearMostrarInvierno($datosP);

echo "\nTemperatura máxima y mínima:\n";
hallarMaxMin($datosP, $meses);

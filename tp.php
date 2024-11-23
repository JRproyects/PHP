<?php


//Logre descargar el archivo desde gitHub! 
// Y actualizar desde visualcode, bueno, casi, desde git
#genial lo pude ver

//a)
function cargaDatosModulo(){
$cargaDeDatos=[
    [30, 28, 26, 22, 18, 12, 10, 14, 17, 20, 25, 29], // 2014
    [33, 30, 27, 22, 19, 13, 11, 15, 18, 21, 26, 31], // 2015
    [34, 32, 29, 21, 18, 14, 12, 16, 18, 21, 27, 32], // 2016
    [33, 31, 28, 22, 18, 13, 11, 14, 17, 22, 26, 31], // 2017
    [32, 30, 28, 22, 17, 12, 9, 13, 16, 20, 24, 30],  // 2018
    [32, 30, 27, 23, 19, 14, 12, 11, 17, 23, 25, 29], // 2019
    [31, 29, 28, 21, 19, 13, 10, 12, 16, 22, 27, 29], // 2020
    [30, 28, 26, 20, 16, 12, 11, 13, 17, 21, 28, 30], // 2021
    [31, 29, 27, 21, 17, 12, 11, 15, 18, 22, 26, 30], // 2022
    [32, 30, 27, 20, 16, 13, 13, 15, 19, 23, 28, 31]  // 2023
];
return $cargaDeDatos;
}
$meses=[ "enero", "febrero", "marzo", "abril", "mayo", "junio",
"julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

    $cargaDeDatos=cargaDatosModulo();
//b)

function cargaDatosManuales($cargaDeDatos, $meses){
    print_r($cargaDeDatos);

    $cargaManual=[];
    //va a ser recomendable tener que sacar luego la array meses para ejecutarla en demás modulos y reutilizarla.
    foreach($meses as $indice){    
    echo"introducir la temperatura de $indice ";
    $temNueva=trim(fgets(STDIN));
    $cargaManual[]=$temNueva;
}
$cargaDeDatos[]=$cargaManual;
print_r($cargaDeDatos);
    
return $cargaManual;

}
$cargaManual=cargaDatosManuales($cargaDeDatos, $meses);

function traductor(){
     
}



// //C)Mostrar el contenido de la matriz por filas y columnas.<--- se podria mostrar con el print_r o era todo con echo?
// function muestraDeFyC($cargaManual,$cargaDeDatos){
//     $cargaDeDatos[]=2024<=$cargaManual;
//     print_r($cargaDeDatos);
//     #para poder solucionar el problema de que cuando añadamos más datos traves de la cargaManual los datos
//     #no se borren o que no queden guardados lo que se podria opatar es por convertir la array de cargaDeDatos
//     #en una array bidimencional en la que tenga asignados años para que simplemente al cargar otro dato de forma 
//     #manual lo que evitemos es que no aparescan los nuevos datos

//     return $cargaDeDatos;
// }

// $cargaDeDatos=muestraDeFyC($cargaManual,$cargaDeDatos);


// $arreglo = [31, 21, 12, 1, 5];
// $n = count($arreglo);
// echo($n);

// for ($i = 0; $i < $n; $i++) {
//     echo $arreglo[$i] . "\n";
// }

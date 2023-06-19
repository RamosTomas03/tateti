<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Ramos, Tomas. Legajo: FAI-4257. TUDW. mail: tomyram26@gmail.com. Usuario Github: RamosTomas03 */

/* Sanchez, Tomas. Legajo: FAI-4396. TUDW. mail: sancheznqn97@gmail.com. Usuario Github: TSanchez00 */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/** Funcion que carga el historial de juegos ya finalizados.
 * @return array
 */
    function cargarJuegos (){
        /* array $coleccionJuegos */
        $coleccionJuegos[0] = ["jugadorCruz"=>"MAJO", "jugadorCirculo"=>"PEPE", "puntosCruz"=>5, "puntosCirculo"=>0];
        $coleccionJuegos[1] = ["jugadorCruz"=>"JUAN", "jugadorCirculo"=>"MAJO", "puntosCruz"=>1, "puntosCirculo"=>1];
        $coleccionJuegos[2] = ["jugadorCruz"=>"ANA", "jugadorCirculo"=>"LISA", "puntosCruz"=>1, "puntosCirculo"=>1];
        $coleccionJuegos[3] = ["jugadorCruz"=>"MAJO", "jugadorCirculo"=>"TOMAS", "puntosCruz"=>4, "puntosCirculo"=>0];
        $coleccionJuegos[4] = ["jugadorCruz"=>"ANA", "jugadorCirculo"=>"JUAN", "puntosCruz"=>0, "puntosCirculo"=>5];
        $coleccionJuegos[5] = ["jugadorCruz"=>"PEPE", "jugadorCirculo"=>"LISA", "puntosCruz"=>1, "puntosCirculo"=>1];
        $coleccionJuegos[6] = ["jugadorCruz"=>"MAJO", "jugadorCirculo"=>"ANA", "puntosCruz"=>0, "puntosCirculo"=>3];
        $coleccionJuegos[7] = ["jugadorCruz"=>"JUAN", "jugadorCirculo"=>"TOMAS", "puntosCruz"=>0, "puntosCirculo"=>4];
        $coleccionJuegos[8] = ["jugadorCruz"=>"LISA", "jugadorCirculo"=>"ANA", "puntosCruz"=>1, "puntosCirculo"=>1];
        $coleccionJuegos[9] = ["jugadorCruz"=>"PEPE", "jugadorCirculo"=>"LUCAS", "puntosCruz"=>3, "puntosCirculo"=>0];
        return $coleccionJuegos;
    }


/** Funcion que muestra las opciones del menú en la pantalla
 * @return int
*/    
function seleccionarOpcion(){
    /* int $opcionElegida */
    echo "1. Jugar al tatetí \n
2. Mostrar un juego \n
3. Mostrar el primer juego ganado \n
4. Mostrar porcentaje de juegos ganados \n
5. Mostrar resumen de jugador \n
6. Mostrar listado de juegos ordenado por jugador O \n
7. Salir \n";
    echo "\n Selecione una opción: ";
    $opcionElegida = trim(fgets(STDIN));
    if ($opcionElegida < 0 && $opcionElegida > 8){
       echo "La opcion elegida no es valida.";
       do {
            echo "ingrese otra opción: ";
            $opcionElegida = trim(fgets(STDIN));
        }while($opcionElegida < 0 && $opcionElegida > 8);
    }
    return $opcionElegida; 
}


/** Funcion que valida si el numero ingresado esta dentro del rango.
 * esta dentro del archivo tateti.php, function solicitarNumeroEntre. Para usarla el echo tiene que estar por fuera de la función.
*/

/** Funcion que muestra en pantalla datos de un juego solicitado por el usuario.
 * @param array $coleccionJuegos
 * @param int $nroJuego
*/
function datosDeUnJuego ($coleccionJuegos, $nroJuego){
    /* array $juegoElegido 
    * int $nroIndice */
    $nroIndice = $nroJuego -1;
    $juegoElegido = $coleccionJuegos[$nroIndice];
    echo "**********************\n";
    if($juegoElegido["puntosCruz"] > $juegoElegido["puntosCirculo"]){
        echo "Juego TATETI: ", $nroJuego, "(gano X)\n";
        echo "Jugador X: ", $juegoElegido["jugadorCruz"]," obtuvo ", $juegoElegido["puntosCruz"], " puntos\n";
        echo "Jugador O: ", $juegoElegido["jugadorCirculo"], " obtuvo ", $juegoElegido["puntosCirculo"], " puntos\n";
    }elseif ($juegoElegido["puntosCruz"] < $juegoElegido["puntosCirculo"]){
        echo "Juego TATETI: ", $nroJuego, "(gano O)\n";
        echo "Jugador X: ", $juegoElegido["jugadorCruz"]," obtuvo ", $juegoElegido["puntosCruz"], " puntos\n";
        echo "Jugador O: ", $juegoElegido["jugadorCirculo"], " obtuvo ", $juegoElegido["puntosCirculo"], " puntos\n";
    }else {
        echo "Juego TATETI: ", $nroJuego, "(empate)\n";
        echo "Jugador X: ", $juegoElegido["jugadorCruz"]," obtuvo ", $juegoElegido["puntosCruz"], " puntos\n";
        echo "Jugador O: ", $juegoElegido["jugadorCirculo"], " obtuvo ", $juegoElegido["puntosCirculo"], " puntos\n";
    }
    echo "**********************\n";
}

/** Funcion que agrega un nuevo juego a la coleccion de juegos.
 * @param array $coleccionJuegos
 * @param array $nuevoJuego
 * @return array
*/
function agregarJuego ($coleccionJuegos, $nuevoJuego){
    array_push($coleccionJuegos, $nuevoJuego);
    return $coleccionJuegos;
}

/** Funcion que busca el primer juego ganado por un determinado jugador
 * @param array $coleccionJuegos
 * @param string $jugador
 * @return int
*/
function buscarJuegoGanado($coleccionJuegos, $jugador) {
    // int $indice, $totalJuegos, $juegoGanado, 
    // array $juego
    // boolean $esGanador
    $esGanador = false;
    $indice = 0;
    $totalJuegos = count($coleccionJuegos);
    $juegoGanado = -1;
    while ($indice < $totalJuegos && $esGanador != true) {
        $juego = $coleccionJuegos[$indice];
        if ($juego["jugadorCruz"] == $jugador && $juego["puntosCruz"] > $juego["puntosCirculo"]) {
            $juegoGanado = $indice;
            $esGanador = true;
        }elseif ($juego["jugadorCirculo"] == $jugador && $juego["puntosCirculo"] > $juego["puntosCruz"]) {
            $juegoGanado = $indice;
            $esGanador = true;
        }
        $indice = $indice +1;
    }
    //La funcion retorna -1 si el jugador elegido no ganó ningun juego
    return $juegoGanado;
}

/** Funcion que muestra el resumen de un jugador.
 * @param array $coleccionJuegos
 * @param string $jugador
 * @return array
 */
function resumenJugador($coleccionJuegos, $jugador){
    /* array $datosJugador
    * int $juegosGanados, $juegosPerdidos, $juegosEmpatados, $puntosAcum, $indice, $totalJuegos */
    $datosJugador = [];
    $juegosGanados = 0;
    $juegosPerdidos = 0;
    $juegosEmpatados = 0;
    $puntosAcum = 0;
    $indice = 0;
    $totalJuegos = count($coleccionJuegos);
    for ($indice = 0; $indice < $totalJuegos ; $indice++) { 
        $juego = $coleccionJuegos[$indice];
        if ($juego["jugadorCruz"] == $jugador && $juego["puntosCruz"] > $juego["puntosCirculo"]){
            $juegosGanados = $juegosGanados + 1;
            $puntosAcum = $puntosAcum + $juego["puntosCruz"];
        }elseif($juego["jugadorCruz"] == $jugador && $juego["puntosCruz"] < $juego["puntosCirculo"]){
            $juegosPerdidos = $juegosPerdidos + 1;
        }elseif($juego["jugadorCirculo"] == $jugador && $juego["puntosCruz"] < $juego["puntosCirculo"]){
            $juegosGanados = $juegosGanados + 1;
            $puntosAcum = $puntosAcum + $juego["puntosCirculo"];
        }elseif($juego["jugadorCirculo"] == $jugador && $juego["puntosCruz"] > $juego["puntosCirculo"]){
            $juegosPerdidos = $juegosPerdidos + 1;
        }elseif($juego["jugadorCruz"] == $jugador || $juego["jugadorCirculo"] == $jugador && $juego["puntosCruz"] = $juego["puntosCirculo"]){
            $juegosEmpatados = $juegosEmpatados + 1;
            $puntosAcum = $puntosAcum + 1;
        }
    }
    $datosJugador = ["nombre" => $jugador, 
    "juegosGanados" => $juegosGanados, 
    "juegosPerdidos" => $juegosPerdidos, 
    "juegosEmpatados" => $juegosEmpatados, 
    "puntosAcumulados" => $puntosAcum
    ];
    return $datosJugador;
}

/** Funcion que valida un símbolo ingresado
  * @return string
 */
function validarSimbolo() {
    $simbolo = "";
    while ($simbolo != "X" && $simbolo != "O") {
        echo "Ingrese un símbolo (X/O): ";
        $simbolo = strtoupper(trim(fgets(STDIN)));
        if ($simbolo != "X" && $simbolo != "O") {
            echo "El símbolo ingresado no es válido. Ingrese X o O: ";
        }
    }
    return $simbolo;
}

/** Funcion que dado la coleccion de juegos retorna la cantidad de juegos ganados, no importa quien gane.
 * @param array $coleccionJuegos
 * @return int
 */
function cantJuegosGanados($coleccionJuegos){
    // int $cantJuegosGan, $indice, $totalJuegos, 
    // array $juego
    $cantJuegosGan = 0;
    $indice = 0;
    $totalJuegos = count($coleccionJuegos);
    while ($indice < $totalJuegos) {
        $juego = $coleccionJuegos[$indice];
        if ($juego["puntosCruz"] != $juego["puntosCirculo"]) {
            $cantJuegosGan = $cantJuegosGan + 1;
        }
        $indice++;
    }
    return $cantJuegosGan;
}

/** función que dada una colección de juegos y un símbolo (X o O) retorne la cantidad de juegos ganados por el símbolo ingresado.
 * @param array $coleccionJuegos
 * @param string $simbolo
 * @return int
 */
function juegosGanadosSimbolo($coleccionJuegos, $simbolo){
    /* int $juegosGanadosSimbolo, $indice, $totalJuegos, $juego 
    * array $juego
    * string $simboloElegido */
    $simboloElegido = $simbolo;
    $juegosGanadosSimbolo = 0;
    $indice = 0;
    $totalJuegos = count($coleccionJuegos);
    while ($indice < $totalJuegos) {
        $juego = $coleccionJuegos[$indice];
        if($simboloElegido == "X" && $juego["puntosCruz"] > $juego["puntosCirculo"]){
            $juegosGanadosSimbolo = $juegosGanadosSimbolo + 1;
        }elseif ($simboloElegido == "O" && $juego["puntosCirculo"] > $juego["puntosCruz"]) {
            $juegosGanadosSimbolo = $juegosGanadosSimbolo + 1;
        }
        $indice++;
    }
    return $juegosGanadosSimbolo;
}

/** Funcion de comparacion para ordenar la coleccion de juegos usando el uasort.
 * @param string $a
 * @param string $b
 * @return int
 */
function comparar($a, $b) {
    // int $orden
    if ($a["jugadorCirculo"] == $b["jugadorCirculo"]) {
        $orden = 0;
    }
    elseif (($a["jugadorCirculo"] < $b["jugadorCirculo"])) {
        $orden = -1;
    } else {
        $orden = 1;
    }
    return $orden;
}
/** Funcion que muestra en pantalla la coleccion de juegos ordenada por el nombre del jugador O.
 * @param array $coleccionJuegos
 */
function coleccionJugadorO ($coleccionJuegos){
    uasort($coleccionJuegos, "comparar"); 
    print_r($coleccionJuegos);
/* La funcion "uasort" funciona para ordenar array con una funcion de comparación anteriomente desarrollada, 
manteniendo la asociacion de los indices. 
Y la funcion "print_r" es utilizada para mostrar el array con sus indices y elementos de forma que nosotros podamos entenderlo. */
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
// int $opcion, $primerJuegoGanado, $numJuego, $todosJuegosGanados, $cantGanados
// float $procentajeGanados
// string $jugadorElegido, $simboloXyO
// array $juego, $historialJuegos, $infoJugador

//Inicialización de variables:
$historialJuegos = cargarJuegos();
$separador = "\n\n+++++++++++++++++++++++++++++++++\n\n";

//Proceso:


//print_r($juego);
//imprimirResultado($juego);




do {

    echo $separador;
    $opcion = seleccionarOpcion();
    
    switch ($opcion) {
        case 1: 
            // 1) Jugar: 
            $juego = jugar();
            imprimirResultado($juego);
            $historialJuegos = agregarJuego($historialJuegos, $juego);
            break;
        case 2: 
            // 2) Mostrar un juego: 
            echo "ingrese el número del juego que quiere ver: ";
            $numeroJuego = solicitarNumeroEntre(0, count($historialJuegos));
            datosDeUnJuego($historialJuegos, $numeroJuego);
            break;
        case 3:
            // 3) Mostrar el primer juego ganador: 
            echo "ingrese el nombre del jugador: ";
            $jugadorElegido = strtoupper(trim(fgets(STDIN))); 
            //strtoupper hace que todo lo que esté escrito en una variable string, lo transcriba en mayúsculas.
            $primerJuegoGanado = buscarJuegoGanado($historialJuegos , $jugadorElegido);
            datosDeUnJuego($historialJuegos, $primerJuegoGanado+1);
            break;
        case 4: 
            // 4) Mostrar porcentaje de juegos ganados: 
            $simboloXyO = validarSimbolo();
            $todosJuegosGanados = cantJuegosGanados($historialJuegos);
            $cantGanados = juegosGanadosSimbolo($historialJuegos, $simboloXyO);
            $porcentajeGanados = ($cantGanados*100)/$todosJuegosGanados;
            echo "El porcentaje de juegos ganados por ", $simboloXyO, " es del ", $porcentajeGanados, "%.\n";
            break;
        case 5: 
            //5) Mostrar resumen de Jugador: 
            echo "ingrese el nombre de un jugador: ";
            $jugadorElegido = strtoupper(trim(fgets(STDIN)));
            $infoJugador = resumenJugador($historialJuegos, $jugadorElegido);
            if ($infoJugador["juegosPerdidos"] == 0 && $infoJugador["puntosAcumulados"] == 0) {
                echo "El jugador ", $jugadorElegido, " no jugó ningún juego aún.\n";
            }else {
                echo "*************************************\n";
                echo "Jugador: ", $infoJugador["nombre"], "\n";
                echo "Ganó: ", $infoJugador["juegosGanados"], " juegos\n";
                echo "Perdió: ", $infoJugador["juegosPerdidos"], " juegos\n";
                echo "Empató ", $infoJugador["juegosEmpatados"], " juegos\n";
                echo "Total de puntos acumulados: ", $infoJugador["puntosAcumulados"], " puntos\n";
                echo "*************************************\n";
            }
            break;
        case 6: 
            // 6) Mostrar listado de juegos Ordenado por jugador O: 
            coleccionJugadorO($historialJuegos);
            break;
        case 7:
            // 7) Salir:
            echo "Programa finalizado... ";
            break;
    }
} while ($opcion != 7);


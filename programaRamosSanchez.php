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
        $coleccionJuegos[0] = ["jugadorCruz"=>"Majo", "jugadorCirculo"=>"Pepe", "puntosCruz"=>5, "puntosCirculo"=>0];
        $coleccionJuegos[1] = ["jugadorCruz"=>"Juan", "jugadorCirculo"=>"Majo", "puntosCruz"=>1, "puntosCirculo"=>1];
        $coleccionJuegos[2] = ["jugadorCruz"=>"Ana", "jugadorCirculo"=>"Lisa", "puntosCruz"=>1, "puntosCirculo"=>1];
        $coleccionJuegos[3] = ["jugadorCruz"=>"Majo", "jugadorCirculo"=>"Tomas", "puntosCruz"=>4, "puntosCirculo"=>0];
        $coleccionJuegos[4] = ["jugadorCruz"=>"Ana", "jugadorCirculo"=>"Juan", "puntosCruz"=>0, "puntosCirculo"=>5];
        $coleccionJuegos[5] = ["jugadorCruz"=>"Pepe", "jugadorCirculo"=>"Lisa", "puntosCruz"=>1, "puntosCirculo"=>1];
        $coleccionJuegos[6] = ["jugadorCruz"=>"Majo", "jugadorCirculo"=>"Ana", "puntosCruz"=>0, "puntosCirculo"=>3];
        $coleccionJuegos[7] = ["jugadorCruz"=>"Juan", "jugadorCirculo"=>"Tomas", "puntosCruz"=>0, "puntosCirculo"=>4];
        $coleccionJuegos[8] = ["jugadorCruz"=>"Lisa", "jugadorCirculo"=>"Ana", "puntosCruz"=>1, "puntosCirculo"=>1];
        $coleccionJuegos[9] = ["jugadorCruz"=>"Pepe", "jugadorCirculo"=>"Lucas", "puntosCruz"=>3, "puntosCirculo"=>0];
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
    echo "Selecione una opción: ";
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
    /* array $juegoElegido */
    $nroJuego = solicitarNumeroEntre(-1, count($coleccionJuegos));
    $juegoElegido=$coleccionJuegos[$nroJuego-1];
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
 * @param array $jugador
 * @return int
*/
function buscarJuegoGanado($coleccionJuegos, $jugador) {
    /* int $indice, $totalJuegos, $juegoGanado
     * array $juego
     */
    $indice = 0;
    $totalJuegos = count($coleccionJuegos);
    $juegoGanado = -1;
    
    while ($indice <= $totalJuegos) {
        $juego = $coleccionJuegos[$indice];
        
        if (($juego["jugadorCruz"] == $jugador && $juego["puntosCruz"] > $juego["puntosCirculo"]) ||
            ($juego["jugadorCirculo"] == $jugador && $juego["puntosCirculo"] > $juego["puntosCruz"])) {
            $juegoGanado = $indice;
        }
        
        $indice+1;
    }
    
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
    while ($simbolo <> "X" && $simbolo <> "O") {
        echo "Ingrese un símbolo (X/O): ";
        $simbolo = strtoupper(trim(fgets(STDIN)));
        if ($simbolo <> "X" && $simbolo <> "O") {
            echo "El símbolo ingresado no es válido. Ingrese X o O";
        }
    }
    return $simbolo;
}

/** Funcion que dado la coleccion de juegos retorna la cantidad de juegos ganados, no importa quien gane.
 * @param array $coleccionJuegos
 * @return int
 */
function cantJuegosGanados($coleccionJuegos){
    // int $cantJuegosGan, $indice, $totalJuegos, $juego
    $cantJuegosGan = 0;
    $indice = 0;
    $totalJuegos = count($coleccionJuegos);
    while ($indice <= $totalJuegos) {
        $juego = $coleccionJuegos[$indice];
        if (!($juego["puntosCruz"] = $juego["puntosCirculo"])) {
            $cantJuegosGan = $cantJuegosGan + 1;
        }
    }
    return $cantJuegosGan;
}

/** función que dada una colección de juegos y un símbolo (X o O) retorne la cantidad de juegos ganados por el símbolo ingresado.
 * @param array $coleccionJuegos
 * @param string $simbolo
 * @return int
 */
function juegosGanadosSimbolo($coleccionJuegos, $simbolo){
    // int $juegosGanadosSimbolo, $indice, $totalJuegos, $juego
    $simboloElegido = $simbolo;
    $juegosGanadosSimbolo = 0;
    $indice = 0;
    $totalJuegos = count($coleccionJuegos);
    while ($indice <= $totalJuegos) {
        $juego = $coleccionJuegos[$indice];
        if($simboloElegido = "X" && $juego["puntosCruz"] > $juego["puntosCirculo"]){
            $juegosGanadosSimbolo = $juegosGanadosSimbolo + 1;
        }elseif ($simboloElegido = "O" && $juego["puntosCirculo"] > $juego["puntosCruz"]) {
            $juegosGanadosSimbolo = $juegosGanadosSimbolo + 1;
        }
    }
    return $juegosGanadosSimbolo;
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:


//print_r($juego);
//imprimirResultado($juego);



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/

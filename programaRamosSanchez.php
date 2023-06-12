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
 * 
*/
    function datosDeUnJuego (){
    /* */
    $coleccionJuegos = 
    $nroUsuario = trim(fgets(STDIN));
    /*$nroUsuario = solicitarNumeroEntre(-1, count($coleccionJuegos));*/
    if($coleccionJuegos[$nroUsuario]["puntosCruz"] > $coleccionJuegos[$nroUsuario]["puntosCirculos"]){
    }

    }

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:


//print_r($juego);
//imprimirResultado($juego);


$coleccionJuegos = cargarJuegos();
print_r($coleccionJuegos); 
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
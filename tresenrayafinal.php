<?php

/*
Funcion ganar, le pasas el tablero, una fila y una columna y te comprueba las verticales las horizontales y la diagonal devolviendo false si ocurre la condición.
*/
function hasWon($tab,$fila,$columna)
{
    $cond=true;
    if($tab[$fila][0] == $tab[$fila][1]  && $tab[$fila][1] ==  $tab[$fila][2] && $tab[$fila][0]!=" " ){
        $cond=false;
    }else if($tab[0][$columna] == $tab[1][$columna] && $tab[1][$columna] ==  $tab[2][$columna]  && $tab[0][$columna]!=" "){
        $cond=false;
    }else if($tab[0][0] == $tab[1][1] &&  $tab[1][1] ==  $tab[2][2]  && $tab[1][1]!=" "){
        $cond=false;
    }
    return $cond;
}

/*
Se inicializan las variables, y el tablero.
*/
$empate=false;
$cont=0;
$jugador=true;
$tablero=array(
    array(" "," "," "),
    array(" "," "," "),
    array(" "," "," "),
);
$cond=true;

/*
Petición de datos mediante fscanf, validación mediante un if que comprueba que no sea null y que los valores esten dentro de los posibles.
Mediante otro if se comprueba el jugador.
*/
do {    
    echo $jugador==true ? "Turno de Jugador X.Introduce posición: " : "Turno de Jugador O .Introduce posición:";
    fscanf(STDIN ,"%d %d", $valor1, $valor2);

   if (($valor1 >= 0 && $valor1 < 3 && $valor2 >= 0 && $valor2 < 3 && !is_null($valor1) && !is_null($valor2)) && $tablero[$valor1][$valor2] == " ") {
        if ($jugador == true){
            $tablero[$valor1][$valor2] = "X";
            $jugador = false;
            $cont++;
        } else {
            $tablero[$valor1][$valor2] = "O" ;
            $jugador = true;
            $cont++;
        }
        /*
        Se comprueba o empate o si ha ganado.
        */
        $cond=hasWon($tablero,$valor1,$valor2);
        if ($cont>=8 && $cond==true){
            $empate=true;
            $cond=false;
        }       
   } 
   

    $valor1=null;
    $valor2=null;
/*
Print de el tablero.
*/
echo
    "+-----+-----+-----+ "."\n".
    "|  ".$tablero[0][0]."  |  ".$tablero[0][1]."  |  ".$tablero[0][2]."  |"."\n" .
    "+-----+-----+-----+ "."\n".
    "|  ".$tablero[1][0]."  |  ".$tablero[1][1]."  |  ".$tablero[1][2]."  |"."\n" .
    "+-----+-----+-----+ "."\n".
    "|  ".$tablero[2][0]."  |  ".$tablero[2][1]."  |  ".$tablero[2][2]."  |"."\n" .
    "+-----+-----+-----+ "."\n";

} while ($cond);

/*
Mensaje final.
*/
if ($empate==false){
    echo $jugador==true ? "Juego terminado, ha ganado Jugador: O" : "Juego terminado, ha ganado Jugador: X ";
}else{
    echo "Juego terminado: Empate";
}

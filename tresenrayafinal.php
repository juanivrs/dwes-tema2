<?php

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

$jugador=true;
$tablero=array(
    array(" "," "," "),
    array(" "," "," "),
    array(" "," "," "),
);
$valor1=0;
$valor2=0;
$cond=true;

    
do {    
    echo $jugador==true ? "Turno de Jugador X.Introduce posición: " : "Turno de Jugador O .Introduce posición:";
    fscanf(STDIN ,"%i %i", $valor1, $valor2);
    if (($valor1 >= 0 && $valor1 < 3 && $valor2 >= 0 && $valor2 < 3)) {
        if ($tablero[$valor1][$valor2] == " " ) {
            if ($jugador == true){
                $tablero[$valor1][$valor2] = "X";
                $jugador = false;
            } else {
                $tablero[$valor1][$valor2]= "O" ;
                $jugador = true;
            } $cond=hasWon($tablero,$valor1,$valor2);

        }
   
    
}

echo
    "+-----+-----+-----+ "."\n".
    "|  ".$tablero[0][0]."  |  ".$tablero[0][1]."  |  ".$tablero[0][2]."  |"."\n" .
    "+-----+-----+-----+ "."\n".
    "|  ".$tablero[1][0]."  |  ".$tablero[1][1]."  |  ".$tablero[1][2]."  |"."\n" .
    "+-----+-----+-----+ "."\n".
    "|  ".$tablero[2][0]."  |  ".$tablero[2][1]."  |  ".$tablero[2][2]."  |"."\n" .
    "+-----+-----+-----+ "."\n";



} while ($cond);

echo $jugador==true ? "Juego terminado, ha ganado Jugador: O" : "Juego terminado, ha ganado Jugador: X ";



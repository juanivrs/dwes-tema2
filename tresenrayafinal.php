<?php
function hasWon($tab)
{
    $res=array_filter($tab,fn($i)=>$tab );
}

//jugador=0 es el primer jugador y jugador=1 es el segundo jugador
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
            }
        }
    }
    /* if (array_filter($tablero,fn())
    ){

    }*/
    echo
    "+-----+-----+-----+ "."\n".
    "|  ".$tablero[0][0]."  |  ".$tablero[0][1]."  |  ".$tablero[0][2]."  |"."\n" .
    "+-----+-----+-----+ "."\n".
    "|  ".$tablero[1][0]."  |  ".$tablero[1][1]."  |  ".$tablero[1][2]."  |"."\n" .
    "+-----+-----+-----+ "."\n".
    "|  ".$tablero[2][0]."  |  ".$tablero[2][1]."  |  ".$tablero[2][2]."  |"."\n" .
    "+-----+-----+-----+ "."\n";

} while ($cond);





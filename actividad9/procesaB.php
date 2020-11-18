<?php

$hora = (isset($_GET['hora'])) ? $_GET['hora'] : 1;

if(!isset($_GET['dia'])) {
    echo "Debes pasar el campo dia";
    exit();
}

$dia = $_GET['dia'];

$horario = [
        "lunes" => ["ASO", "ASO", "IAW", "IAW","SRI","SRI"],
        "martes" => ["ASO", "ASO", "ASO", "SRI","SRI","SRI"],
        "miercoles" => ["EIE", "EIE", "ABD", "SRI","SRI","SRI"],
        "jueves" => ["ASO", "ASO", "EIE", "ASO","ANG","ANG"],
        "viernes" => ["ASO", "ANG", "ABD", "ABD","IAW","IAW"],
 ];

$modulo = $horario[$dia][$hora];

echo "<p> El módulo que toca el dia $dia a la hora $hora es $modulo";

?>

<div><a href="/actividad9/index.html">Volver</a></div>
<?php
/**
 * Escribe un programa que a partir de 1 parámetro `num1` obtenido por queryString, indique si se trata de un dato numérico,
 * en caso positivo decir si se trata de un dato entero o decimal
 */

$num1 = $_GET['num1'];

if (is_numeric($num1)) {

    echo "<p>$num1 es numérico</p>";

    $num1 = $num1 + 0;

    if (is_int($num1)) {
        echo "<p>Es entero</p>";
    } else {
        echo "<p>Es decimal</p>";
    }

} else {

    echo "<p>$num1 es un string</p>";

}
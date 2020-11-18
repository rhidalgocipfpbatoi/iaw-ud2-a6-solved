<?php

/**
 * Escribe un programa que muestre la suma, resta, multiplicación, división, preincremento y postincremento de dos números
 * introducidos por queryString.
 */

$num1 = $_GET['num1'];
$num2 = $_GET['num2'];

echo "<table>";
echo "<tr><th>Operación (num1 = $num1, num2 = $num2)</th><th>Resultado</th></tr>";

$resultadoSuma = $num1 + $num2;
echo "<tr><td>Suma</td><td>$resultadoSuma</td></tr>";

$resultadoResta = $num1 - $num2;
echo "<tr><td>Resta</td><td>$resultadoResta</td></tr>";

$resultadoMultiplicacion = $num1 * $num2;
echo "<tr><td>Multiplicación</td><td>$resultadoMultiplicacion</td></tr>";

$resultadoDivision = $num1 / $num2;
echo "<tr><td>División</td><td>$resultadoDivision</td></tr>";

$resultadoPreIncremento = --$num1;
echo "<tr><td>Preincremento</td><td>$resultadoPreIncremento</td></tr>";

$num1++;
$resultadoPostIncremento = $num1++;
echo "<tr><td>PostIncremento</td><td>$resultadoPostIncremento</td></tr>";
echo "</table>";
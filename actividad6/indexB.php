<?php

/**
 * Crea un fichero `indexB.php` y realiza las siguientes acciones:
 * - Si no existe alguno de los parámetros esperados muestra un mensaje de alerta y no realices ninguna acción
 * - Si los números no son iguales indica el mayor
 * - Comprueba que sean datos numéricos, en caso contrarios muestra un mensaje de alerta y no realices ninguna operación.
 */

if (!isset($_GET['num1']) || !isset($_GET['num2'])) {

    echo "Debe introducir un valor para num1 y para num2";
    exit();

}

$num1 = $_GET['num1'];
$num2 = $_GET['num2'];

if (!is_numeric($num1) || is_numeric($num2)) {

    echo "num1 y num2 deben ser numérico";
    exit();

}

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
$num1++;
echo "<tr><td>Preincremento</td><td>$resultadoPreIncremento</td></tr>";
$resultadoPostIncremento = $num1++;
echo "<tr><td>PostIncremento</td><td>$resultadoPostIncremento</td></tr>";

if ($num1 > $num2) {
    echo "<tr><td>Comparación</td><td>num1 es mayor</td></tr>";
} else {
    echo "<tr><td>Comparación</td><td>num2 es mayor</td></tr>";
}

echo "</table>";
<?php
/**
 * Realiza un programa que que reciba dos parámetros númericos por queryString y muestre el resultado de su multiplicación.
 */

   $num1 = $_GET['num1'];
   $num2 = $_GET['num2'];
   $resultado = $num1 * $num2;

   echo "<p> $num1 X $num2 = $resultado </p>";

?>

<a href="index.html">Volver</a>

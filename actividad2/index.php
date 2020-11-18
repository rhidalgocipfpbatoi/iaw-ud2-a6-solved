<?php
/**
 * Realiza un conversor de euros a pesetas, la cantidad en euros que se quiere convertir se deberá introducir
 * a través de queryString
 */

$euros = $_GET['euros'];
$pesetas = $euros * 166.386;

echo "<lu>";
echo "<li>Euros: $euros</li>";
echo "<li>Pesetas: $pesetas</li>";
echo "</lu>";
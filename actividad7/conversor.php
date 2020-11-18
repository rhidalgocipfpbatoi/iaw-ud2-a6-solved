<?php
/**
  * Aquí el código que se encarga de procesar los datos del formulario
  */

$euros = $_GET['euros'];
$pesetas = $euros * 166.386;

echo "<lu>";
    echo "<li>Euros: $euros</li>";
    echo "<li>Pesetas: $pesetas</li>";
    echo "</lu>";
    ?>

<a href="index.html">Volver</a>
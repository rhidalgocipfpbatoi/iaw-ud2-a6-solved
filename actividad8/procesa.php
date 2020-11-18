<?php
/**
  * Aquí el código que se encarga de procesar los datos del formulario
  */

$nombre = $_GET['nombre'];
$edad = $_GET['edad'];

if ($edad >= 18) {
    echo "<p>El usuario $nombre con edad $edad es mayor de edad";
} else {
    echo "<p>El usuario $nombre con edad $edad no es mayor de edad";
}

?>

<div>
    <a href="/actividad8/index.html">Volver</a>
</div>
<?php

//Incluimos el contenido del script animales.php de forma que lo tendremos disponible en el documento actual
require_once "animales.php";

$animal = $_GET["animal"];
$selectedIndex = -1;
foreach ($listadoAnimales as $k => $animalItem) {

    if ($animalItem['nombre'] == $animal ) {
        $selectedIndex = $k;
    }

}

$selectedAnimalPosition = array_search($animal, array_column($listadoAnimales, "nombre"));
$animal = $listadoAnimales[$selectedAnimalPosition];

echo "<article>";
echo "<h1>{$animal['nombre']}</h1>";
echo "<p><img src=\"../assets/images/animales/{$animal['imagen']}\" alt=\"Animal\" height=\"250\"></p>";
echo "</article>";

?>
<a href="/actividad11/index.php">Volver</a>

<?php
    require "animales.php";

    $animalesTierra = ["camello","cebra"];

    foreach ($listadoAnimales as $k => $animal) {
        echo "<ul>";
        if (array_search($animal["nombre"], $animalesTierra) >= 0) {
            echo "<li>{$animal["nombre"]}</li>";
        }
        echo "</ul>";
    }
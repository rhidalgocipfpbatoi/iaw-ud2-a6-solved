<?php
    require "animales.php";

    foreach ($listadoAnimales as $k => $animal) {
        echo "<ul>";
        if ($k % 2 == 0) {
            echo "<li>{$animal["nombre"]}</li>";
        }
        echo "</ul>";
    }
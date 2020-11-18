<?php
    require "animales.php";

    foreach ($listadoAnimales as $animal) {
        echo "<article>";
        echo "<h1>{$animal['nombre']}</h1>";
        echo "<p><img src=\"../assets/images/animales/{$animal['imagen']}\" alt=\"Animal\" height=\"250\"></p>";
        echo "</article>";
    }
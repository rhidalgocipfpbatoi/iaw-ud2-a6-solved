<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>IAW-UD2-A6</title>
</head>
<body>
<h1>Dibuja cuadrado y calcula el área</h1>

<?php
    $base = (isset($_GET['base'])) ? $_GET['base'] : mt_rand(1,1000);
    $altura = $_GET['altura'];
    $area = $base * $altura;
    ?>
<svg version="1.1" xmlns="http://www.w3.org/2000/svg"
     width="<?=$base + 4?>px" height="<?=$altura + 4?>px">
    <rect fill="white" stroke="black" stroke-width="4" x="2" y="2" width="<?=$base?>" height="<?=$altura?>" />
</svg>
<p>El area del rectangulo de <?=$base?> X <?=$altura?> es <?=$area?></p>
</body>
</html>
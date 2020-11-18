<?php

if(!isset( $_GET['dia']) || !isset($_GET['mes'])){
    header("Location: /actividad10/index.php");
    exit();
}

$dia = $_GET['dia'];
$mes = $_GET['mes'];

$signo = "";

if( ($dia >= 21 && $mes == 3) || ($dia <= 20 && $mes == 4) ) {
    $signo = "aries";
} elseif (($dia >= 21 && $mes == 4) || ($dia <= 21 && $mes == 5 )) {
    $signo = "tauro";
} elseif (($dia >= 22 && $mes == 5) || ($dia <= 21 && $mes == 6 )) {
    $signo = "geminis";
} elseif (($dia >= 22 && $mes == 6) || ($dia <= 22 && $mes == 7 )) {
    $signo = "cancer";
} elseif (($dia >= 23 && $mes == 7) || ($dia <= 23 && $mes == 8 )) {
    $signo = "leo";
} elseif (($dia >= 24 && $mes == 8) || ($dia <= 23 && $mes == 9 )) {
    $signo = "virgo";
} elseif (($dia >= 24 && $mes == 9) || ($dia <= 23 && $mes == 10 )) {
    $signo = "libra";
} elseif (($dia >= 24 && $mes == 10) || ($dia <= 22 && $mes == 11 )) {
    $signo = "escorpio";
} elseif (($dia >= 23 && $mes == 11) || ($dia <= 21 && $mes == 12 )) {
    $signo = "sagitario";
} elseif (($dia >= 12 && $mes == 12) || ($dia <= 20 && $mes == 1 )) {
    $signo = "capricornio";
} elseif (($dia >= 21 && $mes == 1) || ($dia <= 19 && $mes == 2 )) {
    $signo = "acuario";
} else {
    $signo = "piscis";
}

echo "<article class=\"horoscopo\">
            <h1>$signo</h1>
            <h2>$dia-$mes-1981</h2>
            <img src=\"../assets/images/horoscopo/$signo.svg\">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
               dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
      </article>";
?>

<a href="/actividad10/index.php">Volver</a>
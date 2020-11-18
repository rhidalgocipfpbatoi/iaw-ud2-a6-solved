<?php

$correctAnswers = [
    "pregunta-1" => 2,
    "pregunta-2" => 1,
    "pregunta-3" => 1,
    "pregunta-4" => 1,
    "pregunta-5" => 2,
];

$numPuntos = 0;

foreach ($_POST as $key => $response) {

    if (isset($correctAnswers[$key]) && ($correctAnswers[$key] == $response)) {
        $numPuntos++;
    }

}

echo "<div> La puntuación obtenida es $numPuntos </div>";

?>

<a href="index.html">Volver a intentarlo</a>

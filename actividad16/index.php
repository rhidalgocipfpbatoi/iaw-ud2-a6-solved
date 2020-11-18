<?php

if (!isset($_GET['nota'])) {

    echo "<h1>Conversion nota a escala básica</h1>
          <form action='/actividad16/index.php'>
              <label for=\"nota\">Introduce una nota</label>
              <input id=\"nota\" type=\"number\" name=\"nota\"> 
              <div>
                    <input type=\"submit\" value=\"Enviar\">
                    <input type=\"reset\"  value=\"Borrar\">
              </div>
          </form>";

} else {

    $nota = $_GET['nota'];
    $notaTexto = "";
    $color = "";

    if ($nota >= 0 && $nota <= 10) {

        if ($nota < 5) {

            $color = "#FF0000";
            $notaTexto = "Suspenso";

        } elseif ($nota < 6) {

            $color = "#7CFC00";
            $notaTexto = "Aprobado";

        } elseif ($nota < 8) {

            $color = "#7CFC00";
            $notaTexto = "Bien";

        } elseif ($nota < 10) {

            $color = "#7CFC00";
            $notaTexto = "Notable";

        } else {

            $color = "#7CFC00";
            $notaTexto = "Sobresaliente";

        }

    } else {

        $color = "#FF5733";
        $notaTexto = "Nota fuera de rango";

    }

    echo "<p style='color: $color'>$notaTexto</p>";

}

<?php

if (!isset($_GET['num'])) {

    echo "<form action='/actividad14/index.php'>
              <label for=\"num\">Introduce un número</label>
              <input id=\"num\" type=\"text\" name=\"num\"> 
              <div>
                    <input type=\"submit\" value=\"Enviar\">
                    <input type=\"reset\"  value=\"Borrar\">
              </div>
          </form>";

} else {

    $number = $_GET['num'];

    if ($number % 2) {
        echo "<p>El numero $number es par<p>";
    } else {
        echo "<p>El numero $number es impar<p>";
    }

    echo "<a href=\"/actividad14/index.php\">Volver</a>";

}

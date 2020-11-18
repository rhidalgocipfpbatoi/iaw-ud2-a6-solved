<?php

if (!isset($_GET['num'])) {

    echo "<h1>Tablas de multiplicar</h1>
          <form action='/actividad15/index.php'>
              <label for=\"num\">Introduce un número</label>
              <input id=\"num\" type=\"text\" name=\"num\"> 
              <div>
                    <input type=\"submit\" value=\"Enviar\">
                    <input type=\"reset\"  value=\"Borrar\">
              </div>
          </form>";

} else {

    $num = $_GET['num'];

    echo "<table><th>Numero</th><th>Resultado</th>";
    for ($i = 1; $i <= 10; $i++) {
        $resultado = $num * $i;
        echo "<tr><td>$num X $i</td><td>$resultado</td></tr>";
    }
    echo "</table>";

    echo "<a href=\"/actividad15/index.php\">Volver</a>";

}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>La caja fuerte</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
<?php

 if (!isset($_GET['num_1'])
     || !isset($_GET['num_2'])
     || !isset($_GET['num_3'])
     || !isset($_GET['num_4'])
 ) {

     echo "
        <form class=\"caja-fuerte\" action='#'>
            <div class=\"number\">
                <label for=\"num_1\">num1</label>
                <input id=\"num_1\" type=\"number\" name=\"num_1\" min='0' max='9'>
            </div>
            <div class=\"number\">
                <label for=\"num_2\">num2</label>
                <input id=\"num_2\" type=\"number\" name=\"num_2\" min='0' max='9'>
            </div>
            <div class=\"number\">
                <label for=\"num_3\">num3</label>
                <input id=\"num_3\" type=\"number\" name=\"num_3\" min='0' max='9'>
            </div>
            <div class=\"number\">
                <label for=\"num_4\">num4</label>
                <input id=\"num_4\" type=\"number\" name=\"num_4\" min='0' max='9'>
            </div>
            <input type=\"submit\" value=\"Abrir caja\">
        </form>";

 } else {

     $num1 = $_GET['num_1'];
     $num2 = $_GET['num_2'];
     $num3 = $_GET['num_3'];
     $num4 = $_GET['num_4'];

     $combinacionValida = [1,3,4,5];

     if ($num1 == $combinacionValida[0]
         && $num2 == $combinacionValida[1]
         && $num3 == $combinacionValida[2]
         && $num4 == $combinacionValida[3]
     ) {

         echo "<p class='success'>La caja se ha abierto satisfactoriamente</p>";

     } else {

         echo "<p class='error'>Lo siento, esa no es la combinación</p>";

     }

 }

?>
<a href="index.php">Volver</a>
</body>
<footer><small>Implantación de Aplicaciones Web - IAW</small></footer>
</html>
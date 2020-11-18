<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>

<h1>Introduzca su usuario y password</h1>

<?php
if(isset($_GET['errors']) && in_array('credentials', $_GET['errors'])) {
    echo "<fieldset title='Informacion'>
             <label class='info error'>El usuario o password introducido no es válido</label>
          </fieldset>";
}
?>
<form action="/actividad18/procesa.php" method="post">
    <div>
        <label for="username">Usuario</label>
        <input type="text" name="username" id="username">
        <?php
        if(isset($_GET['errors']) && in_array('username', $_GET['errors'])) {
            echo "<label class='info error'>Debes introducir un nombre de usuario válido</label>";
        }
        ?>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <?php
        if (isset($_GET['errors']) && in_array('password', $_GET['errors'])) {
            echo "<label class='info error'>Debes introducir un password de entre 6 y 8 caracteres</label>";
        }
        ?>
    </div>
    <div>
        <input type="submit" value="Login">
    </div>
</form>
</body>
<footer><small>Implantación de Aplicaciones Web - IAW</small></footer>
</html>
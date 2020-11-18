<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
<h1>Bienvenido a CIPFPBatoi</h1>
<div class="content">
<?php

$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    if (!$username || filter_var($username, FILTER_VALIDATE_EMAIL) === FALSE){
        $errors['username'] = "Debe introducir un nombre de usuario válido";
    }

    if (!$password || strlen($password) < 6 || strlen($password) > 10){
        $errors['password'] = "Debe introducir un password entre 6 y 8 caracteres";
    }

    if (!$errors) {

        include __DIR__ . "/credentials.php";

        $usuarioValido = false;
        foreach ($listadoCredenciales as $credencialUsuario){

            if ($credencialUsuario["username"] == $username
                && $credencialUsuario["password"] == $password) {
                $usuarioValido = true;
                break;
            }

        }

        if (!$usuarioValido) {
            $errors['credentials'] = "El nombre de usuario o contraseña no es válido";
        }

    }

}
?>

<?php if(!isset($usuarioValido) || !$usuarioValido) {

    require __DIR__. "/partials/partial-formulario-login.php";

} else {

    require __DIR__. "/partials/partial-login-correcto.php";

}
?>

</div>
</body>
<footer>
    <small>UD2 - Implantación de Aplicaciones Web - IAW</small>
</footer>
</html>
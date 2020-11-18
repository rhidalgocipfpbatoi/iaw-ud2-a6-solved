<?php

$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$errors = "";

//validamos que el email sera válido
if (!$username || filter_var($username, FILTER_VALIDATE_EMAIL) === FALSE){
    $errors .= "&errors[]=username";
}

//validamos que la cadena sea entre 6 y 10 caracteres
if (!$password || strlen($password) < 6 || strlen($password) > 10){
    $errors .= "&errors[]=password";
}

//si existen errores volvemos a mostrar el formulario inicial
if ($errors) {
    header("Location: /actividad18/index.php?" . $errors);
    exit();
}

$listadoCredenciales = [
    [
        "username" => "alumno1@iaw.local",
        "password" => "4lumn01"
    ],
    [
        "username" => "alumno2@iaw.local",
        "password" => "4lumn02"
    ],
    [
        "username" => "alumno3@iaw.local",
        "password" => "4lumn03"
    ],
    [
        "username" => "alumno4@iaw.local",
        "password" => "4lumn04"
    ]
];

//comprobamos credenciales introducidas
foreach ($listadoCredenciales as $credencialUsuario){

    if ($credencialUsuario["username"] == $username
        && $credencialUsuario["password"] == $password) {
        echo "<p>Usuario logueado";
        exit();
    }

}

//si no se han encontrado coincidencias, volvemos a mostrar el formulario con el error correspondiente
header("Location: /actividad18/index.php?errors[]=credentials");
exit();
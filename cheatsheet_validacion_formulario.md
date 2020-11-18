# Ayuda Proyecto - Renderizado y validación de un formulario

## Ejercicio Guiado

- En este ejercicio crearemos un **formulario de login** y llevaremos a cabo su **validación** en una única página.
  - El campo **password** debe contener entre **6** y **10** caracteres.
  - El campo **username** debe ser un email válido.
  - Las credenciales válidas son:

    | Usuario | Password |
    |---|---|
    | alumno1@iaw.local | 4lumn01  |
    | alumno2@iaw.local | 4lumn02  |
    | alumno3@iaw.local | 4lumn03  |

### 1. Información Previa
- Dado que vamos a implementar un **login** de usuario el método elegido para el paso de los valores del formulario será el método **POST**.
   Debemos tener en cuenta que la página tendrá 2 fases:
   
   - **Renderizado inicial del Formulario**: Mostramos el formulario para que el usuario pueda introducir los datos.
     
     <img width="400" height="auto" src="/assets/images/ejercicios/form_preview.png">

   - **Procesamiento del Formulario**: Procesamos los datos introducidos por el usuario: 
   
      1. En primer lugar, comprobamos que los datos introducidos son acordes al tipo de dato esperado **(Validación de entradas)**.
      
      2. Si la validación **no es correcta** mostraremos de nuevo el formulario con un mensaje de error que oriente al usuario.
      
      <img width="400" height="auto" src="/assets/images/ejercicios/form_errors.png">
      
      3. Si la validación es **correcta**, procederemos a comprobar que el usuario/password introducido sea correcto. **(Autenticación)**.
      
      4. Si la combinación **usuario/password** es correcta, mostraremos el mensaje ``Usuario logueado``, en caso contrario mostraremos de nuevo el formulario de
   login con el mensaje "Usuario o password incorrectos".
      
      <img width="400" height="auto" src="/assets/images/ejercicios/form_success.png"> 
      
      <img width="400" height="auto" src="/assets/images/ejercicios/form_invalid_credentials.png">
      
               
>PHP nos propociona una variable global **$_SERVER["REQUEST_METHOD"]** que nos indica el método que estamos empleando
>para la petición web actual. Lo usaremos para saber en que fase nos encontramos.

### 2. Desarrollo de la práctica
#### 2.1 Definición de la plantilla base  
- Definimos las plantilla base de la **página** web que mostrará el formulario de **login**.

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
<form action="/actividad21/index.php" method="post">
        <div>
            <label for="username">Usuario</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <input type="submit" value="Login">
            <input type="reset" value="Reset">
        </div>
    </form>
</body>
```
#### 2.2 Acceso a datos del formulario
- Como podemos ver en el formulario, manejaremos 2 variables ``username`` que almacenará el nombre de usuario y ``password``.
Antes de mostrar el formulario trataremos de acceder a ellas y a su contenido para mostrarlo en cada uno de los **inputs**
a través del atributo **value**. De esta forma, si necesitamos volver a visualizar el formulario porque se ha producido un **error**,
siempre se tendremos disponibles los valores introducidos previamente.

```php

<?php

   $username = isset($_POST['username']) ? $_POST['username'] : null;
   $password = isset($_POST['password']) ? $_POST['password'] : null;

?>

<form action="/actividad21/index.php" method="post">
        <div>
            <label for="username">Usuario</label>
            <input type="text" name="username" id="username" value="<?=$username?>">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="<?=$password?>">
        </div>
        <div>
            <input type="submit" value="Login">
            <input type="reset" value="Reset">
        </div>
</form>
```
#### 2.3 Validación del formulario
- Deberemos será detectar si estamos en la **fase de procesamiento**, en caso afirmativo, creamos un array
vacio ``$errores = [];`` donde iremos almacenando los errores de validación, las claves del array corresponderan al nombre del 
parámetro erróneo, mientras que el valor corresponderá al mensaje.

```php
<?php

$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    //Si el usuario no ha introducido un email valido marcamos el campo como invalido junto al mensaje de validación
    if (!$username || filter_var($username, FILTER_VALIDATE_EMAIL) === FALSE){
        $errors['username'] = "Debe introducir un nombre de usuario válido";
    }

    //Si el usuario no ha introducido password entre 6 y 10 caracteres marcamos el campo como invalido junto al mensaje de validación
    if (!$password || strlen($password) < 6 || strlen($password) > 10){
        $errors['password'] = "Debe introducir un password entre 6 y 8 caracteres";
    }
    
    //Codigo comprobación de credenciales

}
```

#### 2.4 Comprobación de credenciales
- Una vez que hemos comprobado que todos los valores introducidos por el usuario cumplen los requisitos podemos ver si coinciden
con alguna de las credenciales almacenadas en nuestro código.

```php
<?php

if (!$errors) {

        //El listado de credenciales podriamos mantenerlo en un fichero separando y que actue como Base de datos en memoria
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

        $credencialesValidas = false;
        foreach ($listadoCredenciales as $credencialUsuario){

            if ($credencialUsuario["username"] == $username
                && $credencialUsuario["password"] == $password) {
                $credencialesValidas = true;
                break;
            }

        }

        //Si las credenciales introducidas no son válidas,establecemos un nuevo mensaje de error
        if (!$credencialesValidas) {
            $errors["credentials"] = "El nombre de usuario o contraseña no es válido";
        }

    }
?>
```

#### 2.5 Renderizado condicional del resultado

- El siguiente paso será actuar sobre el formulario, para que solo se visualice en caso de que **no se hayan comprobado las credenciales**
o de que estas sean **inválidas**. En caso contrario, **Existen las credenciales y son válidas**, mostraremos el mensaje "Usuario logueado".

~~~
    Notese que hemos utilizado las etiquetas abreviades de php que nos permiten insertar código html de forma condicional sin 
    necesidad de hacer echo, lo que nos proporciona una mayor legibilidad del código fuente.
    <?php if (condicion) :?>
        //codigo html
    <?php else :?>
        //codigo html alternativo
    <?php endif;?>
~~~

```php
<?php if(!isset($credencialesValidas) || !$credencialesValidas) :?>

    <form action="/actividad21/index.php" method="post">
        <div>
            <label for="username">Usuario</label>
            <input type="text" name="username" id="username" value="<?= $username ?>">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="<?= $password ?>">
        </div>
        <div>
            <input type="submit" value="Login">
            <input type="reset" value="Reset">
        </div>
    </form>

<?php else:?>

    <p class="success"> Usuario Logueado</p>
    <p><a href="/actividad21/index.php">Salir</a></p>

<?php endif;?>
```

#### 2.6 Mostrar errores de validación

- El siguiente paso será ir mostrando los mensajes de error, si existen, en cada una de las líneas dónde queramos que se muestren

```php

<?php if(!isset($credencialesValidas) || !$credencialesValidas) :?>

    <?php
        //Mostramos mensaje de credenciales inválidas
        if (isset($errors) && array_key_exists('credentials', $errors)) {
            echo "<fieldset title='Informacion'>
                      <label class='info error'>{$errors['credentials']}</label>
                  </fieldset>";
        }
    ?>
    
    <form action="/actividad21/index.php" method="post">
        <div>
            <label for="username">Usuario</label>
            <input type="text" name="username" id="username" value="<?= $username ?>">
            <?php
            //Mostramos mensaje de username inválido
            if (isset($errors) && array_key_exists('username', $errors)) {

                echo "<label class='info error'>{$errors['username']}</label>";
            }
            ?>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="<?= $password ?>">
            <?php
            //Mostramos mensaje de password inválido
            if(isset($errors) && array_key_exists('password', $errors)) {
                echo "<label class='info error'>{$errors['password']}</label>";
            }
            ?>
        </div>
        <div>
            <input type="submit" value="Login">
            <input type="reset" value="Reset">
        </div>
    </form>

<?php else:?>

    <p class="success"> Usuario Logueado</p>
    <p><a href="/actividad21/index.php">Salir</a></p>

<?php endif;?>
```
#### 3. Resultado final

Para **favorecer la legibilidad** del código haremos que el array de credenciales se encuentre en un archivo independiente, 
al igual que la vista correspondiente al **renderizado del formulario** y la vista de **usuario logueado**

```php
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

        $credencialesValidas = false;
        foreach ($listadoCredenciales as $credencialUsuario){

            if ($credencialUsuario["username"] == $username
                && $credencialUsuario["password"] == $password) {
                $credencialesValidas = true;
                break;
            }

        }

        if (!$credencialesValidas) {
            $errors['credentials'] = "El nombre de usuario o contraseña no es válido";
        }

    }

}
?>

<?php if(!isset($credencialesValidas) || !$credencialesValidas) {

    require __DIR__. "partial-formulario-login.php";

} else {

    require __DIR__. "partial-login-correcto.php";

}
?>


</div>
</body>
<footer>
    <small>UD2 - Implantación de Aplicaciones Web - IAW</small>
</footer>
</html>
```

```php
  <!-- Start partial formulario-login-->
  
  <?php
  
  if (isset($errors) && array_key_exists('credentials', $errors)) {
      echo "<fieldset title='Informacion'>
                  <label class='info error'>{$errors['credentials']}</label>
           </fieldset>";
  }
  ?>
  
  <form action="/actividad21/index.php" method="post">
      <div>
          <label for="username">Usuario</label>
          <input type="text" name="username" id="username" value="<?= $username ?>">
          <?php
          if (isset($errors) && array_key_exists('username', $errors)) {
  
              echo "<label class='info error'>{$errors['username']}</label>";
          }
          ?>
      </div>
      <div>
          <label for="password">Password</label>
          <input type="password" name="password" id="password" value="<?= $password ?>">
          <?php
          if(isset($errors) && array_key_exists('password', $errors)) {
              echo "<label class='info error'>{$errors['password']}</label>";
          }
          ?>
      </div>
      <div>
          <input type="submit" value="Login">
          <input type="reset" value="Reset">
      </div>
  </form>
  
  <!-- END partial formulario-login-->
```

```php
    <!-- START partial login-correcto-->
    
    <p class="success"> Usuario Logueado</p>
    <p><a href="/actividad21/index.php">Salir</a></p>
    
    <!-- END partial login-correcto-->
```

#### 4. Trabajo a realizar
- Añade un nuevo campo al formulario ``tipo-usuario`` que nos permita seleccionar si el usuario es un 
de tipo empresa o particular. Valida en en el servidor que se ha seleccionado uno de los 2 valores posibles.
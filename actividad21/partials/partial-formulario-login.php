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
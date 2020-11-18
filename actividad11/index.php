<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>IAW-UD2-A6</title>
</head>
<body>

<?php require_once "animales.php";?>

<h1>Animales</h1>
<form action="/actividad11/procesa.php" method="get">
    <div>
        <label for="animal">Seleccione un animal</label>
        <select id="animal" name="animal" >
            <?php foreach ($listadoAnimales as $animal) :?>
                <option value="<?=$animal['nombre']?>"><?=$animal['nombre']?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div>
        <input type="submit" value="Enviar">
        <input type="reset"  value="Borrar">
    </div>
</form>
</body>
</html>

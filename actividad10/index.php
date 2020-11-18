<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>IAW-UD2-A6</title>
</head>
<body>
<h1>Horóscopo</h1>
<form action="/actividad10/procesa.php" method="get">
    <div>
        <label for="dia">Seleccione un dia</label>
        <select id="dia" name="dia" >
            <?php for ($i = 1; $i <= 31; $i++) :?>
                <?="<option value=\"$i\">$i</option>"?>
            <?php endfor;?>
        </select>
    </div>
    <div>
        <label for="mes">Seleccione una hora</label>
        <select id="mes" name="mes" >
            <option value="1">enero</option>
            <option value="2">febrero</option>
            <option value="3">marzo</option>
            <option value="4">abril</option>
            <option value="5">mayo</option>
            <option value="6">junio</option>
            <option value="7">julio</option>
            <option value="8">agosto</option>
            <option value="9">septiembre</option>
            <option value="10">octube</option>
            <option value="11">noviembre</option>
            <option value="12">diciembre</option>
        </select>
    </div>
    <p><input type="submit" value="Enviar">
    <input type="reset"  value="Borrar"></p>
</form>
</body>
</html>

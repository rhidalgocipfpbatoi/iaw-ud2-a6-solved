<?php

$requiredFields = ["nombre","dni","email","ciudad","provincia","pais","f-nacimiento","tipo-usuario","intereses"];
$filledFields = [];
$nonFilledFields = [];

foreach ($requiredFields as $name) {
    if (empty($_POST[$name])) {
        $nonFilledFields[] = $name;
    } else {
        $filledFields[$name] = $_POST[$name];
    }
}

//No valid fields
echo "<fieldset style='color: red'>";
echo "<legend>Required fields</legend>";
echo "<ul>";
foreach ($nonFilledFields as $v) {
    echo "<li><strong>$v</strong>: * requerido</li>";
}
echo "</ul>";
echo "</fieldset>";

//Valid fields
echo "<fieldset style='color: green'>";
echo "<legend>Actual User Info</legend>";
echo "<ul>";
foreach ($filledFields as $k => $v) {
    if (is_array($v)) {
        echo "<li><strong>$k</strong>: ".implode(",", $v)."</li>";
    } else {
        echo "<li><strong>$k</strong>: $v</li>";
    }
}
echo "</ul>";
echo "</fieldset>";

<?php

// Listado de algunos paises
// <option value="ESP">Spain</option>
// <option value="2" selected="selected">test2</option>
// <option value="3">test3</option>
$a[] = "Andorra";
$a[] = "Alemania";
$a[] = "B&eacute;lgica";
$a[] = "Chipre";
$a[] = "Dinamarca";
$a[] = "Espa&ntilde;a";
$a[] = "Finlandia";
$a[] = "Georgia";
$a[] = "Hungr&iacute;a";
$a[] = "Italia";
$a[] = "Irlanda";
$a[] = "Islandia";
$a[] = "Jap&oacute;n";
$a[] = "Kazajist&aacute;n";
$a[] = "Letonia";
$a[] = "Malta";
$a[] = "Noruega";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = "<option value=".$name.">test3</option>";
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No se ha introducido un pais con el comienzo de esa letra" : $hint;
?> 

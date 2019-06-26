<?php
header('Content-Type: text/html; charset=UTF-8');

$a[] = "And>Andorra";
$a[] = "Alb>Albania";
$a[] = "Deu>Alemania";
$a[] = "Bel>B&eacute;lgica";
$a[] = "Bel>Bélgica";
$a[] = "Cze>Chequia";
$a[] = "Den>Dinamarca";
$a[] = "Esp>Espa&ntilde;a";
$a[] = "Esp>España";
$a[] = "Est>Estonia";
$a[] = "Esl>Eslovenia";
$a[] = "Fin>Finlandia";
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
    $q = properText($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 4, $len))) {
            if ($hint === "") {
                $hint = "<option value=".$name."</option>";
            } else {
                $hint .= "<option value=".$name."</option>";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No se ha introducido un pais con el comienzo de esa letra" : $hint;

function properText($str){
    $str = mb_convert_encoding($str, "HTML-ENTITIES", "UTF-8");
    $str = preg_replace('[a-zA-Z áéíóúÁÉÍÓÚñÑ.]+',htmlentities('${1}'),$str);
    return($str); 
}

?> 

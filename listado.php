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
$a[] = "Geo>Georgia";
$a[] = "GBR>Reino Unido";
$a[] = "Hun>Hungr&iacute;a";
$a[] = "Ita>Italia";
$a[] = "Ire>Irlanda";
$a[] = "Ice>Islandia";
$a[] = "Jap>Jap&oacute;n";
$a[] = "Kaz>Kazajist&aacute;n";
$a[] = "Let>Letonia";
$a[] = "Mlt>Malta";
$a[] = "Nor>Noruega";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== ""){
    $q = strtolower($q);
    $len=strlen($q);
    //$q = properText($q);
    foreach($a as $name){
        if (stristr($q, substr($name, 4, $len))){
            if ($hint === ""){
                $hint = "<option value=0 selected>Seleccione un pais</option><option value=".$name.$q."</option>";
            } else {
                $hint .= "<option value=".$name.utf8_decode($q)."</option>";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "<option value=0 selected>".$q.", No coincide con ning&uacute;n pais</option>" : $hint;

function properText($str){
    $str = mb_convert_encoding($str, "HTML-ENTITIES", "UTF-8");
    $str = preg_replace('[a-zA-Z áéíóúÁÉÍÓÚñÑ.]+',htmlentities('${1}'),$str);
    return($str); 
}

?> 

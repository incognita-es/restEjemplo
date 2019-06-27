<?php
header('Content-Type: text/html; charset=UTF-8');

// Array de paises
$a[] = "And>Andorra";
$a[] = "Alb>Albania";
$a[] = "Deu>Alemania";
$a[] = "Bel>B&eacute;lgica";
$a[] = "Bel>Bélgica";
$a[] = "Brb>Barbados";
$a[] = "Cze>Chequia";
$a[] = "Chl>Chile";
$a[] = "Dnk>Dinamarca";
$a[] = "Esp>Espa&ntilde;a";
$a[] = "Ecu>Ecuador";
$a[] = "Est>Estonia";
$a[] = "Svn>Eslovenia";
$a[] = "Fin>Finlandia";
$a[] = "Geo>Georgia";
$a[] = "GBR>Reino Unido";
$a[] = "Hun>Hungr&iacute;a";
$a[] = "Ita>Italia";
$a[] = "Irl>Irlanda";
$a[] = "Isl>Islandia";
$a[] = "Jpn>Jap&oacute;n";
$a[] = "Kaz>Kazajist&aacute;n";
$a[] = "Ltu>Lituania";
$a[] = "Lux>Luxemburgo";
$a[] = "Mlt>Malta";
$a[] = "Mng>Mongolia";
$a[] = "Nor>Noruega";
$a[] = "Prt>Portugal";
$a[] = "rus>Rusia";
$a[] = "Wsm>Samoa";
$a[] = "Swe>Suecia";
$a[] = "Che>Suiza";
$a[] = "Tha>Tailandia";
$a[] = "Ury>Uruguay";
$a[] = "Ury>Uruguay";
$a[] = "Yem>Yemen";
$a[] = "Zmb>Zambia";

//Leemos la entrada del pais
$entrada = $_REQUEST["entrada"];
$hint = "";

// Buscamos la entrada dentro del array
if ($entrada !== ""){
    $entrada = strtolower($entrada);
    $len=strlen($entrada);
    foreach($a as $name){
        if (stristr($entrada, substr($name, 4, $len))){
            if ($hint === ""){
                $hint = "<option value=0 selected>Seleccione un pais</option><option value=".$name."</option>";
            } else {
                $hint .= "<option value=".$name.utf8_decode($q)."</option>";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "<option value=0 selected>".$entrada.", No coincide con ning&uacute;n pais configurado.</option>" : $hint;

?> 

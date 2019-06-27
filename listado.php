<?php
header('Content-Type: text/html; charset=UTF-8');

// Array de paises
$listaPaises[] = "And>Andorra";
$listaPaises[] = "Alb>Albania";
$listaPaises[] = "Deu>Alemania";
$listaPaises[] = "Bel>Bélgica";
$listaPaises[] = "Brb>Barbados";
$listaPaises[] = "Cze>Chequia";
$listaPaises[] = "Chl>Chile";
$listaPaises[] = "Dnk>Dinamarca";
$listaPaises[] = "Esp>España";
$listaPaises[] = "Ecu>Ecuador";
$listaPaises[] = "Est>Estonia";
$listaPaises[] = "Svn>Eslovenia";
$listaPaises[] = "Fin>Finlandia";
$listaPaises[] = "Geo>Georgia";
$listaPaises[] = "GBR>Reino Unido";
$listaPaises[] = "Hun>Hungría";
$listaPaises[] = "Ita>Italia";
$listaPaises[] = "Irl>Irlanda";
$listaPaises[] = "Isl>Islandia";
$listaPaises[] = "Jpn>Japón";
$listaPaises[] = "Kaz>Kazajistán";
$listaPaises[] = "Ltu>Lituania";
$listaPaises[] = "Lux>Luxemburgo";
$listaPaises[] = "Mlt>Malta";
$listaPaises[] = "Mng>Mongolia";
$listaPaises[] = "Nor>Noruega";
$listaPaises[] = "Prt>Portugal";
$listaPaises[] = "rus>Rusia";
$listaPaises[] = "Wsm>Samoa";
$listaPaises[] = "Swe>Suecia";
$listaPaises[] = "Che>Suiza";
$listaPaises[] = "Tha>Tailandia";
$listaPaises[] = "Ury>Uruguay";
$listaPaises[] = "Ury>Uruguay";
$listaPaises[] = "Yem>Yemen";
$listaPaises[] = "Zmb>Zambia";

//Leemos la entrada del pais
$entrada = $_REQUEST["entrada"];
$resultado = "";

// Buscamos la entrada dentro del array
if ($entrada !== ""){
    $entrada = strtolower($entrada);
    $len=strlen($entrada);
    foreach($listaPaises as $name){
        if (stristr($entrada, substr($name, 4, $len))){
            if ($resultado === ""){
                $resultado = "<option value=0 selected>Seleccione un pais</option><option value=".$name."</option>";
            } else {
                $resultado .= "<option value=".$name.utf8_decode($entrada)."</option>";
            }
        }
    }
}

// Si no existe un pais que coincida en la lista, se indica.
echo $resultado === "" ? "<option value=0 selected>".$entrada.", No coincide con ning&uacute;n pais configurado.</option>" : $resultado;

?> 

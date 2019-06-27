<?php
$entrada = strtoupper($_REQUEST["entrada"]);
$cSession = curl_init(); 
//curl_setopt($cSession,CURLOPT_URL,"http://services.groupkt.com/country/search?text=$entrada");
curl_setopt($cSession,CURLOPT_URL,"http://services.groupkt.com/country/get/iso3code/$entrada");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false); 
$result=curl_exec($cSession);
curl_close($cSession);
echo "Respuesta origen del servidor:<br>".$result."<br><br><br>";

//$decoded = json_decode($result);
//if (isset($decoded->RestResponse->status) && $decoded->RestResponse->status == 'ERROR') {
//    die('error occured: ' . $decoded->RestResponse->errormessage);
//}
echo "JSON_DECODE:<br>";
//var_export($decoded->RestResponse);
//echo "Nombre: ".$decoded->RestResponse;

$array = json_decode($result, true);
foreach($array as $key=>$value)
{
    echo "Salida: ".$key . "=>" . $value . "<br>";
}

//$array = json_decode($result, true);
foreach ($array as $emp) {
  echo $emp['Name']."<br/>";
}


$jsonIterator = new RecursiveIteratorIterator(new RecursiveArrayIterator(json_decode($result, TRUE)), RecursiveIteratorIterator::SELF_FIRST);
foreach ($jsonIterator as $key => $val) {
    if(is_array($val)) {
        echo "Key -> $key:<br><br>";
    } else {
        echo "Key: $key => Valor: $val<br>";
    }
}

//echo "Nombre1: ".$decoded->RestResponse->result;
//echo "Nombre2: ".$decoded->RestResponse->result->name;
//echo "Nombre3: ".$decoded->RestResponse->name;
//echo "Nombre4: ".$decoded->RestResponse->messages;
//echo "Nombre5: ".$decoded->messages;
//echo "Nombre6: ".$decoded->name;
?>

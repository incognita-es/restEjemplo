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
echo "Respuesta parseada:<br>";
//var_export($decoded->RestResponse);
//echo "Nombre: ".$decoded->RestResponse;

$jsonIterator = new RecursiveIteratorIterator(new RecursiveArrayIterator(json_decode($result, TRUE)), RecursiveIteratorIterator::SELF_FIRST);
foreach ($jsonIterator as $key => $val) {
    if(is_array($val)) {
        echo "Key -> $key:<br>";
    } else {
        echo " &nbsp;&nbsp;&nbsp;&nbsp;Key: $key => Valor: $val<br>";
    }
}
?>

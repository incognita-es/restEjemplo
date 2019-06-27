<?php
$entrada = strtoupper($_REQUEST["entrada"]);
$cSession = curl_init(); 
//curl_setopt($cSession,CURLOPT_URL,"http://services.groupkt.com/country/search?text=$entrada");
curl_setopt($cSession,CURLOPT_URL,"http://services.groupkt.com/country/get/iso3code/$entrada");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false); 
$result=curl_exec($cSession);
curl_close($cSession);
echo "Respuesta del servidor:<br>".$result."<br><br>";

$decoded = json_decode($result);
if (isset($decoded->RestResponse->status) && $decoded->RestResponse->status == 'ERROR') {
    die('error occured: ' . $decoded->RestResponse->errormessage);
}
echo "JSON_DECODE:<br>";
var_export($decoded->RestResponse);
echo $decoded->RestResponse;
?>

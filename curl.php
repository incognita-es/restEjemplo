<?php
$entrada = strtoupper($_REQUEST["entrada"]);
$cSession = curl_init(); 
//curl_setopt($cSession,CURLOPT_URL,"http://services.groupkt.com/country/search?text=$entrada");
curl_setopt($cSession,CURLOPT_URL,"http://services.groupkt.com/country/get/iso3code/$entrada");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false); 
$result=curl_exec($cSession);
curl_close($cSession);
//echo $result;

$decoded = json_decode($result);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}
//echo 'response ok!';
//var_export($decoded->response);
echo $decoded->response;

?>

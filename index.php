<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    
<?php
    function buscaCurl($direccion){
    //next example will recieve all messages for specific conversation
    $service_url = $direccion;
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);
        die('error occured during curl exec. Additioanl info: ' . var_export($info));
    } else {
        die("Funciono");
    }
    curl_close($curl);
    $decoded = json_decode($curl_response);
    if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
        die('error occured: ' . $decoded->response->errormessage);
    }
    echo 'response ok!';
    var_export($decoded->response);
    }
?>
    
<script>
function muestraPais(cadena) {
    if (!soloNombre(cadena)) {
        if (cadena.length == 0) {
            document.getElementById("Listado").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("Listado").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "listado.php?entrada=" + unescape(cadena), true);
            xmlhttp.send();
        }
    } else {
        window.alert("Aviso: Debe introducir caracteres en el nombre del pais");
    }
}
    
function soloNombre(myString) {
    return /\d/.test(myString);
}
    
function seleccion() {
    var phpadd = <?php buscaCurl("http:sisisisi");?>;
    window.alert(phpadd);
    var x = document.getElementById("Listado").value;
    document.getElementById("Resultados").innerHTML = "Has seleccionado el c&oacute;digo: " + x;
}
</script>
</head>
    
<body>
    <p><b>Comience a escribir el nombre de un pais:</b></p>
    <form>
        Nombre: <input type="text" onkeyup="muestraPais(this.value)">
    </form>
    <p>Listado de paises posibles:</p>
    <select id="Listado" onchange="seleccion()"></select>
    <br>
    <p id="Resultados"></p>

</body>
</html> 

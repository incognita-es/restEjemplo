<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<script>
			
			var function getOutput()
			{
				$.ajax({url:'myAjax.php',complete: function (response)
					{
						$('#output').html(response.responseText);
					}, error: function ()
					{
						$('#output').html('Bummer: there was an error!');
					}});
				return false;
			}
			
			
			function muestraPais(cadena)		
			{
				if (!soloNombre(cadena))
				{
					if (cadena.length == 0)
					{
						document.getElementById("Listado").innerHTML = "";
						return;
					}
					else
					{
						var xmlhttp = new XMLHttpRequest();
						xmlhttp.onreadystatechange = function()
						{
							if (this.readyState == 4 && this.status == 200)
							{
								document.getElementById("Listado").innerHTML = this.responseText;
							}
						};
						xmlhttp.open("GET", "listado.php?entrada=" + unescape(cadena), true);
						xmlhttp.send();
					}
				}
				else
				{
					window.alert("Aviso: Debe introducir caracteres en el nombre del pais");
				}
			}
				
			function soloNombre(myString)
			{
				return /\d/.test(myString);
			}			
	
			function seleccion()
			{
				var x = document.getElementById("Listado").value;
				document.getElementById("Resultados").innerHTML = "Has seleccionado el c&oacute;digo: " + x;
			}
		</script>
		
		<p><b>Comience a escribir el nombre de un pais:</b></p>
		<form>
			Nombre: <input type="text" onkeyup="muestraPais(this.value)">
		</form>
		<p>Listado de paises posibles:</p>
		<select id="Listado" onchange="seleccion()">
		</select>
		<br>
		<p id="Resultados"></p>
	</body>
</html> 

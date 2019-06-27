<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<script>
			
			function refreshData(){
				var x = document.getElementById("Listado").value;
				var display = document.getElementById("ContenidosREST");
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET", "curl5.php?entrada=" + x, true);
				xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xmlhttp.send();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState === 4 && this.status === 200) {
						display.innerHTML = this.responseText;
					} else {
						display.innerHTML = "Loading...";
					};
				}
			}
			
			function accion()
			{
				$.ajax({
					type:'POST', //aqui puede ser igual get
					url: 'curl2.php',//aqui va tu direccion donde esta tu funcion php
					data: {id:1,otrovalor:'valor'},//aqui tus datos
					success:function(data)
					{
						$('#output').html(response.responseText);
						//lo que devuelve tu archivo mifuncion.php
					},
					error:function(data)
					{
						$('#output').html('Bummer: there was an error!');
						//lo que devuelve si falla tu archivo mifuncion.php
					}
				});
			}
			
			function getOutput()
			{
				$.ajax({
					url:'curl2.php',
					complete: function (response)
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
		<select id="Listado" onchange="refreshData()">
		</select>
		<br>
		<p id="Resultados"></p>
		<input type="button" id="sample1" value="click1" onclick="getOutput()"/>
		<input type="button" id="sample2" value="click2" onclick="accion()"/>
		<button onclick=refreshData()>Say Hello</button>
		<div id="ContenidosREST" />
	</body>
</html> 

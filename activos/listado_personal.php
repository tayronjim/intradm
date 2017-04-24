<!DOCTYPE html>
<html>
	<head>
		<title>Grupos de Activos</title>
		<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				carga_personal();
			});

			function carga_personal(){
				$.post( "modelo.php", { "funcion" : "carga_personal"}, function(dataCarga) {
					$("#tblPersonal").append(dataCarga);
				});
			}

			function agrega_persona(){

				$txtNombre = $("#nombrePersona").val();
				$txtArea = $("#areaPersona").val();
				$txtPuesto = $("#puestoPersona").val();

				if ($txtNombre != "" && $txtArea != "" && $txtPuesto != "") {
					$.post( "modelo.php", { "funcion" : "agrega_personal", "nombre": $txtNombre, "area": $txtArea, "puesto": $txtPuesto }, function(dataPersonal) {
						alert( "success" + dataPersonal );
						$tabla = "<tr><td></td><td>"+$txtNombre+"</td><td>"+$txtArea+"</td><td>"+$txtPuesto+"</td></tr>";
						$("#tblPersonal").append($tabla);
					});
				}
				else { alert("Los campos no pueden estar vacios"); }
					
			}
				
		</script>
	</head>
	<body>
		Personal:<br>
		<input type="text" name="nombrePersona" id="nombrePersona" placeholder="Nombre"><br>
		<input type="text" name="areaPersona" id="areaPersona" placeholder="Area"><br>
		<input type="text" name="puestoPersona" id="puestoPersona" placeholder="Puesto"><br>
		<input type="button" name="agregarPersona" value="Agregar" onclick="agrega_persona()"><br>
		<table border="1" id="tblPersonal">
			<tr><td></td><td>Nombre</td><td>Área</td><td>Puesto</td></tr>
		</table>
	</body>
</html>
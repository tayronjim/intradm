<!DOCTYPE html>
<html>
	<head>
		<title>Grupos de Activos</title>
		<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				carga_grupos();
			});

			function carga_grupos(){
				$.post( "modelo.php", { "funcion" : "carga_grupos"}, function(data) {
					$("#tblGruposActivos").html(data);
				});
			}

			function agrega_grupo(){

				$txtGrupo = $("#nombreGrupo").val();
				if ($txtGrupo != "") {
					$.post( "modelo.php", { "funcion" : "agrega_grupo", "grupo": $txtGrupo }, function(data) {
						alert( "success" + data );
					});
				}
				else { alert("Campo 'Nuevo Grupo' no puede estar vacío"); }
					
			}
				
		</script>
	</head>
	<body>
		<input type="text" name="nombreGrupo" id="nombreGrupo" placeholder="Nuevo Grupo"><input type="button" name="agregarGrupo" value="Agregar" onclick="agrega_grupo()"><br>
		<table border="1" id="tblGruposActivos">
			
		</table>
	</body>
</html>
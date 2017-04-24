<?php
	session_start(); 
	if (! isset($_SESSION['login'])) {
		header('Location: ../acceso/login.php');
	}
	else{ ?>


<!DOCTYPE html>

<html>
	<head>
		<title>Listado de Activos</title>
		<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				carga_activos();

			});

			function carga_activos(){
				$.post( "modelo.php", { "funcion" : "carga_activos"}, function(data) {
					$("#tblActivos").append(data);
				});
			}

			function agrega_activo(){

				$txtNombre = $("#nombreActivos").val();
				$txtTipo = $("#tipoActivo").val();
				$txtGrupo = $("#grupoActivo").val();
				$txtResponsable = $("#responsableActivo").val();
				$txtDescr = $("#descrActivo").text();
				$txtSerie = $("#serieActivos").val();
				$txtModelo = $("#modeloActivos").val();
				$txtFabricante = $("#fabricanteActivos").val();
				$txtSO = $("#pcSOActivos").val();
				$txtCPU = $("#CPUActivos").val();
				$txtMemoria = $("#memoriaActivos").val();
				$txtAlmacenamiento = $("#almacenamientoActivos").val();
				$txtOperador = $("#operadorActivos").val();
				$txtTel = $("#telActivos").val();
				$txtIMEI = $("#IMEIActivos").val();

				$activo = '{ "nombre": "'+$txtNombre+'", "tipo":"'+$txtTipo+'", "grupo":"'+$txtGrupo+'", "responsable":"'+$txtResponsable+'", "descr":"'+$txtDescr+'", "serie":"'+$txtSerie+'", "modelo":"'+$txtModelo+'", "fabricante":"'+$txtFabricante+'", "so":"'+$txtSO+'", "cpu":"'+$txtCPU+'", "memoria":"'+$txtMemoria+'", "almacenamiento":"'+$txtAlmacenamiento+'", "operador":"'+$txtOperador+'", "telefono":"'+$txtTel+'", "imei":"'+$txtIMEI+'" }'

				$activoJSON = JSON.parse($activo);
				if ($txtNombre != "") {
					$.post( "modelo.php", { "funcion" : "agrega_activo", "activo": $activoJSON }, function(dataActivo) {
						alert( "success" + dataActivo );
					});
				}
				else { alert("Campo 'Nombre' no puede estar vacío"); }
					
			}
				
		</script>
	</head>
	<body>
		<input type="text" name="nombreActivos" id="nombreActivos" placeholder="Nombre"><br>
		Tipo: <select id="tipoActivo"> <?php carga_listado_tipo(); ?> </select><br>
		Grupo: <select id="grupoActivo"> <?php carga_listado_grupo(); ?> </select><br>
		Responsable: <select id="responsableActivo"> <?php carga_listado_personal(); ?> </select><br>
		Descripción: <textarea id="descrActivo"></textarea><br>
		<input type="text" name="serieActivos" id="serieActivos" placeholder="Serie"><br>
		<input type="text" name="modeloActivos" id="modeloActivos" placeholder="Modelo"><br>
		<input type="text" name="fabricanteActivos" id="fabricanteActivos" placeholder="Fabricante"><br>

		<!-- Campos para equipo de computo -->
		<input type="text" name="pcSOActivos" id="pcSOActivos" placeholder="Sistema Operativo"><br>
		<input type="text" name="CPUActivos" id="CPUActivos" placeholder="CPU"><br>
		<input type="text" name="memoriaActivos" id="memoriaActivos" placeholder="Memoria"><br>
		<input type="text" name="almacenamientoActivos" id="almacenamientoActivos" placeholder="Almacenamiento"><br>
		<!--      -->
		<!-- Campos para equipo celular -->
		<input type="text" name="operadorActivos" id="operadorActivos" placeholder="Operador"><br>
		<input type="number" name="telActivos" id="telActivos" placeholder="Numero Tel"><br>
		<input type="number" name="IMEIActivos" id="IMEIActivos" placeholder="IMEI"><br>
		<!--      -->

		<br>

		<input type="button" name="agregarGrupo" value="Agregar" onclick="agrega_activo()"><br>
		<table border="1" id="tblActivos">
			<tr><td>Nombre</td><td>Tipo</td><td>Grupo</td><td>Responsable</td><td>Descripción</td><td>Fabricante</td></tr>
		</table>
	</body>
</html>
<?php
	}  
?>
<?php
	function carga_listado_tipo(){
		$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$filter = [];
		$options = [
		    'projection' => ['_id' => 0],
		];

		$query = new MongoDB\Driver\Query($filter,$options);
		$cursor = $manager->executeQuery('activos.tipo', $query);
		$select = "";
		foreach ($cursor as $value) {
			foreach ($value->tipo as $tipo){
				$select .= "<option>".$tipo."</option>";
			}	
		} 
		echo $select;
	}

	function carga_listado_grupo(){
		$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$filter = [];
		$options = [
		    'projection' => ['_id' => 0],
		];

		$query = new MongoDB\Driver\Query($filter,$options);
		$cursor = $manager->executeQuery('activos.grupos', $query);
		foreach ($cursor as $value) {
			$select = "<option>".$value->nombre."</option>";
			echo $select;
		}
		
	}

	function carga_listado_personal(){
		$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$filter = [];
		$options = [
		    'projection' => ['_id' => 0],
		];

		$query = new MongoDB\Driver\Query($filter,$options);
		$cursor = $manager->executeQuery('activos.personal', $query);
		foreach ($cursor as $value) {
			$select = "<option>".$value->nombre."</option>";
			echo $select;
		}
	}
?>
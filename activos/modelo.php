<?php 
	$funcion = $_POST['funcion'];
	switch ($funcion) {
		case 'agrega_grupo':agrega_grupo($_POST['grupo']);
			break;
		case 'carga_grupos':carga_grupos();
			break;
		case 'agrega_personal': agrega_personal($_POST['nombre'],$_POST['area'],$_POST['puesto']);
		case 'carga_personal': carga_personal();
		case 'agrega_activo': agrega_activo($_POST['activo']);
		case 'carga_activos': carga_activos();
		default:
			# code...
			break;
	}

	function carga_grupos(){
		$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$filter = [];
		$options = [
		    'projection' => ['_id' => 0],
		];

		$query = new MongoDB\Driver\Query($filter,$options);
		$cursor = $manager->executeQuery('activos.grupos', $query);
		foreach ($cursor as $key => $value) {
			$tabla = "<tr><td></td><td></td><td>".$value->nombre."</td></tr>";
			echo $tabla;
		}
	}
	
	function agrega_grupo($grupo){
		$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

		$bulk = new MongoDB\Driver\BulkWrite;
		$nuevoGrupo = ['nombre' => $grupo];
		$bulk->insert($nuevoGrupo);

		$manager->executeBulkWrite('activos.grupos', $bulk);

	}	

	function agrega_personal($nombre,$area,$puesto){
		$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

		$bulk = new MongoDB\Driver\BulkWrite;
		$nuevoPersonal = ['nombre' => $nombre, 'area' => $area, 'puesto' => $puesto];
		$bulk->insert($nuevoPersonal);

		$manager->executeBulkWrite('activos.personal', $bulk);
	}

	function carga_personal(){
		$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$filter = [];
		$options = [
		    'projection' => ['_id' => 0],
		];

		$query = new MongoDB\Driver\Query($filter,$options);
		$cursor = $manager->executeQuery('activos.personal', $query);
		foreach ($cursor as $key => $value) {
			$tabla = "<tr><td></td><td>".$value->nombre."</td><td>".$value->area."</td><td>".$value->puesto."</td></tr>";
			echo $tabla;
		}
	}

	function agrega_activo($activo){
		$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

		$bulk = new MongoDB\Driver\BulkWrite;
		
		$bulk->insert($activo);

		$manager->executeBulkWrite('activos.listado', $bulk);
		
	}

	function carga_activos(){
		$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$filter = [];
		$options = [
		    'projection' => ['_id' => 0],
		];

		$query = new MongoDB\Driver\Query($filter,$options);
		$cursor = $manager->executeQuery('activos.listado', $query);
		foreach ($cursor as $key => $value) {
			
			$tabla = "<tr><td>".$value->nombre."</td><td>".$value->tipo."</td><td>".$value->grupo."</td><td>".$value->responsable."</td><td>".$value->descr."</td><td>".$value->fabricante."</td></tr>";
			echo $tabla;
		}
		
	}
	
 ?>
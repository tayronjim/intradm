<?php 

	require_once("funcionesdb.php");

	$funcion = $_POST["funcion"];
	switch($funcion){
		case 'buscaClientes': buscaClientes(); break;
		case 'buscaRS': buscaRS($_POST["id_cliente"]); break;
		case 'guardaProyecto': guardaProyecto($_POST["general"],$_POST['cliente'],$_POST["contrato"],$_POST["facturacion"]); break;
		case 'actualizaProyecto': actualizaProyecto($_POST["general"],$_POST['cliente'],$_POST["contrato"],$_POST["facturacion"],$_POST['actividades'],$_POST['seguimiento'],$_POST['proyecto']); break;
		
		// case 'guardaRegistroActividades': guardaRegistroActividades($_POST["datos"],$_POST["proyecto"]); break;
		// case 'guardaRegistroSeguimiento': guardaRegistroSeguimiento($_POST["datos"],$_POST["proyecto"]); break;
		case 'listadoInicialProyectos': listadoInicialProyectos(); break;
		case 'recuperaProyecto': recuperaProyecto($_POST["proyecto"]); break;
		case 'listaActividades': listaActividades($_POST["proyecto"]); break;
		// case 'listaSeguimientos': listaSeguimientos($_POST["proyecto"]); break;
		case 'buscaKam': buscaKam(); break;
		case 'buscaEstatus': buscaEstatus(); break;
		case 'buscaUltimoID': buscaUltimoID(); break;
		
		
		
		
	}

	function buscaClientes(){
		$clientes = recuperaClientes();
		// print_r($contacto);
		while ($row = mysqli_fetch_assoc($clientes)){
		    $cliente[] = $row;
		}
		$struct = array("Cliente" => $cliente);
		print json_encode($cliente);
	}

	function buscaKam(){
		$res = recuperakam();
		// print_r($contacto);
		while ($row = mysqli_fetch_assoc($res)){
		    $kam[] = $row;
		}
		print json_encode($kam);
	}

	function buscaRS($id_cliente){
		$rs = recuperaRS($id_cliente);
		// print_r($contacto);
			$row = mysqli_fetch_assoc($rs);
		    $clienteRS[] = $row;
		
		$struct = array("RS" => $row);
		print json_encode($clienteRS);
	}

	function buscaUltimoID(){
		$ultimoProyecto = ultimoProyecto();
			$row = mysqli_fetch_assoc($ultimoProyecto);
		    //$proyecto[] = $row;
		print json_encode($row['lastID']);
	}

	function guardaProyecto($general,$cliente,$contrato,$facturacion){
		$proyectoGuardado = nuevoProyecto($general,$cliente,$contrato,$facturacion);
		$ultimoProyecto = ultimoProyecto();

		$lastId = mysqli_fetch_assoc($ultimoProyecto);
		nuevasActividades($lastId['lastID']);
		// nuevosSeguimientos($lastId['lastID']);
		print $lastId['lastID'];
	}

	function actualizaProyecto($general,$cliente,$contrato,$facturacion,$actividades,$seguimiento,$proyecto){
		$proyectoRes = actualizaProy($general,$cliente,$contrato,$facturacion,$proyecto);
		$actividadSeg = actualizaActividades($actividades,$seguimiento,$proyecto);
		echo $proyectoRes." - ".$actividadSeg;
	}

	function listadoInicialProyectos(){
		$listadoProyectos = listadoProyectos();
		while ($row = mysqli_fetch_assoc($listadoProyectos)){
		    $cliente = json_decode($row['cliente']);
		    $busqueda_cliente = buscaCliente($cliente->cliente);
			$cli[0] = mysqli_fetch_assoc($busqueda_cliente);
			$row['cliente'] = array("ids"=>$row['cliente'],"otros"=>$cli[0]);
			
			$proy[] = $row;
			
		}

		$listadoEstatus = recuperaEstatus();
		while ($row = mysqli_fetch_assoc($listadoEstatus)){
		    $estatus[$row['clave']] = $row;
		}

		$struct = array("Proyectos" => $proy, "Estatus" => $estatus);
		print json_encode($struct);
		
	}

	function recuperaProyecto($proyecto){
		$listadoProyecto = recuperaProyectoCliente($proyecto);
		while ($row = mysqli_fetch_assoc($listadoProyecto)){
		    $proy[] = $row;
		    $cliente = json_decode($row['cliente']);
		}
		
		$busqueda_cliente = buscaCliente($cliente->cliente);
		$cli[] = mysqli_fetch_assoc($busqueda_cliente);

		$listadoEstatus = recuperaEstatus();
		while ($row = mysqli_fetch_assoc($listadoEstatus)){
		    $estatus[] = $row;
		}

		$struct = array("Proyecto" => $proy, "Cliente" => $cli, "Estatus" => $estatus);
		print json_encode($struct);
	}

	function listaActividades($proyecto){
		$listadoActividades = listadoActividades($proyecto);
		$proy =  mysqli_fetch_assoc($listadoActividades);
		if (empty($proy)){
			nuevasActividades($proyecto);
			listaActividades($proyecto);
		}
		else echo '{"actividad":'.$proy['actividad'].',"seguimiento":'.$proy['seguimiento'].'}';
	}

	function buscaEstatus(){
		$res = recuperaEstatus();
		// print_r($contacto);
		while ($row = mysqli_fetch_assoc($res)){
		    $estatus[] = $row;
		}
		print json_encode($estatus);
	}

 ?>
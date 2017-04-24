<?php

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

//--- INSERTAR VALORES ------

// $bulk = new MongoDB\Driver\BulkWrite;

// $login = ['id' => 3,'usuario' => 'YO@diazmorones.com','clave' => 'master','tipo' => 'admin'];

// $bulk->insert($login);

// $login = ['id' => 4,'usuario' => 'YO@diazmorones.com','clave' => 'master2','tipo' => 'admin'];

// $bulk->insert($login);

// $manager->executeBulkWrite('login.acceso', $bulk);



//--- MODIFICAR VALORES ---

// $bulk = new MongoDB\Driver\BulkWrite;

// $bulk->update(['usuario' => 'sistemas@diazmorones.com'],['$set' =>['otro' => 'valor de otro']]);

// $manager->executeBulkWrite('login.acceso', $bulk);



// --- ELIMINAR REGISTROS ---

// $bulk = new MongoDB\Driver\BulkWrite;

// $bulk -> delete(['usuario' => 'YO@diazmorones.com']);

// $manager->executeBulkWrite('login.acceso', $bulk);



// --- BUSCAR REGISTROS ----

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$filter = ['usuario' => $usuario, 'clave' => $clave];
$options = [
    'projection' => ['_id' => 0],
];

$query = new MongoDB\Driver\Query($filter,$options);
$cursor = $manager->executeQuery('login.acceso', $query);
$login = 0;

foreach ($cursor as $document) {
	$login ++;
	$u = $document->usuario;
	//echo $u."<br>";
   //print_r($document);echo "<br>";
}

if ($login > 0) {
	session_start();
	$_SESSION['login']=$document;
	echo "1";
}
else echo "0";


 ?>
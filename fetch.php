<?php
header('Content-Type: application/json');
$pdo=new PDO("mysql:dbname=water_monetering;host=127.0.0.1","test","1234");
switch($_GET['i']){
		// Buscar Último Dato
		case 1:
		    $statement=$pdo->prepare("SELECT volume_in_ltrs FROM tank ORDER BY s_no DESC LIMIT 0,1");
			$statement->execute();
			$results=$statement->fetchAll(PDO::FETCH_ASSOC);
			$json=json_encode($results);
			echo $json;
		break; 
		// Buscar Todos los datos
		default:
			
			$statement=$pdo->prepare("SELECT ran FROM rand ORDER BY id ASC");
			$statement->execute();
			$results=$statement->fetchAll(PDO::FETCH_ASSOC);
			$json=json_encode($results);
			echo $json;
		break;
}
?>
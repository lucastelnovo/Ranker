<?php

require_once 'clases/Conexion.php';

$password = $_POST['pass'];

$code = strcmp($password, "tree2013beo");

if ($code == 0) {
	
	// Ejecuto el SP de actualizar ranking
	$unaConexion = new Conexion ( "localhost", "root", "lucas", "RankingPingPong" );
		
		$unaConexion->conectar ();
		
		$registros = $unaConexion->consultar ( "call actualizar_datos" );

		$unaConexion->desconectar();
		
	echo 1;
}else{
	echo 0;
}


?>
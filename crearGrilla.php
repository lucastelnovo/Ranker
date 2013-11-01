<?php
	include ("clases/Listado.php");

	$cantSets = $_POST['cantSets'];

	$listado4 = new Listado();

	$grilla = $listado4->crearGrillaPuntos($cantSets);
	
	return $grilla;
?>
<?php
include ("clases/Listado.php");

$idJugador1 = $_POST['idJug1'];
$idJugador2 = $_POST['idJug2'];

$listado1 = new Listado();

$historial = $listado1->verHistorial($idJugador1, $idJugador2);

return $historial;

?>
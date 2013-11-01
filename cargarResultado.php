<?php
include ("clases/Listado.php");

$idJugador1 = $_POST['jugador1'];
$idJugador2 = $_POST['jugador2'];
$pts1 = $_POST['puntos11']; // Puntos jugador 1, primer set
$pts2 = $_POST['puntos21']; // Puntos jugador 1, segundo set
$pts3 = $_POST['puntos31']; // Puntos jugador 1, tercer set
$pts4 = $_POST['puntos41']; // Puntos jugador 1, cuarto set
$pts5 = $_POST['puntos51']; // Puntos jugador 1, quinto set

$pts6 = $_POST['puntos12']; // Puntos jugador 2, primer set
$pts7 = $_POST['puntos22']; // Puntos jugador 2, segundo set
$pts8 = $_POST['puntos32']; // Puntos jugador 2, tercer set
$pts9 = $_POST['puntos42']; // Puntos jugador 2, cuarto set
$pts10 = $_POST['puntos52']; // Puntos jugador 2, quinto set

if(!isset($pts1))
	$pts1 = 0;
if(!isset($pts2))
	$pts2 = 0;
if(!isset($pts3))
	$pts3 = 0;
if(!isset($pts4))
	$pts4 = 0;
if(!isset($pts5))
	$pts5 = 0;
if(!isset($pts6))
	$pts6 = 0;
if(!isset($pts7))
	$pts7 = 0;
if(!isset($pts8))
	$pts8 = 0;
if(!isset($pts9))
	$pts9 = 0;
if(!isset($pts10))
	$pts10 = 0;

if (isset($_POST['winner1'])) {
	$idJugadorGanador = $idJugador1;
	$idJugadorPerdedor = $idJugador2;
}else{
	$idJugadorGanador = $idJugador2;
	$idJugadorPerdedor = $idJugador1;
}

$listado1 = new Listado();

if ($idJugadorGanador == $idJugador1) {
	$listado1->insertResultado($idJugadorGanador, $idJugadorPerdedor, $pts1, $pts2, $pts3, $pts4, $pts5, $pts6, $pts7, $pts8, $pts9, $pts10);
}else{
	$listado1->insertResultado($idJugadorGanador, $idJugadorPerdedor, $pts6, $pts7, $pts8, $pts9, $pts10, $pts1, $pts2, $pts3, $pts4, $pts5);	
}


header("Location: index.php?succ=1");
?>
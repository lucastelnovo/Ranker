<?php

require_once 'clases/Conexion.php';

class Listado {
	
	public $lista;
	
	public function imprimirRanking() {
		
		$unaConexion = new Conexion ( "localhost", "root", "lucas", "RankingPingPong" );
		
		$unaConexion->conectar ();
		
		$registros = $unaConexion->consultar ( "select idJugadores, nombre, apellido, puntos, partidos_jugados, partidos_ganados, partidos_perdidos from Jugadores order by puntos desc" );
		
		while ( $this->lista = mysql_fetch_array ( $registros ) ) {

			$pos = 1;	
			$idJug = $this->lista['idJugadores'];
			$nombre = $this->lista['nombre'];
			$apellido = $this->lista['apellido'];
			$puntos = $this->lista['puntos'];
			$pj = $this->lista['partidos_jugados'];
			$pg = $this->lista['partidos_ganados'];
			$pp = $this->lista['partidos_perdidos'];		
			
			echo "<tr>
					<td>$pos °</td>					
					<td>$nombre</td>
					<td>$apellido</td>
					<td>$puntos</td>
					<td>$pj</td>
					<td>$pg</td>
					<td>$pp</td>
				</tr>";		

			$pos = $pos + 1;	
		}
		
		$unaConexion->desconectar ();
	
	}

	public function cargarResultado(){

		$unaConexion = new Conexion ( "localhost", "root", "lucas", "RankingPingPong" );
		
		$unaConexion->conectar ();

		$registros = $unaConexion->consultar ( "select idJugadores, nombre, apellido from Jugadores order by puntos desc" );

		while ( $this->lista = mysql_fetch_array ( $registros ) ) {

			$idJug = $this->lista['idJugadores'];
			$nombre = $this->lista['nombre'];
			$apellido = $this->lista['apellido'];		

			
			echo "<option value=$idJug>A</option>";			
		}
		
		$unaConexion->desconectar ();




	}
}

?>

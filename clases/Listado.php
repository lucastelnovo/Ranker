<?php

require_once 'clases/Conexion.php';

class Listado {
	
	public $lista;
	
	public function imprimirRanking() {
		
		$unaConexion = new Conexion ( "localhost", "root", "lucas", "RankingPingPong" );
		
		$unaConexion->conectar ();
		
		$registros = $unaConexion->consultar ( "select idJugadores, nombre, apellido, puntos, partidos_jugados, partidos_ganados, partidos_perdidos from Jugadores order by puntos desc" );
		
		while ( $this->lista = mysql_fetch_array ( $registros ) ) {

			
			$idJug = $this->lista['idJugadores'];
			$nombre = $this->lista['nombre'];
			$apellido = $this->lista['apellido'];
			$puntos = $this->lista['puntos'];
			$pj = $this->lista['partidos_jugados'];
			$pg = $this->lista['partidos_ganados'];
			$pp = $this->lista['partidos_perdidos'];	
			
			if($pj == 0){
				$eficiencia = "N/A";
			}else{
				$eficiencia = ($pg / $pj)*100;
			}

			$eficiencia = round($eficiencia, 1);
			
			echo "<tr>				
					<td>$nombre</td>
					<td>$apellido</td>
					<td>$puntos</td>
					<td>$pj</td>
					<td>$pg</td>
					<td>$pp</td>
					<td>$eficiencia%</td>
				</tr>";		

			$pos = $pos + 1;	
		}
		
		$unaConexion->desconectar ();
	
	}

	public function listarJugadores(){

		$unaConexion = new Conexion ( "localhost", "root", "lucas", "RankingPingPong" );
		
		$unaConexion->conectar ();

		$registros = $unaConexion->consultar ( "select idJugadores, nombre, apellido from Jugadores order by puntos desc" );

		while ( $this->lista = mysql_fetch_array ( $registros ) ) {

			$idJug = $this->lista['idJugadores'];
			$nombre = $this->lista['nombre'];
			$apellido = $this->lista['apellido'];

			$fullname = $nombre . ' ' . $apellido;		

			
			echo "<option value=$idJug>$fullname</option>";			
		}
		
		$unaConexion->desconectar ();
	}

	public function insertResultado($idJugadorGanador, $idJugadorPerdedor, $pts11, $pts21, $pts31, $pts41, $pts51, $pts12, $pts22, $pts32, $pts42, $pts52){

		$unaConexion = new Conexion ( "localhost", "root", "lucas", "RankingPingPong" );
		
		$unaConexion->conectar ();

		$registros = $unaConexion->consultar ("insert into Partido (idJugadorGanador, idJugadorPerdedor, puntosJugadorGanadorSet1, puntosJugadorGanadorSet2, puntosJugadorGanadorSet3, puntosJugadorGanadorSet4, puntosJugadorGanadorSet5, puntosJugadorPerdedorSet1, puntosJugadorPerdedorSet2, puntosJugadorPerdedorSet3, puntosJugadorPerdedorSet4, puntosJugadorPerdedorSet5) VALUES ($idJugadorGanador, $idJugadorPerdedor, $pts11, $pts21, $pts31, $pts41, $pts51, $pts12, $pts22, $pts32, $pts42, $pts52)");

		$unaConexion->desconectar();

	}

	public function verHistorial($idJug1, $idJug2){

		$unaConexion = new Conexion ( "localhost", "root", "lucas", "RankingPingPong" );
		
		$unaConexion->conectar ();

		$registros = $unaConexion->consultar(
			"select j1.nombre as nomJug1, j1.apellido as apeJug1, j1.edad as edadJug1, j2.nombre as nomJug2, j2.apellido as apeJug2, j2.edad as edadJug2, h.partidos_jugados,
					h.partidos_ganados_jug1, h.partidos_ganados_jug2
			from 	Historial h join Jugadores j1 on h.idJug1 = j1.idJugadores join Jugadores j2
					on h.idJug2 = j2.idJugadores
			where	(h.idJug1 = $idJug2	AND h.idJug2 = $idJug1) OR (h.idJug1 = $idJug1 AND h.idJug2 = $idJug2)");

		while ( $this->lista = mysql_fetch_array ( $registros ) ) {

			$nombreJug1 = $this->lista['nomJug1'];
			$apellidoJug1 = $this->lista['apeJug1'];
			$edadJug1 = $this->lista['edadJug1'];
			$nombreJug2 = $this->lista['nomJug2'];
			$apellidoJug2 = $this->lista['apeJug2'];
			$edadJug2 = $this->lista['edadJug2'];

			$partidos_jugados = $this->lista['partidos_jugados'];
			$partidos_ganados_jug1 = $this->lista['partidos_ganados_jug1'];
			$partidos_ganados_jug2 = $this->lista['partidos_ganados_jug2'];

			$fullnameJug1 = $nombreJug1 . ' ' . $apellidoJug1;		
			$fullnameJug2 = $nombreJug2 . ' ' . $apellidoJug2;	

			$imgJug1 = "files/profiles/" . $idJug1 . ".jpg";
			$imgJug2 = "files/profiles/" . $idJug2 . ".jpg";

			}

			$historial = "<table style=\"table-layout: fixed;\" CELLPADDING=\"2\" CELLSPACING=\"2\" WIDTH=\"350\" border=\"1\">
						<tr>
							<th>$fullnameJug1</th>
							<th>$fullnameJug2</th>
						</tr>
						<tr>
							<td align='center' valign='top'><img class='foto' src=\"$imgJug1\" width=\"150\" height=\"200\"/></td>
							<td align='center' valign='top'><img class='foto' src=\"$imgJug2\" width=\"150\" height=\"200\"/></td>
						</tr>
						<tr>
    						<td colspan=\"2\">EDAD</td>
  						</tr>
  						<tr>
    						<td>$edadJug1</td>
    						<td>$edadJug2</td>
  						</tr>
  						<tr>
    						<td colspan=\"2\">PARTIDOS JUGADOS</td>
  						</tr>
  						<tr>
    						<td colspan=\"2\">$partidos_jugados</td>
  						</tr>
  						<tr>
    						<td colspan=\"2\">PARTIDOS GANADOS</td>
  						</tr>
  						<tr>
    						<td>$partidos_ganados_jug1</td>
    						<td>$partidos_ganados_jug2</td>
  						</tr>
					</table>
					
					<br>";	
		
		$unaConexion->desconectar ();

		echo $historial;

	}

	public function listarPuntos(){

		for ($i=0; $i < 22; $i++) { 
			echo "<option value=$i>$i</option>";	
		}

	}

	public function crearGrillaPuntos($cantSets){

		echo "<table border=\"1\">
						<tr>";

		echo "<th>Jugador</th>";

		for ($j=1; $j <= $cantSets ; $j++) { 

				echo "<th>$j</th>";
						
		}

		echo "<th>Ganador</th>";

		for ($i=1; $i <= 2; $i++) { 

			echo "<tr>";

			echo "<th><select name=\"jugador$i\" id=\"jugador$i\">";
			echo $this->listarJugadores();
			echo "</select></th>";

			for ($k=1; $k <= $cantSets; $k++) { 
				echo "<td><select name=\"puntos$k$i\" id=\"puntos$k$i\">";
				echo $this->listarPuntos();
				echo "</select></td>";
			}

			echo "<td><input onclick=\"changeCheckOptionWinner($i);\" type=\"radio\" name=\"winner$i\" id=\"winner$i\"></td>";
			
			echo "</tr>";
			
		}	

		echo "</table>";
	}

}

?>

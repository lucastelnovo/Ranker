<!DOCTYPE html>
	<html>
	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>Ranker</title>
			<link rel="stylesheet" href="css/style.css">

			<script src="js/jquery-1.7.2.min.js"></script>
	
	</head>

	<body>
		<h1 align="center">RANKING DE PING PONG OFICIAL</h1>

		<p align="center">Actualizado por última vez el día: </p>
		
		<br>
		
		<table border="1" style="margin: 0px auto;">
			<tr>
				<th>Pos</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Puntos</th>
				<th>PJ</th>
				<th>PG</th>
				<th>PP</th>
			</tr>

			<?php

				include ("clases/Listado.php");

				$listado1 = new Listado();

				$listado1->imprimirRanking();

			?>
		</table>

		<br>
		<br>	

		<button onclick="showCargarResultado()">CARGAR RESULTADO</button>

		<br>
		<br>

		<div id="cargarResultado" style="visibility: hidden;">
					
					<p>Jugador ganador</p>
					<select name="listaJugGan" id="listaJugGan">

						<?php

						include ("clases/Listado.php");

						$listado2 = new Listado();

						$listado2->cargarResultado();

						?>
					</select>

					<p>Jugador perdedor</p>
					<select name="listaJugPerd" id="listaJugPerd">

						<?php

						include ("clases/Listado.php");

						$listado3 = new Listado();

						$listado3->cargarResultado();

						?>
					</select>

		</div>		

		<script>

				function showCargarResultado(){
					$('#cargarResultado').show();
				}

			</script>
	</body>
</html>
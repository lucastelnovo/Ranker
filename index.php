<!DOCTYPE html>
	<html>
	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>Ranker</title>
			<link rel="stylesheet" href="css/style.css">
			<link rel="stylesheet" href="css/messi.min.css">
			<link rel="stylesheet" href="css/jqueryUI.css">
			<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />	
	</head>

	<body>

			<!--  JavaScript -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>		
		<script src="js/jquery-1.7.2.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src="js/functions.js"></script>
		<script type="text/javascript" src="js/jqueryUI.js"></script>
		<script type="text/javascript" src="js/messi.min.js"></script>

		<h1 align="center">RANKING DE PING PONG OFICIAL</h1>
		
		<button id="create-user">Actualizar Ranking</button>
		
		<br>		
		<br>	

		<div id="dialog-form" title="Actualizar Ranking">
  			<form>
  				<fieldset>
    				<label for="password">Contraseña</label><br>
    				<input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
  				</fieldset>
  			</form>
		</div>


		<table border="1" style="margin: 0px auto;">
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Puntos</th>
				<th>PJ</th>
				<th>PG</th>
				<th>PP</th>
				<th>Eficiencia</th>
			</tr>

			<?php

				include ("clases/Listado.php");

				$listado1 = new Listado();

				$listado1->imprimirRanking();

			?>
		</table>

		<br>
		<br>	

		<button onclick="limpiar();showCargar();">CARGAR RESULTADO</button>
		<button onclick="limpiar();showHisto();">VER HISTORIALES</button>

		<br>
		<br>

		<div id="cargarResultado" style="display: none;">

					<?php
					if (isset($_REQUEST['succ'])) {
						echo 	"<script type=\"text/javascript\">
						   						function resultadoCargadoSuccess(){
									new Messi('El resultado ha sido cargado. Será verificado en breve por el administrador.', {title: 'Resultado cargado', titleClass: 'success', buttons: [{id: 0, label: 'Cerrar', val: 'X'}]});              			    			
											}
											resultadoCargadoSuccess();
						   					</script>";
					}

					?>



					<p style="text-decoration: underline;">PARTIDO OFICIAL</p>
					<form id="cargarPartido" action="cargarResultado.php" method="POST">
					<select name="cantSets" id="cantSets" onchange="modificarGrilla();">
						<option value="1">1 SET</option>
						<option value="3" selected>3 SET</option>
						<option value="5">5 SET</option>
					</select>

					<br>
					<br>

					<div id="grillaPuntos" align="center">
						
						<!-- Creo la grilla -->

					</div>
					
					<br>					
					<button onclick="return validar('jugador1', 'jugador2');" type="submit">Cargar resultado</button>					
					<br>
					</form>					
		</div>	

		<div id="verHistorial" style="display: none;">
			<p style="text-decoration: underline;">SELECCIONE DOS JUGADORES</p>
					
					<select name="listaJug1" id="listaJug1">

						<?php

						$listado2 = new Listado();

						$listado2->listarJugadores();

						?>
					</select>
					
					<select name="listaJug2" id="listaJug2">

						<?php

						$listado3 = new Listado();

						$listado3->listarJugadores();

						?>
					</select>
					
					<br>
					<br>
					<button onclick="return submitHistorial('listaJug1', 'listaJug2');" type="submit">Ver Historial</button>
		</div>	

		<div id="showHistorialVS" style="width: 340px; margin-left: auto; margin-right: auto; margin-top: 15px; ">
			
		</div>

		<script>
			$( document ).ready(function() {
  				modificarGrilla();
			});
		</script>
	</body>
</html>
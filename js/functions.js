		function showCargar(){
			$('#cargarResultado').show();
		}

		function hideCargar(){
			$('#cargarResultado').hide();
		}

		function showHisto(){
			$('#verHistorial').show();	
		}

		function hideHisto(){
			$('#verHistorial').hide();	
			$('#showHistorialVS').hide();
		}

		function limpiar(){
			hideCargar();
			hideHisto();
		}

		function validarJugadoresDistintos(jug1, jug2){
			var pj1 = '#' + jug1;
			var pj2 = '#' + jug2;
			var val1 = $(pj1).val();
			var val2 = $(pj2).val();
			
			if (val1 == val2){
				// alert("Los jugadores seleccionados deben ser distintos.\n")
				return false;
			}

			return true;
		}

		function validarJugadoresDistintosConAlert(jug1, jug2){
			var pj1 = '#' + jug1;
			var pj2 = '#' + jug2;
			var val1 = $(pj1).val();
			var val2 = $(pj2).val();
			
			if (val1 == val2){
				alert("Los jugadores seleccionados deben ser distintos.\n")
				return false;
			}

			return true;
		}

		function validarPuntaje(pts1, pts2){
			var pt1 = '#' + pts1;
			var pt2 = '#' + pts2;
			var val1 = $(pt1).val();
			var val2 = $(pt2).val();

			val1 = parseInt(val1);
			val2 = parseInt(val2);

			if (val1 > val2){
				// alert("El puntaje del jugador ganador no puede ser menor al del jugador perdedor.\n");
				return false;
			}

			return true;
		}

		function changeCheckOptionWinner(number){
			if (number == 1) {
				$('#winner2').prop('checked', false);
			}else{
				$('#winner1').prop('checked', false);
			};
		}

		function atLeastOneRadio() {
    		return ($('input[type=radio]:checked').size() > 0);
		}

		function validar(jug1, jug2){
			var msg = "";
			
			if(!validarJugadoresDistintos(jug1, jug2)){
				msg += "Los jugadores seleccionados deben ser distintos.\n";
			}

			if(!atLeastOneRadio()){
				msg += "Por favor seleccione al jugador ganador.\n";
			}

			if(msg){
				alert(msg);
				return false;
			}			
		}

		function modificarGrilla(){

			var cant = $('#cantSets').val();
  			
  			$.ajax({
  				type: "POST",
  				data: {cantSets: cant},
        		url: 'crearGrilla.php',
        		success: function(data){
        			$('#grillaPuntos').html(data);
        		}
    		});

		}

		function showHistorial(){

			var idJug1 = $('#listaJug1').val();
			var idJug2 = $('#listaJug2').val();

			$.ajax({
  				type: "POST",
  				data: {idJug1: idJug1, idJug2: idJug2},
  				cache: false,
        		url: 'verHistorial.php',
        		success: function(data){
        			var hist = $('#showHistorialVS')
        			hist.html(data);
        			hist.show();     			
        		}
    		});
		}

		function cargarResult(){

			var idJug1 = $('#jugador1').val();
			var idJug2 = $('#jugador2').val();

			var puntos11 = $('#puntos11').val();
			var puntos21 = $('#puntos21').val();
			var puntos31 = $('#puntos31').val();
			var puntos41 = $('#puntos41').val();
			var puntos51 = $('#puntos51').val();

			var puntos12 = $('#puntos12').val();
			var puntos22 = $('#puntos22').val();
			var puntos32 = $('#puntos32').val();
			var puntos42 = $('#puntos42').val();
			var puntos52 = $('#puntos52').val();

			var winner1 = $('#winner1').val();

			$.ajax({
  				type: "POST",
  				data: {idJug1: idJug1, idJug2: idJug2, puntos11: puntos11, puntos21: puntos21, puntos31: puntos31, puntos41: puntos41, puntos51: puntos51, puntos12: puntos12, puntos22: puntos22, puntos32: puntos32, puntos42: puntos42, puntos52: puntos52},
  				cache: false,
        		url: 'cargarResultado.php',
        		success: function(){
        			new Messi('El resultado ha sido cargado. Será verificado en breve por el administrador.', {title: 'Resultado cargado', titleClass: 'success', buttons: [{id: 0, label: 'Cerrar', val: 'X'}]});              			    			
        		}
    		});
		}

		function submitResultado(jug1, jug2){
			
			if(validar(jug1, jug2)){
				return cargarResult();
			}else{
				return false;
			}
		}

		function submitHistorial(jug1, jug2){

			if(validarJugadoresDistintosConAlert(jug1, jug2)){
				return showHistorial();
			}else{
				return false;
			}

		}
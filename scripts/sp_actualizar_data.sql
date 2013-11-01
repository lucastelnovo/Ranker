-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_datos`()
BEGIN

DECLARE v_idJugadorGanador INT DEFAULT 0;
DECLARE v_idJugadorPerdedor INT DEFAULT 0;
DECLARE v_idJugador1 INT DEFAULT 0;
DECLARE v_idJugador2 INT DEFAULT 0;
DECLARE v_PGJug1 INT DEFAULT 0;
DECLARE v_PGJug2 INT DEFAULT 0;
DECLARE v_JugGan INT DEFAULT 0;
DECLARE v_puntosJugGan INT DEFAULT 0;
DECLARE v_puntosJugPerd INT DEFAULT 0;
DECLARE v_idHist INT DEFAULT 0;
DECLARE v_finished INT DEFAULT 0;

DECLARE cursor_actualiza_jugadores CURSOR FOR 
	SELECT idJugadorGanador, idJugadorPerdedor 
	FROM	Partido
	WHERE	verificado = 1 AND oficializado = 0;

DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_finished = 1;

OPEN cursor_actualiza_jugadores;

SET v_finished = 0;

FETCH cursor_actualiza_jugadores INTO v_idJugadorGanador, v_idJugadorPerdedor;

actualizar_loop:WHILE (v_finished = 0) DO

# Obtengo el id del Historial entre los jugadores del partido en v_idHist
SELECT idHistorial into v_idHist
FROM Historial
WHERE	(v_idJugadorGanador = idJug1 and v_idJugadorPerdedor = idJug2) or
		(v_idJugadorPerdedor = idJug1 and v_idJugadorGanador = idJug2);

# Obtengo los partidos ganados por el jugador 1 en v_PGJug1
SELECT partidos_ganados_jug1 into v_PGJug1
FROM Historial
WHERE idHistorial = v_idHist;

# Obtengo los partidos ganados por el jugador 2 en v_PGJug2
SELECT partidos_ganados_jug2 into v_PGJug2
FROM Historial
WHERE idHistorial = v_idHist;

# Obtengo cual fue el jugador ganador
SELECT idJug1, idJug2 into v_idJugador1, v_idJugador2
FROM Historial
WHERE idHistorial = v_idHist;

IF (v_idJugadorGanador = v_idJugador1) THEN #Gano el Jug1
SET v_PGJug1 = v_PGJug1 + 1;
ELSE # Gano el idJug2
SET v_PGJug2 = v_PGJug2 + 1;
END IF;

UPDATE Historial SET partidos_jugados = partidos_jugados + 1, partidos_ganados_jug1 = v_PGJug1, partidos_ganados_jug2 = v_PGJug2
WHERE idHistorial = v_idHist;

-- Actualizo los jugadores
SELECT puntos into v_puntosJugGan
FROM Jugadores
WHERE idJugadores = v_idJugadorGanador;

SELECT puntos into v_puntosJugPerd
FROM Jugadores
WHERE idJugadores = v_idJugadorPerdedor;

-- Jugador ganador
UPDATE Jugadores SET partidos_jugados = partidos_jugados + 1, partidos_ganados = partidos_ganados + 1, puntos = calcularPuntosELOWin(v_puntosJugGan)
WHERE idJugadores = v_idJugadorGanador;

-- Jugador perdedor
UPDATE Jugadores SET partidos_jugados = partidos_jugados + 1, partidos_perdidos = partidos_perdidos + 1, puntos = calcularPuntosELOLoss(v_puntosJugPerd)
WHERE idJugadores = v_idJugadorPerdedor;

UPDATE Partido set oficializado = 1 where idJugadorGanador = v_idJugadorGanador and idJugadorPerdedor = v_idJugadorPerdedor;

FETCH cursor_actualiza_jugadores INTO v_idJugadorGanador, v_idJugadorPerdedor;

END WHILE actualizar_loop;

CLOSE cursor_actualiza_jugadores;

SET v_finished = 0;

END
DELIMITER //

CREATE TRIGGER historiales AFTER INSERT ON Partido
FOR EACH ROW
BEGIN

DECLARE IdHist INT;
DECLARE PGJug1 INT;
DECLARE PGJug2 INT;
DECLARE JugGan INT;

SELECT idHistorial into idHist
FROM Historial
WHERE	(NEW.idJugadorGanador = idJug1 and NEW.idJugadorPerdedor = idJug2) or
		(NEW.idJugadorPerdedor = idJug1 and NEW.idJugadorGanador = idJug2);

SELECT partidos_ganados_jug1 into PGJug1
FROM Historial
WHERE idHistorial = idHist;

SELECT partidos_ganados_jug2 into PGJug2
FROM Historial
WHERE idHistorial = idHist;

SELECT count(*) into JugGan
FROM Historial
WHERE	idHistorial = idHist and
		idJug1 = NEW.idJugadorGanador;


IF (JugGan > 0) THEN # Gano el idJug1
SET PGJug1 = PGJug1 + 1;
ELSE # Gano el idJug2
SET PGJug2 = PGJug2 + 1;
END IF;

UPDATE Historial SET partidos_jugados = partidos_jugados + 1, partidos_ganados_jug1 = PGJug1, partidos_ganados_jug2 = PGJug2
WHERE idHistorial = idHist;

-- Actualizo los jugadores

-- Jugador ganador
UPDATE Jugadores SET partidos_jugados = partidos_jugados + 1, partidos_ganados = partidos_ganados + 1
WHERE idJugadores = NEW.idJugadorGanador;

-- Jugador perdedor
UPDATE Jugadores SET partidos_jugados = partidos_jugados + 1, partidos_perdidos = partidos_perdidos + 1
WHERE idJugadores = NEW.idJugadorPerdedor;

END
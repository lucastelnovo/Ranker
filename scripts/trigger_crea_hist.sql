DELIMITER //

CREATE TRIGGER crearHistoriales AFTER INSERT ON Jugadores
FOR EACH ROW
BEGIN

DECLARE v_idJug INT;
DECLARE v_finished INT;

DECLARE cursor_crea_historiales CURSOR FOR 
	SELECT idJugadores
	FROM	Jugadores;

DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_finished = 1;

OPEN cursor_crea_historiales;

SET v_finished = 0;

FETCH cursor_crea_historiales INTO v_idJug;

crear_hist_loop:WHILE (v_finished = 0) DO

# Creo las combinaciones del jugador con los demas jugadores

insert into Historial (idJug1, idJug2) values (NEW.idJugadores, v_idJug);

FETCH cursor_crea_historiales INTO v_idJug;

END WHILE crear_hist_loop;

CLOSE cursor_crea_historiales;

SET v_finished = 0;

END
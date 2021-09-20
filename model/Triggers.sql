DROP TRIGGER IF EXISTS trig_InsertMaxCardio;
DROP TRIGGER IF EXISTS trig_InsertMinCardio;
DROP TRIGGER IF EXISTS trig_InsertAverageCardio;
DROP TRIGGER IF EXISTS trig_InsertBegginingTime;
DROP TRIGGER IF EXISTS trig_InsertDuration;

DROP TRIGGER IF EXISTS trig_UpdateMaxCardio;
DROP TRIGGER IF EXISTS trig_UpdateMinCardio;
DROP TRIGGER IF EXISTS trig_UpdateAverageCardio;
DROP TRIGGER IF EXISTS trig_UpdateBegginingTime;
DROP TRIGGER IF EXISTS trig_UpdateDuration;

--INSERT

CREATE TRIGGER trig_InsertMaxCardio
AFTER INSERT ON data
FOR EACH ROW
BEGIN
	UPDATE activity
	SET MaxCardio = ( SELECT MAX(Cardio) FROM data WHERE TheActivity = NEW.TheActivity )
	WHERE IdActivity = NEW.TheActivity;
END;

CREATE TRIGGER trig_InsertMinCardio
AFTER INSERT ON data
FOR EACH ROW
BEGIN
	UPDATE activity
	SET MinCardio = ( SELECT MIN(Cardio) FROM data WHERE TheActivity = NEW.TheActivity )
	WHERE IdActivity = NEW.TheActivity;
END;

CREATE TRIGGER trig_InsertAverageCardio
AFTER INSERT ON data
FOR EACH ROW
BEGIN
	UPDATE activity
	SET AverageCardio = ( SELECT AVG(Cardio) FROM data WHERE TheActivity = NEW.TheActivity )
	WHERE IdActivity = NEW.TheActivity;
END;

CREATE TRIGGER trig_InsertBegginingTime
AFTER INSERT ON data
FOR EACH ROW
BEGIN
	UPDATE activity
	SET BegginingTime = (SELECT Time
	FROM data
	WHERE TheActivity = NEW.TheActivity 
	AND IdData = PreviousData
	)
	WHERE IdActivity = NEW.TheActivity;
END;

CREATE TRIGGER trig_InsertDuration
AFTER INSERT ON data
FOR EACH ROW
BEGIN
	UPDATE activity
	SET Duration = (SELECT time( SUM( strftime('%s',D1.Time ) - strftime('%s',D2.Time) ), 'unixepoch')
	FROM data D1, data D2
	WHERE D1.TheActivity = NEW.TheActivity 
	AND D2.IdData = D1.PreviousData
	)
	WHERE IdActivity = NEW.TheActivity;
END;

--UPDATE

CREATE TRIGGER trig_UpdateMaxCardio
AFTER UPDATE ON data
FOR EACH ROW
BEGIN
	UPDATE activity
	SET MaxCardio = ( SELECT MAX(Cardio) FROM data WHERE TheActivity = NEW.TheActivity )
	WHERE IdActivity = NEW.TheActivity;
END;

CREATE TRIGGER trig_UpdateMinCardio
AFTER UPDATE ON data
FOR EACH ROW
BEGIN
	UPDATE activity
	SET MinCardio = ( SELECT MIN(Cardio) FROM data WHERE TheActivity = NEW.TheActivity )
	WHERE IdActivity = NEW.TheActivity;
END;

CREATE TRIGGER trig_UpdateAverageCardio
AFTER UPDATE ON data
FOR EACH ROW
BEGIN
	UPDATE activity
	SET AverageCardio = ( SELECT AVG(Cardio) FROM data WHERE TheActivity = NEW.TheActivity )
	WHERE IdActivity = NEW.TheActivity;
END;

CREATE TRIGGER trig_UpdateBegginingTime
AFTER UPDATE ON data
FOR EACH ROW
BEGIN
	UPDATE activity
	SET BegginingTime = (SELECT Time
	FROM data
	WHERE TheActivity = NEW.TheActivity 
	AND IdData = PreviousData
	)
	WHERE IdActivity = NEW.TheActivity;
END;

CREATE TRIGGER trig_UpdateDuration
AFTER UPDATE ON data
FOR EACH ROW
BEGIN
	UPDATE activity
	SET Duration = (SELECT time( SUM( strftime('%s',D1.Time ) - strftime('%s',D2.Time) ), 'unixepoch')
	FROM data D1, data D2
	WHERE D1.TheActivity = NEW.TheActivity 
	AND D2.IdData = D1.PreviousData
	)
	WHERE IdActivity = NEW.TheActivity;
END;

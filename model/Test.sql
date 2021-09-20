-- user ( Email, Name, Surname, BirthDate, Gender, Height, Weight, Password )
-- activity ( IdActivity, Date, Description, TheUser, MaxCardio, MinCardio, AverageCardio, BegginingTme, Duration)
-- data ( IdData, Time, Cardio, Latitude, Longitude, Altitude, PreviousData, TheActivity )


-----------------------------------
-- test 1 : remplissage des données
-----------------------------------

DELETE FROM data ;
DELETE FROM activity ;
DELETE FROM user ;

--mail non valide
SELECT ' ' AS ' ';
SELECT '------ Test Mail non valide, attendu : 3 erreurs' AS ' ';
SELECT ' ' AS ' ';

INSERT INTO user VALUES ( 'Xavier@sport','Xavier','Moldu','05/11/2002','Homme',180,75,'error.AA');
INSERT INTO user VALUES ( 'Xavier@sport.','Xavier','Moldu','05/11/2002','Homme',180,75,'error.AA');
INSERT INTO user VALUES ( 'Xavier.com','Xavier','Moldu','05/11/2002','Homme',180,75,'error.AA');

--genre non valide
SELECT ' ' AS ' ';
SELECT '------ Test genre non valide, attendu : 2 erreurs' AS ' ';
SELECT ' ' AS ' ';

INSERT INTO user VALUES ( 'Xavier@sport.com','Xavier','Moldu','05/11/2002','Homm',180,75,'error.AA');
INSERT INTO user VALUES ( 'Xavier@sport.com','Xavier','Moldu','05/11/2002','Je sais pas',180,75,'error.AA');

--Taille non valide
SELECT ' ' AS ' ';
SELECT '------ Test taille non valide, attendu : 2 erreurs' AS ' ';
SELECT ' ' AS ' ';

INSERT INTO user VALUES ( 'Xavier@sport.com','Xavier','Moldu','05/11/2002','Homme',-10,75,'error.AA');
INSERT INTO user VALUES ( 'Xavier@sport.com','Xavier','Moldu','05/11/2002','Homme',500,75,'error.AA');

--poids non valide
SELECT ' ' AS ' ';
SELECT '------ Test poids non valide, attendu : 2 erreurs' AS ' ';
SELECT ' ' AS ' ';

INSERT INTO user VALUES ( 'Xavier@sport.com','Xavier','Moldu','05/11/2002','Homme',180,-20,'error.AA');
INSERT INTO user VALUES ( 'Xavier@sport.com','Xavier','Moldu','05/11/2002','Homme',180,600,'error.AA');


--------------------------
-- test 2 : tests activité
--------------------------

DELETE FROM data ;
DELETE FROM activity ;
DELETE FROM user ;

INSERT INTO user VALUES ( 'Xavier@sport.com','Xavier','Moldu','05/11/2002','Homme',180,75,'error.AA');
INSERT INTO activity VALUES (1,'05/11/2022','Athletisme', 'Xavier@sport.com',0,0,0,0,0);
INSERT INTO data VALUES (4,'12:00:00',99,47.644795,-2.776605,18,4,1);
INSERT INTO data VALUES (5,'12:00:05',100,47.646870,-2.778911,18,4,1);
INSERT INTO data VALUES (6,'12:00:10',101,47.646197,-2.780220,18,5,1);

SELECT ' ' AS ' ';
SELECT '------ Test cardio et durée, les deux valeurs doivent etre identiques :' AS ' ';
SELECT ' ' AS ' ';
SELECT '101|99|100.0|00:00:10' AS ' ';
SELECT MaxCardio, MinCardio, AverageCardio, Duration FROM activity;
SELECT ' ' AS ' ';

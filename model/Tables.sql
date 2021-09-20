DROP TABLE IF EXISTS data;
DROP TABLE IF EXISTS activity;
DROP TABLE IF EXISTS user;

CREATE TABLE user(
	Email text
	CONSTRAINT PK_user PRIMARY KEY
	CONSTRAINT ck_Email CHECK (Email LIKE '%_@__%.__%'),
	Name text,
	Surname text,
	BirthDate date,
	Gender text
	CONSTRAINT CK_Gender CHECK(Gender = "Homme" OR Gender = "Femme" OR Gender = "Autres"),
	Height integer
	CONSTRAINT CK_Height CHECK(Height >= 0 AND Height <= 300),
	Weight integerI
	CONSTRAINT CK_Weight CHECK(Weight >=0 AND Weight <= 300),
	Password text
	CONSTRAINT NN_Password NOT NULL
);

CREATE TABLE activity(
	IdActivity integer
	CONSTRAINT PK_activity PRIMARY KEY,
	Date date,
	Description text,
	TheUser text
	CONSTRAINT FK_activityUser REFERENCES user(Email),
	MaxCardio integer,
	Mincardio integer,
	AverageCardio real,
	BegginingTime time,
	Duration time
);

CREATE TABLE data(
	IdData integer
	CONSTRAINT PK_data PRIMARY KEY,
	Time time
	CONSTRAINT NN_Time NOT NULL,
	Cardio integer
	CONSTRAINT NN_Cardio NOT NULL
	CONSTRAINT CK_Cardio CHECK(Cardio > 0),
	Latitude real
	CONSTRAINT NN_Latitude NOT NULL,
	Longitude real
	CONSTRAINT NN_Longitude NOT NULL,
	Altitude real
	CONSTRAINT NN_Altitude NOT NULL,
	PreviousData integer
	CONSTRAINT NN_PreviousData NOT NULL
	CONSTRAINT FK_PreviousData REFERENCES data(IdData),
	TheActivity integer
	CONSTRAINT FK_dataActivity REFERENCES activity(IdActivity)
);

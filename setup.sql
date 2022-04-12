-- admin  P8MHNpCJiICT
CREATE DATABASE IF NOT EXISTS BoozeBuddy;
USE BoozeBuddy;

DROP TABLE IF EXISTS Store, Alcohol;
--Table: Beer
CREATE TABLE Alcohol
(id SMALLINT(5) NOT NULL,
 DrinkName varchar(35),
 ABV int,
 BeerType varchar(20),
 COI varchar(20),
 PRIMARY KEY (DrinkName)
);

INSERT INTO Alcohol VALUES('Gallo',4.5, 'Pale Lager', 'Guatemala');

--Table Store
CREATE TABLE reservations
(id int NOT NULL AUTO_INCREMENT,
	Store_id SMALLINT(5),
	begin_day int NOT NULL,
	end_day int NOT NULL,
	secret varchar(5),
	PRIMARY KEY (id),
	FOREIGN KEY (yurt_id) REFERENCES yurts(id)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

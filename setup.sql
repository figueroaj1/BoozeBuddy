-- admin  JUDrFc6Cmv5M
CREATE DATABASE IF NOT EXISTS BoozeBuddy;
USE BoozeBuddy;

DROP TABLE IF EXISTS Store, Alcohol, Store_Bev;
-- Table: Beer
CREATE TABLE Alcohol
(
	AlcID SMALLINT(5) NOT NULL,
	DrinkName varchar(35),
	ABV int,
	BeerType varchar(20),
	COI varchar(20),
	PRIMARY KEY (DrinkName)
);

INSERT INTO Alcohol VALUES('Gallo',5, 'Pale Lager', 'Guatemala');
INSERT INTO Alcohol VALUES('Blue Moon', 5.4, 'Witbier', 'America');
INSERT INTO Alcohol VALUES('Hamms', 4.7, 'Lager', 'America');
INSERT INTO Alcohol VALUES('Coors Lite', 5.2, 'Lite Lager', 'America');
INSERT INTO Alcohol VALUES('Yuengling', 5.4, 'Lager', 'America');
INSERT INTO Alcohol VALUES('Miller Lite', 4.2, 'Lite Lager', 'America');

-- Table Store
CREATE TABLE Store
(
	StoreID int NOT NULL AUTO_INCREMENT,
	Store_Name varchar(20),
	begin_time time(2),
	end_time time(2),
	LATITUDE int,
	LONGITUDE int,
	PRIMARY KEY (Store_Name),
	FOREIGN KEY (StoreId) REFERENCES Alcohol(AlcID)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

INSERT INTO Store VALUES('Wallmart', '9:00', '24:00', 36.358498566, -94.209832494);

CREATE TABLE Store_Bev
(
	StoreID int NOT NULL AUTO_INCREMENT,
	Price int,
	AlcID int,
	DateObserved DATE,
	PRIMARY KEY (Price),
	FOREIGN KEY (AlcID) REFERENCES Alcohol(ALCID),
	FOREIGN KEY (StoreID) REFERENCES Store(StoreID)
);


-- admin  JUDrFc6Cmv5M     PAehcD0Za9fW
CREATE DATABASE IF NOT EXISTS boozebuddy;
USE boozebuddy;

DROP TABLE IF EXISTS Store, Alcohol, Store_Bev;
-- Table: Beer
CREATE TABLE Alcohol
(
	AlcID int NOT NULL,
	DrinkName varchar(35),
	ABV int,
	BeerType varchar(20),
	COI varchar(20),
	PRIMARY KEY (AlcID)
);

INSERT INTO Alcohol VALUES(502, 'Gallo', 5, 'Pale Lager', 'Guatemala');
INSERT INTO Alcohol VALUES(100, 'Blue Moon', 5.4, 'Witbier', 'America');
INSERT INTO Alcohol VALUES(101, 'Hamms', 4.7, 'Lager', 'America');
INSERT INTO Alcohol VALUES(102, 'Coors Lite', 5.2, 'Lite Lager', 'America');
INSERT INTO Alcohol VALUES(103, 'Yuengling', 5.4, 'Lager', 'America');
INSERT INTO Alcohol VALUES(104, 'Miller Lite', 4.2, 'Lite Lager', 'America');

-- Table Store
DROP TABLE IF EXISTS store;
CREATE TABLE Store
(
	StoreID int NOT NULL AUTO_INCREMENT,
	Store_Name varchar(20),
	begin_time time(2),
	end_time time(2),
	LAT int,
	LON int,
	PRIMARY KEY (StoreID)
);

INSERT INTO Store VALUES(1 ,'Wallmart', '9:00', '24:00', 36.358498566, -94.209832494);

-- Table Store Bev
CREATE TABLE Store_Bev
(
	StoreID int NOT NULL,
	Price int,
	AlcID int NOT NULL,
	-- DateObserved DATE,
	PRIMARY KEY (StoreID, AlcID),
	FOREIGN KEY (AlcID) REFERENCES Alcohol(AlcID),
	FOREIGN KEY (StoreID) REFERENCES Store(StoreID)
);
INSERT INTO Store_Bev VALUES(1, 6, 502);


/*
Created: 10/12/2015
Modified: 14/12/2015
Model: MySQL 5.6
Database: MySQL 5.6
*/


-- Create tables section -------------------------------------------------

-- Table Usuario

CREATE TABLE `Usuario`
(
  `ID_Usuario` Int UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nombre` Varchar(50) NOT NULL,
  `Correo` Varchar(60) NOT NULL,
  `Contrasena` Varchar(15) NOT NULL,
  `Telefono` Int(11) UNSIGNED,
  PRIMARY KEY (`ID_Usuario`)
)
;

-- Table Usr_Red_Social

CREATE TABLE `Usr_Red_Social`
(
  `Username` Varchar(20) NOT NULL,
  `Red` Enum('Instagram','Twitter') NOT NULL,
  `ID_Usuario` Int UNSIGNED
)
;

CREATE INDEX `IX_Relationship9` ON `Usr_Red_Social` (`ID_Usuario`)
;

ALTER TABLE `Usr_Red_Social` ADD  PRIMARY KEY (`Username`)
;

-- Table Mascota

CREATE TABLE `Mascota`
(
  `ID_Mascota` Int UNSIGNED NOT NULL AUTO_INCREMENT,
  `Raza` Varchar(20),
  `Vacuna` Enum('1','0','Indefinido') DEFAULT 0,
  `Edad` Tinyint,
  `Sexo` Enum('M','F'),
  `Adoptada` Bool NOT NULL DEFAULT 0,
  `ID_Usuario` Int UNSIGNED,
  `Estado` Varchar(25) NOT NULL,
  `Ciudad` Varchar(25),
  PRIMARY KEY (`ID_Mascota`)
)
;

CREATE INDEX `IX_Relationship10` ON `Mascota` (`ID_Usuario`)
;

-- Table Publica

CREATE TABLE `Publica`
(
  `ID_Mascota` Int UNSIGNED NOT NULL,
  `ID_Usuario` Int UNSIGNED,
  `Username` Varchar(20)
)
;

CREATE INDEX `IX_Relationship7` ON `Publica` (`ID_Usuario`)
;

CREATE INDEX `IX_Relationship8` ON `Publica` (`Username`)
;

ALTER TABLE `Publica` ADD  PRIMARY KEY (`ID_Mascota`)
;

-- Create relationships section ------------------------------------------------- 

ALTER TABLE `Publica` ADD CONSTRAINT `Relationship6` FOREIGN KEY (`ID_Mascota`) REFERENCES `Mascota` (`ID_Mascota`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `Publica` ADD CONSTRAINT `Relationship7` FOREIGN KEY (`ID_Usuario`) REFERENCES `Usuario` (`ID_Usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `Publica` ADD CONSTRAINT `Relationship8` FOREIGN KEY (`Username`) REFERENCES `Usr_Red_Social` (`Username`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `Usr_Red_Social` ADD CONSTRAINT `Posee` FOREIGN KEY (`ID_Usuario`) REFERENCES `Usuario` (`ID_Usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `Mascota` ADD CONSTRAINT `Adopta` FOREIGN KEY (`ID_Usuario`) REFERENCES `Usuario` (`ID_Usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


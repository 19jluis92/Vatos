SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema CarService
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `CarService` ;
CREATE SCHEMA IF NOT EXISTS `CarService` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `CarService` ;

-- -----------------------------------------------------
-- Table `CarService`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`User` ;

CREATE TABLE IF NOT EXISTS `CarService`.`User` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idUser`))
ENGINE = InnoDB
COMMENT = '				';


-- -----------------------------------------------------
-- Table `CarService`.`County`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`County` ;

CREATE TABLE IF NOT EXISTS `CarService`.`County` (
  `idCounty` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`idCounty`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`State`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`State` ;

CREATE TABLE IF NOT EXISTS `CarService`.`State` (
  `idState` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(60) NOT NULL,
  `IdCountry` INT NOT NULL,
  PRIMARY KEY (`idState`),
  INDEX `fk_State_County1_idx` (`IdCountry` ASC),
  CONSTRAINT `fk_State_County1`
    FOREIGN KEY (`IdCountry`)
    REFERENCES `CarService`.`County` (`idCounty`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`City`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`City` ;

CREATE TABLE IF NOT EXISTS `CarService`.`City` (
  `idCity` INT NOT NULL,
  `name` VARCHAR(60) NOT NULL,
  `idState` INT NOT NULL,
  `Citycol` VARCHAR(45) NULL,
  PRIMARY KEY (`idCity`),
  INDEX `fk_City_State1_idx` (`idState` ASC),
  CONSTRAINT `fk_City_State1`
    FOREIGN KEY (`idState`)
    REFERENCES `CarService`.`State` (`idState`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`CarWorkShop`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`CarWorkShop` ;

CREATE TABLE IF NOT EXISTS `CarService`.`CarWorkShop` (
  `idCarWorkShop` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `address` VARCHAR(80) NULL,
  `idCity` INT NULL,
  PRIMARY KEY (`idCarWorkShop`),
  INDEX `fk_CarWorkShop_City1_idx` (`idCity` ASC),
  CONSTRAINT `fk_CarWorkShop_City1`
    FOREIGN KEY (`idCity`)
    REFERENCES `CarService`.`City` (`idCity`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`Employee`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`Employee` ;

CREATE TABLE IF NOT EXISTS `CarService`.`Employee` (
  `idEmployee` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(60) NOT NULL,
  `lastName` VARCHAR(65) NOT NULL,
  `nss` VARCHAR(45) NULL,
  `idCity` INT NULL,
  `address` VARCHAR(80) NULL,
  `phone` VARCHAR(15) NULL,
  `cellphone` VARCHAR(15) NULL,
  `idUser` INT NOT NULL,
  `idCarWorkShop` INT NOT NULL,
  PRIMARY KEY (`idEmployee`),
  INDEX `fk_Employee_User_idx` (`idUser` ASC),
  INDEX `fk_Employee_CarWorkShop1_idx` (`idCarWorkShop` ASC),
  INDEX `fk_Employee_City1_idx` (`idCity` ASC),
  CONSTRAINT `fk_Employee_User`
    FOREIGN KEY (`idUser`)
    REFERENCES `CarService`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Employee_CarWorkShop1`
    FOREIGN KEY (`idCarWorkShop`)
    REFERENCES `CarService`.`CarWorkShop` (`idCarWorkShop`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Employee_City1`
    FOREIGN KEY (`idCity`)
    REFERENCES `CarService`.`City` (`idCity`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '				';


-- -----------------------------------------------------
-- Table `CarService`.`Role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`Role` ;

CREATE TABLE IF NOT EXISTS `CarService`.`Role` (
  `idRole` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`idRole`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`UserRole`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`UserRole` ;

CREATE TABLE IF NOT EXISTS `CarService`.`UserRole` (
  `idUser` INT NOT NULL,
  `idRole` INT NOT NULL,
  PRIMARY KEY (`idUser`, `idRole`),
  INDEX `fk_User_has_Role_Role1_idx` (`idRole` ASC),
  INDEX `fk_User_has_Role_User1_idx` (`idUser` ASC),
  CONSTRAINT `fk_User_has_Role_User1`
    FOREIGN KEY (`idUser`)
    REFERENCES `CarService`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Role_Role1`
    FOREIGN KEY (`idRole`)
    REFERENCES `CarService`.`Role` (`idRole`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`Brand`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`Brand` ;

CREATE TABLE IF NOT EXISTS `CarService`.`Brand` (
  `idBrand` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idBrand`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`Model`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`Model` ;

CREATE TABLE IF NOT EXISTS `CarService`.`Model` (
  `idModel` INT NOT NULL,
  `name` VARCHAR(60) NOT NULL,
  `idBrand` INT NOT NULL,
  PRIMARY KEY (`idModel`),
  INDEX `fk_Model_Brand1_idx` (`idBrand` ASC),
  CONSTRAINT `fk_Model_Brand1`
    FOREIGN KEY (`idBrand`)
    REFERENCES `CarService`.`Brand` (`idBrand`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`Color`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`Color` ;

CREATE TABLE IF NOT EXISTS `CarService`.`Color` (
  `idColor` INT NOT NULL,
  `Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idColor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`CarType`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`CarType` ;

CREATE TABLE IF NOT EXISTS `CarService`.`CarType` (
  `idCarType` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCarType`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`Vehicle`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`Vehicle` ;

CREATE TABLE IF NOT EXISTS `CarService`.`Vehicle` (
  `idVehicle` INT NOT NULL AUTO_INCREMENT,
  `vin` VARCHAR(45) NOT NULL,
  `idModel` INT NULL,
  `idColor` INT NULL,
  `year` INT NULL,
  `idCarType` INT NULL,
  `characteristics` VARCHAR(4000) NULL,
  `plates` INT NULL,
  PRIMARY KEY (`idVehicle`),
  INDEX `fk_Vehicle_Model1_idx` (`idModel` ASC),
  INDEX `fk_Vehicle_Color1_idx` (`idColor` ASC),
  INDEX `fk_Vehicle_CarType1_idx` (`idCarType` ASC),
  CONSTRAINT `fk_Vehicle_Model1`
    FOREIGN KEY (`idModel`)
    REFERENCES `CarService`.`Model` (`idModel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vehicle_Color1`
    FOREIGN KEY (`idColor`)
    REFERENCES `CarService`.`Color` (`idColor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vehicle_CarType1`
    FOREIGN KEY (`idCarType`)
    REFERENCES `CarService`.`CarType` (`idCarType`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`Client`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`Client` ;

CREATE TABLE IF NOT EXISTS `CarService`.`Client` (
  `idClient` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(60) NOT NULL,
  `LastName` VARCHAR(70) NOT NULL,
  `RFC` VARCHAR(18) NULL,
  `Clientcol` VARCHAR(45) NULL,
  `Clientcol1` VARCHAR(45) NULL,
  PRIMARY KEY (`idClient`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`ClientPhone`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`ClientPhone` ;

CREATE TABLE IF NOT EXISTS `CarService`.`ClientPhone` (
  `idPhone` INT NOT NULL AUTO_INCREMENT,
  `lada` VARCHAR(3) NULL,
  `area` VARCHAR(5) NULL,
  `number` VARCHAR(10) NULL,
  `idClient` INT NOT NULL,
  PRIMARY KEY (`idPhone`),
  INDEX `fk_Phone_Client1_idx` (`idClient` ASC),
  CONSTRAINT `fk_Phone_Client1`
    FOREIGN KEY (`idClient`)
    REFERENCES `CarService`.`Client` (`idClient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`ClientVehicle`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`ClientVehicle` ;

CREATE TABLE IF NOT EXISTS `CarService`.`ClientVehicle` (
  `idClient` INT NOT NULL,
  `idVehicle` INT NOT NULL,
  PRIMARY KEY (`idClient`, `idVehicle`),
  INDEX `fk_Client_has_Vehicle_Vehicle1_idx` (`idVehicle` ASC),
  INDEX `fk_Client_has_Vehicle_Client1_idx` (`idClient` ASC),
  CONSTRAINT `fk_Client_has_Vehicle_Client1`
    FOREIGN KEY (`idClient`)
    REFERENCES `CarService`.`Client` (`idClient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Client_has_Vehicle_Vehicle1`
    FOREIGN KEY (`idVehicle`)
    REFERENCES `CarService`.`Vehicle` (`idVehicle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`WorkShopPhone`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`WorkShopPhone` ;

CREATE TABLE IF NOT EXISTS `CarService`.`WorkShopPhone` (
  `idPhone` INT NOT NULL AUTO_INCREMENT,
  `lada` VARCHAR(3) NULL,
  `area` VARCHAR(5) NULL,
  `number` VARCHAR(10) NULL,
  `idCarWorkShop` INT NOT NULL,
  PRIMARY KEY (`idPhone`),
  INDEX `fk_WorkShopPhone_CarWorkShop1_idx` (`idCarWorkShop` ASC),
  CONSTRAINT `fk_WorkShopPhone_CarWorkShop1`
    FOREIGN KEY (`idCarWorkShop`)
    REFERENCES `CarService`.`CarWorkShop` (`idCarWorkShop`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`Location`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`Location` ;

CREATE TABLE IF NOT EXISTS `CarService`.`Location` (
  `idLocation` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `idCarWorkShop` INT NOT NULL,
  PRIMARY KEY (`idLocation`),
  INDEX `fk_Location_CarWorkShop1_idx` (`idCarWorkShop` ASC),
  CONSTRAINT `fk_Location_CarWorkShop1`
    FOREIGN KEY (`idCarWorkShop`)
    REFERENCES `CarService`.`CarWorkShop` (`idCarWorkShop`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`Department`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`Department` ;

CREATE TABLE IF NOT EXISTS `CarService`.`Department` (
  `idDepartment` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `idLocation` INT NOT NULL,
  PRIMARY KEY (`idDepartment`),
  INDEX `fk_Department_Location1_idx` (`idLocation` ASC),
  CONSTRAINT `fk_Department_Location1`
    FOREIGN KEY (`idLocation`)
    REFERENCES `CarService`.`Location` (`idLocation`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`Service`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`Service` ;

CREATE TABLE IF NOT EXISTS `CarService`.`Service` (
  `idService` INT NOT NULL AUTO_INCREMENT,
  `startDate` DATETIME NOT NULL,
  `endDate` DATETIME NULL,
  `idCarWorkShop` INT NOT NULL,
  `idVehicle` INT NOT NULL,
  `idEmployee` INT NOT NULL,
  PRIMARY KEY (`idService`),
  INDEX `fk_Service_Vehicle1_idx` (`idVehicle` ASC),
  INDEX `fk_Service_CarWorkShop1_idx` (`idCarWorkShop` ASC),
  INDEX `fk_Service_Employee1_idx` (`idEmployee` ASC),
  CONSTRAINT `fk_Service_Vehicle1`
    FOREIGN KEY (`idVehicle`)
    REFERENCES `CarService`.`Vehicle` (`idVehicle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Service_CarWorkShop1`
    FOREIGN KEY (`idCarWorkShop`)
    REFERENCES `CarService`.`CarWorkShop` (`idCarWorkShop`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Service_Employee1`
    FOREIGN KEY (`idEmployee`)
    REFERENCES `CarService`.`Employee` (`idEmployee`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`Inspection`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`Inspection` ;

CREATE TABLE IF NOT EXISTS `CarService`.`Inspection` (
  `idInspection` INT NOT NULL,
  `idService` INT NOT NULL,
  `mileage` DECIMAL(10,2) NOT NULL,
  `fuel` DECIMAL(10,2) NOT NULL,
  `inspectionDate` DATETIME NULL,
  `type` BIT NULL,
  PRIMARY KEY (`idInspection`),
  INDEX `fk_Inspection_Service1_idx` (`idService` ASC),
  CONSTRAINT `fk_Inspection_Service1`
    FOREIGN KEY (`idService`)
    REFERENCES `CarService`.`Service` (`idService`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`Piece`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`Piece` ;

CREATE TABLE IF NOT EXISTS `CarService`.`Piece` (
  `idPiece` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPiece`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`Severity`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`Severity` ;

CREATE TABLE IF NOT EXISTS `CarService`.`Severity` (
  `idSeverity` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idSeverity`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`Bump`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`Bump` ;

CREATE TABLE IF NOT EXISTS `CarService`.`Bump` (
  `idBump` INT NOT NULL AUTO_INCREMENT,
  `idPiece` INT NOT NULL,
  `idSeverity` INT NOT NULL,
  `idInspection` INT NOT NULL,
  PRIMARY KEY (`idBump`),
  INDEX `fk_Bump_Inspection1_idx` (`idInspection` ASC),
  INDEX `fk_Bump_Piece1_idx` (`idPiece` ASC),
  INDEX `fk_Bump_Severity1_idx` (`idSeverity` ASC),
  CONSTRAINT `fk_Bump_Inspection1`
    FOREIGN KEY (`idInspection`)
    REFERENCES `CarService`.`Inspection` (`idInspection`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Bump_Piece1`
    FOREIGN KEY (`idPiece`)
    REFERENCES `CarService`.`Piece` (`idPiece`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Bump_Severity1`
    FOREIGN KEY (`idSeverity`)
    REFERENCES `CarService`.`Severity` (`idSeverity`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CarService`.`Relocation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CarService`.`Relocation` ;

CREATE TABLE IF NOT EXISTS `CarService`.`Relocation` (
  `idRelocation` INT NOT NULL AUTO_INCREMENT,
  `relocationDate` DATETIME NOT NULL,
  `idEmployee` INT NOT NULL,
  `reason` VARCHAR(4000) NOT NULL,
  `idDepartment` INT NOT NULL,
  `idService` INT NOT NULL,
  PRIMARY KEY (`idRelocation`),
  INDEX `fk_Relocation_Employee1_idx` (`idEmployee` ASC),
  INDEX `fk_Relocation_Department1_idx` (`idDepartment` ASC),
  INDEX `fk_Relocation_Service1_idx` (`idService` ASC),
  CONSTRAINT `fk_Relocation_Employee1`
    FOREIGN KEY (`idEmployee`)
    REFERENCES `CarService`.`Employee` (`idEmployee`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Relocation_Department1`
    FOREIGN KEY (`idDepartment`)
    REFERENCES `CarService`.`Department` (`idDepartment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Relocation_Service1`
    FOREIGN KEY (`idService`)
    REFERENCES `CarService`.`Service` (`idService`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema tech_support
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tech_support
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tech_support` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `tech_support` ;

-- -----------------------------------------------------
-- Table `tech_support`.`administrators`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tech_support`.`administrators` (
  `username` VARCHAR(40) NOT NULL,
  `password` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE INDEX `username` (`username` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `tech_support`.`countries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tech_support`.`countries` (
  `countryCode` CHAR(2) NOT NULL,
  `countryName` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`countryCode`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `tech_support`.`customers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tech_support`.`customers` (
  `customerID` INT NOT NULL AUTO_INCREMENT,
  `firstName` VARCHAR(50) NOT NULL,
  `lastName` VARCHAR(50) NOT NULL,
  `address` VARCHAR(50) NOT NULL,
  `city` VARCHAR(50) NOT NULL,
  `state` VARCHAR(50) NOT NULL,
  `postalCode` VARCHAR(20) NOT NULL,
  `countryCode` CHAR(2) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`customerID`),
  UNIQUE INDEX `email` (`email` ASC) VISIBLE)
ENGINE = MyISAM
AUTO_INCREMENT = 1120
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `tech_support`.`incidents`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tech_support`.`incidents` (
  `incidentID` INT NOT NULL AUTO_INCREMENT,
  `customerID` INT NOT NULL,
  `productCode` VARCHAR(10) NOT NULL,
  `techID` INT NULL DEFAULT NULL,
  `dateOpened` DATETIME NOT NULL,
  `dateClosed` DATETIME NULL DEFAULT NULL,
  `title` VARCHAR(50) NOT NULL,
  `description` VARCHAR(2000) NOT NULL,
  PRIMARY KEY (`incidentID`))
ENGINE = MyISAM
AUTO_INCREMENT = 56
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `tech_support`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tech_support`.`products` (
  `productCode` VARCHAR(10) NOT NULL,
  `name` VARCHAR(50) NOT NULL,
  `version` DECIMAL(18,1) NOT NULL,
  `releaseDate` DATETIME NOT NULL,
  PRIMARY KEY (`productCode`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `tech_support`.`registrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tech_support`.`registrations` (
  `customerID` INT NOT NULL,
  `productCode` VARCHAR(10) NOT NULL,
  `registrationDate` DATETIME NOT NULL,
  PRIMARY KEY (`customerID`, `productCode`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `tech_support`.`technicians`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tech_support`.`technicians` (
  `techID` INT NOT NULL AUTO_INCREMENT,
  `firstName` VARCHAR(50) NOT NULL,
  `lastName` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `password` VARCHAR(20) NOT NULL,
  `grade` VARCHAR(1) NULL DEFAULT NULL,
  PRIMARY KEY (`techID`),
  UNIQUE INDEX `email` (`email` ASC) VISIBLE)
ENGINE = MyISAM
AUTO_INCREMENT = 32
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

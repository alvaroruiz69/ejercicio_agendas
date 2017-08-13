-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


CREATE SCHEMA IF NOT EXISTS `agenda` DEFAULT CHARACTER SET utf8 ;
USE `agenda` ;

-- -----------------------------------------------------
-- Table `agenda`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agenda`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `email` VARCHAR(45) NOT NULL,
  `pass` VARCHAR(255) NOT NULL,
  `nacimiento` DATE NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `login_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agenda`.`eventos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agenda`.`eventos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NOT NULL,
  `fecha_ini` DATE NOT NULL,
  `hora_ini` TIME NULL,
  `fecha_fin` DATE NULL,
  `hora_fin` TIME NULL,
  `dia_completo` INT NOT NULL,
  `Usuarios_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Eventos_Usuarios_idx` (`Usuarios_id` ASC),
  CONSTRAINT `fk_Eventos_Usuarios`
    FOREIGN KEY (`Usuarios_id`)
    REFERENCES `agenda`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

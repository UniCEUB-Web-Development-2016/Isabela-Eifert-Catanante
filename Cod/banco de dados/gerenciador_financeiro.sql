SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `gerenciador_financeiro` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `gerenciador_financeiro` ;

-- -----------------------------------------------------
-- Table `gerenciador_financeiro`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gerenciador_financeiro`.`user` ;

CREATE  TABLE IF NOT EXISTS `gerenciador_financeiro`.`user` (
  `id_user` INT NOT NULL AUTO_INCREMENT ,
  `nme_user` VARCHAR(45) NOT NULL ,
  `last_nme_user` VARCHAR(45) NOT NULL ,
  `email_user` VARCHAR(45) NOT NULL ,
  `gender_user` VARCHAR(10) NOT NULL ,
  `birthdate_user` DATE NOT NULL ,
  `pass_user` TEXT NOT NULL ,
  PRIMARY KEY (`id_user`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerenciador_financeiro`.`type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gerenciador_financeiro`.`type` ;

CREATE  TABLE IF NOT EXISTS `gerenciador_financeiro`.`type` (
  `id_type` INT NOT NULL AUTO_INCREMENT ,
  `nme_type` VARCHAR(45) NOT NULL ,
  `num_parcel` INT NULL ,
  `type` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_type`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerenciador_financeiro`.`earnings`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gerenciador_financeiro`.`earnings` ;

CREATE  TABLE IF NOT EXISTS `gerenciador_financeiro`.`earnings` (
  `id_earnings` INT NOT NULL AUTO_INCREMENT ,
  `nme_earnings` VARCHAR(45) NOT NULL ,
  `value_earnings` DECIMAL(8,8) NOT NULL ,
  `type_earnings` VARCHAR(45) NOT NULL ,
  `dta_earnings` DATE NOT NULL ,
  `cod_user_earnings` INT NOT NULL ,
  `cod_type_earnings` INT NOT NULL ,
  PRIMARY KEY (`id_earnings`) ,
  INDEX `cod_user_earnings` (`cod_user_earnings` ASC) ,
  INDEX `fk_earnings_type1` (`cod_type_earnings` ASC) ,
  CONSTRAINT `cod_user_earnings`
    FOREIGN KEY (`cod_user_earnings` )
    REFERENCES `gerenciador_financeiro`.`user` (`id_user` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_earnings_type1`
    FOREIGN KEY (`cod_type_earnings` )
    REFERENCES `gerenciador_financeiro`.`type` (`id_type` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerenciador_financeiro`.`discount`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gerenciador_financeiro`.`discount` ;

CREATE  TABLE IF NOT EXISTS `gerenciador_financeiro`.`discount` (
  `id_discount` INT NOT NULL AUTO_INCREMENT ,
  `nme_discount` VARCHAR(45) NOT NULL ,
  `value_discont` DECIMAL(8,8) NOT NULL ,
  `dta_discount` VARCHAR(45) NOT NULL ,
  `cod_type_type` INT NOT NULL ,
  `cod_user_discount` INT NOT NULL ,
  PRIMARY KEY (`id_discount`) ,
  INDEX `cod_user_discount` (`cod_user_discount` ASC) ,
  INDEX `fk_discount_type1` (`cod_type_type` ASC) ,
  CONSTRAINT `cod_user_discount`
    FOREIGN KEY (`cod_user_discount` )
    REFERENCES `gerenciador_financeiro`.`user` (`id_user` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_discount_type1`
    FOREIGN KEY (`cod_type_type` )
    REFERENCES `gerenciador_financeiro`.`type` (`id_type` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerenciador_financeiro`.`planning`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gerenciador_financeiro`.`planning` ;

CREATE  TABLE IF NOT EXISTS `gerenciador_financeiro`.`planning` (
  `id_planning` INT NOT NULL AUTO_INCREMENT ,
  `nme_planning` VARCHAR(45) NOT NULL ,
  `current_value_planning` VARCHAR(45) NOT NULL ,
  `final_value_planning` VARCHAR(45) NOT NULL ,
  `inital_date_planning` DATE NOT NULL ,
  `final_date_planning` DATE NOT NULL ,
  `description_planning` VARCHAR(150) NOT NULL ,
  `cod_user_planning` INT NOT NULL ,
  PRIMARY KEY (`id_planning`) ,
  INDEX `cod_user_planning` (`cod_user_planning` ASC) ,
  CONSTRAINT `cod_user_planning`
    FOREIGN KEY (`cod_user_planning` )
    REFERENCES `gerenciador_financeiro`.`user` (`id_user` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

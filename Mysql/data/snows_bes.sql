-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema snows_bes
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema snows_bes
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `snows_bes` ;
USE `snows_bes` ;

-- -----------------------------------------------------
-- Table `snows_bes`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(40) NOT NULL,
  `firstname` VARCHAR(40) NOT NULL,
  `lastname` VARCHAR(40) NOT NULL,
  `email` VARCHAR(40) NOT NULL,
  `password` VARCHAR(40) NOT NULL,
  `address` VARCHAR(45) NULL,
  `city` VARCHAR(40) NULL,
  `zip` SMALLINT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snows_bes`.`suppliers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`suppliers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(40) NOT NULL,
  `name` VARCHAR(40) NOT NULL,
  `address` VARCHAR(40) NOT NULL,
  `phone` VARCHAR(25) NOT NULL,
  `country` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snows_bes`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(40) NOT NULL,
  `description` VARCHAR(300) NOT NULL,
  `price` MEDIUMINT NOT NULL,
  `sku` VARCHAR(45) NOT NULL,
  `brand` VARCHAR(40) NOT NULL,
  `suppliers_id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snows_bes`.`events`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`events` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(40) NOT NULL,
  `location` VARCHAR(40) NOT NULL,
  `date` DATE NOT NULL,
  `id_users` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_idx` (`id_users` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snows_bes`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `amount` VARCHAR(45) NOT NULL,
  `date` TIMESTAMP NOT NULL,
  `id_orders` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_users_idx` (`id_orders` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snows_bes`.`orders_has_products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`orders_has_products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_orders` INT NOT NULL,
  `id_products` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_orders_idx` (`id_orders` ASC) VISIBLE,
  INDEX `id_poducts_idx` (`id_products` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snows_bes`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `id_users` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_users_idx` (`id_users` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snows_bes`.`shoppingCarts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`shoppingCarts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_users` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_users_idx` (`id_users` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snows_bes`.`shopppingCarts_has_products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`shopppingCarts_has_products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_shoppingCarts` INT NOT NULL,
  `id_products` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_shoppingCarts_idx` (`id_shoppingCarts` ASC) VISIBLE,
  INDEX `id_products_idx` (`id_products` ASC) VISIBLE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

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
-- Table `snows_bes`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(40) NOT NULL,
  `firstname` VARCHAR(40) NOT NULL,
  `lastname` VARCHAR(40) NOT NULL,
  `email` VARCHAR(40) NOT NULL,
  `password` VARCHAR(65) NOT NULL,
  `address` VARCHAR(45) NULL,
  `city` VARCHAR(40) NULL,
  `zip` SMALLINT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snows_bes`.`supplier`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`supplier` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(40) NOT NULL,
  `name` VARCHAR(40) NOT NULL,
  `address` VARCHAR(40) NOT NULL,
  `phone` VARCHAR(25) NOT NULL,
  `country` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snows_bes`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`product` (
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
-- Table `snows_bes`.`event`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`event` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(40) NOT NULL,
  `location` VARCHAR(40) NOT NULL,
  `date` DATE NOT NULL,
  `id_users` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_idx` (`id_users` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snows_bes`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`order` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `amount` DECIMAL NOT NULL,
  `date` TIMESTAMP NOT NULL,
  `id_orders` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_users_idx` (`id_orders` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snows_bes`.`order_has_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`order_has_product` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_orders` INT NOT NULL,
  `id_products` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_orders_idx` (`id_orders` ASC) VISIBLE,
  INDEX `id_poducts_idx` (`id_products` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snows_bes`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`role` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `id_users` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_users_idx` (`id_users` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snows_bes`.`shoppingCart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`shoppingCart` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `quantity` INT NOT NULL,
  `id_users` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_users_idx` (`id_users` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snows_bes`.`shoppingCart_has_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`shoppingCart_has_product` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_shoppingCarts` INT NOT NULL,
  `id_products` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_shoppingCarts_idx` (`id_shoppingCarts` ASC) VISIBLE,
  INDEX `id_products_idx` (`id_products` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snows_bes`.`categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`categorie` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snows_bes`.`product_has_categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`product_has_categorie` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_categories` INT NOT NULL,
  `id_products` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_categories_idx` (`id_categories` ASC) VISIBLE,
  INDEX `id_products_idx` (`id_products` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snows_bes`.`coupon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `snows_bes`.`coupon` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `discount` BIT NOT NULL,
  `fromDate` DATE NOT NULL,
  `toDate` DATE NOT NULL,
  `id_orders` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_orders_idx` (`id_orders` ASC) VISIBLE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `snows_bes`.`categorie`
-- -----------------------------------------------------
START TRANSACTION;
USE `snows_bes`;
INSERT INTO `snows_bes`.`categorie` (`id`, `name`) VALUES (1, 'Snows');
INSERT INTO `snows_bes`.`categorie` (`id`, `name`) VALUES (2, 'Boots');
INSERT INTO `snows_bes`.`categorie` (`id`, `name`) VALUES (DEFAULT, 'Jackets');

COMMIT;


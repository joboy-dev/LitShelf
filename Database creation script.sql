-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema LitShelfDB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema LitShelfDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `LitShelfDB` DEFAULT CHARACTER SET utf8 ;
USE `LitShelfDB` ;

-- -----------------------------------------------------
-- Table `LitShelfDB`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LitShelfDB`.`User` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `password` VARCHAR(80) NOT NULL,
  `profile_picture` VARCHAR(300) NULL DEFAULT 'https://img.freepik.com/free-psd/3d-icon-social-media-app_23-2150049569.jpg?size=626&ext=jpg&ga=GA1.1.163047648.1692182630&semt=ais',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LitShelfDB`.`Author`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LitShelfDB`.`Author` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `author_name` VARCHAR(200) NOT NULL,
  `author_picture` VARCHAR(200) NULL DEFAULT 'https://img.freepik.com/free-psd/3d-icon-social-media-app_23-2150049569.jpg?size=626&ext=jpg&ga=GA1.1.163047648.1692182630&semt=ais',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LitShelfDB`.`Book`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LitShelfDB`.`Book` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `book_name` VARCHAR(200) NOT NULL,
  `description` VARCHAR(3000) NULL DEFAULT 'No description available.',
  `genre` VARCHAR(200) NOT NULL,
  `quantity_available` INT NOT NULL,
  `cover_picture` VARCHAR(300) NULL DEFAULT 'https://img.freepik.com/free-photo/image-icon-front-side-white-background_187299-40166.jpg?size=626&ext=jpg&ga=GA1.1.163047648.1692182630&semt=ais',
  `author_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_author_id_idx` (`author_id` ASC),
  CONSTRAINT `fk_author_id`
    FOREIGN KEY (`author_id`)
    REFERENCES `LitShelfDB`.`Author` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LitShelfDB`.`Borrow`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LitShelfDB`.`Borrow` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `book_id` INT NOT NULL,
  `borrow_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_user_id_idx` (`user_id` ASC),
  INDEX `fk_book_id_idx` (`book_id` ASC),
  CONSTRAINT `fk_user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `LitShelfDB`.`User` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_book_id`
    FOREIGN KEY (`book_id`)
    REFERENCES `LitShelfDB`.`Book` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LitShelfDB`.`Return`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LitShelfDB`.`Return` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `borrow_id` INT NOT NULL,
  `return_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_borrow_id_idx` (`borrow_id` ASC),
  CONSTRAINT `fk_borrow_id`
    FOREIGN KEY (`borrow_id`)
    REFERENCES `LitShelfDB`.`Borrow` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LitShelfDB`.`Admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LitShelfDB`.`Admin` (
  `id` INT NOT NULL,
  `name` VARCHAR(200) NULL DEFAULT 'litshelfadmin',
  `email` VARCHAR(200) NULL DEFAULT 'litshelfadmin@gmail.com',
  `password` VARCHAR(200) NULL DEFAULT 'litshelfadmin',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------
-- -----------------------------------------------
USE litshelfdb;

-- --------------------------------------------------
-- Set Up Admin
-- --------------------------------------------------
INSERT INTO admin(`name`, `email`, `password`) VALUES('litshelfadmin', 'litshelfadmin@gmail.com', 'litshelfadmin');

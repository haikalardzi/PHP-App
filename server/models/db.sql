
CREATE SCHEMA IF NOT EXISTS `db` DEFAULT CHARACTER SET utf8 ;
USE `db` ;

-- -----------------------------------------------------
-- Table `db`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db`.`User` (
  `email` VARCHAR(64) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(256) NOT NULL,
  PRIMARY KEY (`username`))
;


-- -----------------------------------------------------
-- Table `db`.`Seller`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db`.`Seller` (
  `Users_username` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Users_username`),
  CONSTRAINT `fk_Seller_Users1`
    FOREIGN KEY (`Users_username`)
    REFERENCES `db`.`User` (`username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
;

CREATE INDEX `fk_Seller_Users1_idx` ON `db`.`Seller` (`Users_username` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `db`.`Item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db`.`Item` (
  `Item_id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NULL,
  `Seller_username` INT NOT NULL,
  `Seller_Users_username` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Item_id`, `Seller_Users_username`),
  CONSTRAINT `fk_Item_Seller1`
    FOREIGN KEY (`Seller_Users_username`)
    REFERENCES `db`.`Seller` (`Users_username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
;

CREATE INDEX `fk_Item_Seller1_idx` ON `db`.`Item` (`Seller_Users_username` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `db`.`Buyer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db`.`Buyer` (
  `Users_username` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Users_username`),
  CONSTRAINT `fk_Buyer_Users1`
    FOREIGN KEY (`Users_username`)
    REFERENCES `db`.`User` (`username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
;

CREATE USER 'admin' IDENTIFIED BY 'BOOMbitchgetouttheway';

GRANT ALL ON `db`.* TO 'admin';
GRANT SELECT ON TABLE `db`.* TO 'admin';
GRANT SELECT, INSERT, TRIGGER ON TABLE `db`.* TO 'admin';
GRANT SELECT, INSERT, TRIGGER, UPDATE, DELETE ON TABLE `db`.* TO 'admin';
GRANT EXECUTE ON ROUTINE `db`.* TO 'admin';

CREATE USER 'user' IDENTIFIED BY 'properuserisintheHOUSE';
GRANT SELECT ON TABLE `db`.* TO 'user';
GRANT SELECT, INSERT, TRIGGER ON TABLE `db`.* TO 'user';

CREATE USER 'guest' IDENTIFIED BY 'tamu';
GRANT SELECT, INSERT ON TABLE `db`.User TO 'guest';
GRANT SELECT, ON TABLE `db`.Item;
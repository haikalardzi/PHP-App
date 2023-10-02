
CREATE SCHEMA IF NOT EXISTS `saranghaengbok_db` DEFAULT CHARACTER SET utf8 ;
USE `saranghaengbok_db` ;

-- -----------------------------------------------------
-- Table `saranghaengbok_db`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saranghaengbok_db`.`User` (
  `email` VARCHAR(64) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(256) NOT NULL,
  PRIMARY KEY (`username`))
;


-- -----------------------------------------------------
-- Table `saranghaengbok_db`.`Seller`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saranghaengbok_db`.`Seller` (
  `Users_username` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Users_username`),
  CONSTRAINT `fk_Seller_Users1`
    FOREIGN KEY (`Users_username`)
    REFERENCES `saranghaengbok_db`.`User` (`username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
;

CREATE INDEX `fk_Seller_Users1_idx` ON `saranghaengbok_db`.`Seller` (`Users_username` ASC);


-- -----------------------------------------------------
-- Table `saranghaengbok_db`.`Item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saranghaengbok_db`.`Item` (
  `Item_id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `picture_path` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NULL,
  `Seller_username` INT NOT NULL,
  `Seller_Users_username` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Item_id`, `Seller_Users_username`),
  CONSTRAINT `fk_Item_Seller1`
    FOREIGN KEY (`Seller_Users_username`)
    REFERENCES `saranghaengbok_db`.`Seller` (`Users_username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
;

CREATE INDEX `fk_Item_Seller1_idx` ON `saranghaengbok_db`.`Item` (`Seller_Users_username` ASC);


-- -----------------------------------------------------
-- Table `saranghaengbok_db`.`Buyer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saranghaengbok_db`.`Buyer` (
  `Users_username` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Users_username`),
  CONSTRAINT `fk_Buyer_Users1`
    FOREIGN KEY (`Users_username`)
    REFERENCES `saranghaengbok_db`.`User` (`username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
;

CREATE USER 'admin' IDENTIFIED BY 'BOOMbitchgetouttheway';
-- Biasanya user 'admin' sudah ada, jadi ganti password aja
-- SET PASSWORD FOR 'admin'@'%' = PASSWORD('BOOMbitchgetouttheway');
CREATE USER 'user' IDENTIFIED BY 'properuserisintheHOUSE';
CREATE USER 'guest' IDENTIFIED BY 'tamu';

flush privileges;

GRANT ALL ON `saranghaengbok_db`.* TO 'admin';

GRANT SELECT ON TABLE `saranghaengbok_db`.* TO 'user';
GRANT SELECT, INSERT, TRIGGER ON TABLE `saranghaengbok_db`.* TO 'user';

GRANT SELECT, INSERT ON TABLE `saranghaengbok_db`.User TO 'guest';
GRANT SELECT ON TABLE `saranghaengbok_db`.Item TO 'guest';
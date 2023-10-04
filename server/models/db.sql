
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
INSERT INTO `User` (`email`, `username`, `password`) VALUES ('christodharma@gmail.com', 'christodharma', 'yangliatinicumachristo');

-- -----------------------------------------------------
-- Table `saranghaengbok_db`.`Item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saranghaengbok_db`.`Item` (
  `Item_id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `picture_path` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NULL,
  `price` FLOAT(10,2) NOT NULL,
  `quantity` INT NOT NULL,
  `Seller_username` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Item_id`, `Seller_Users_username`),
  CONSTRAINT `fk_Item_Seller1`
    FOREIGN KEY (`Seller_username`)
    REFERENCES `saranghaengbok_db`.`User` (`Users_username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
;

CREATE INDEX `fk_Item_Seller1_idx` ON `saranghaengbok_db`.`Item` (`Seller_Users_username` ASC);

CREATE USER 'saranghaengbok_db_admin' IDENTIFIED BY 'BOOMbitchgetouttheway';

flush privileges;

GRANT ALL ON `saranghaengbok_db`.* TO 'saranghaengbok_db_admin';

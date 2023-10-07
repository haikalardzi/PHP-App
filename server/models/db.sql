
CREATE SCHEMA IF NOT EXISTS `saranghaengbok_db` DEFAULT CHARACTER SET utf8 ;
USE `saranghaengbok_db` ;

-- -----------------------------------------------------
-- Table `saranghaengbok_db`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saranghaengbok_db`.`user` (
  `email` VARCHAR(64) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(256) NOT NULL,
  PRIMARY KEY (`username`))
;
INSERT INTO `user` (`email`, `username`, `password`) VALUES ('christodharma@gmail.com', 'christodharma', 'yangliatinicumachristo');

-- -----------------------------------------------------
-- Table `saranghaengbok_db`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saranghaengbok_db`.`admin` (
  `admin_username` VARCHAR(45) NOT NULL,
  CONSTRAINT `fk_username`
    FOREIGN KEY (`admin_username`)
    REFERENCES `saranghaengbok_db`.`user`(`username`)
    ON UPDATE CASCADE
);

-- -----------------------------------------------------
-- Table `saranghaengbok_db`.`item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saranghaengbok_db`.`item` (
  `item_id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `picture_path` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `price` FLOAT(10,2) NOT NULL,
  `quantity` INT NOT NULL,
  `Seller_username` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`item_id`, `Seller_username`),
  CONSTRAINT `fk_item_Seller1`
    FOREIGN KEY (`Seller_username`)
    REFERENCES `saranghaengbok_db`.`user` (`username`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
CREATE INDEX `fk_item_Seller1_idx` ON `saranghaengbok_db`.`item` (`Seller_username` ASC);

-- -----------------------------------------------------
-- Table `saranghaengbok_db`.`cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saranghaengbok_db`.`cart` (
  `item_id` INT NOT NULL,
  `cart_username` VARCHAR(45) NOT NULL,
  PRIMARY KEY(`item_id`, `cart_username`),
  CONSTRAINT `fk_cart_username`
    FOREIGN KEY (`cart_username`)
    REFERENCES `saranghaengbok_db`.`user`(`username`)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
  CONSTRAINT `fk_cart_item_id`
    FOREIGN KEY (`item_id`)
    REFERENCES `saranghaengbok_db`.`item`(`item_id`)
    ON DELETE CASCADE
);


CREATE user `saranghaengbok_db_admin` IDENTIFIED BY 'BOOMbitchgetouttheway';

flush privileges;

GRANT ALL ON `saranghaengbok_db`.* TO `saranghaengbok_db_admin`;

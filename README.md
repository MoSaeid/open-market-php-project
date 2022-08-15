# php_proj

-- SQL queries table users in database openmarket

CREATE TABLE `openmarket`.`users` ( `id` INT(255) NOT NULL AUTO_INCREMENT , `username` VARCHAR(255) NOT NULL , `password_hashed` VARCHAR(255) NOT NULL , `phone` VARCHAR(30) NOT NULL , `location` VARCHAR(255) NOT NULL , `member_since` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;



--ALTER TABLE

ALTER TABLE `users` ADD UNIQUE(`username`);




-- Products 

CREATE TABLE `openmarket`.`products` ( `product_id` INT(255) NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NOT NULL , `details` TEXT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `user_id` INT(255) NOT NULL , `photo_url` VARCHAR(255) NOT NULL , PRIMARY KEY (`product_id`)) ENGINE = InnoDB;



CREATE TABLE `db_express_wikrama`.`author`(
    `id` INT(14) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `year` VARCHAR(255) NULL,
    `publisher` VARCHAR(255)  NULL,
    `city` VARCHAR(255)  NULL,
    `editor` VARCHAR(255)  NULL,
    PRIMARY KEY(`id`)
)ENGINE = INNODB
-------------------------------------------------------------------------------------------------------------------
CREATE TABLE `db_express_wikrama`.`user`(
    `id` INT(14) NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`id`)
)ENGINE = INNODB
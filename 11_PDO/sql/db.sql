/* CREATING DATABASE */
CREATE SCHEMA `store` CHARACTER SET utf8;

/* CREATING TABLES */
CREATE TABLE `category` IF NOT EXISTS (
    `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,

    PRIMARY KEY (`id`)
);

CREATE TABLE `product` IF NOT EXISTS (
    `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `category_id` INTEGER UNSIGNED NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `price` DECIMAL(9,2) UNSIGNED NOT NULL DEFAULT 0,

    PRIMARY KEY(`id`),

    CONSTRAINT `fk_category_id`
        FOREIGN KEY `category_id` REFERENCES `category`(`id`)
);

/* INSERTING DATA */
INSERT INTO `category` (`name`) VALUE
    ('imóveis'),
    ('eletrônicos'),
    ('veículos')
;

INSERT INTO `product` ('category_id', 'name', 'price') VALUES
    (3, 'carro', 30000.00),
    (2, 'televisão', 2000.00)
;

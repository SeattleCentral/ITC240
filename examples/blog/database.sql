CREATE TABLE `editor` (
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) DEFAULT "Jane Doe",
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `active` BOOLEAN DEFAULT True,
    UNIQUE (`username`)
);

CREATE TABLE `blog` (
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `editor_id` INT NOT NULL,
    `title` VARCHAR(255),
    `content` TEXT,
    FOREIGN KEY (`editor_id`) REFERENCES `editor`(`id`) ON DELETE CASCADE
);


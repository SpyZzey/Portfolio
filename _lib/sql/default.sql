CREATE DATABASE  IF NOT EXISTS `portfolio`;
USE `portfolio`;

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
                            `message_id` int NOT NULL AUTO_INCREMENT,
                            `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
                            `email` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
                            `message` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
                            `timestamp` datetime NOT NULL,
                            PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
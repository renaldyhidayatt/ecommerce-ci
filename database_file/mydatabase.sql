-- Active: 1683854673696@@127.0.0.1@3306@ecommerce
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
   PRIMARY KEY (`role_id`)
);

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `category` (
  `category_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` VARCHAR(255) NOT NULL,
  `slug_category` VARCHAR(255) NOT NULL,
  `image_category` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `product` (
  `product_id` INT(10) PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `slug_product` VARCHAR(255) NOT NULL,
  `image_product` VARCHAR(200) NOT NULL,
  `category_id` INT(10) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `price` INT(10) NOT NULL,
  `countInStock` INT(10) NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `orders` (
  `order_id` VARCHAR(100) NOT NULL PRIMARY KEY,
  `email` VARCHAR(100) NOT NULL,
  `postal_code` VARCHAR(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `country_code` VARCHAR(100) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `total_product` varchar(100) NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
);


CREATE TABLE `slider` (
  `slider_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(255) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `role` (`role`) VALUES ('admin'), ('member');

SELECT MONTH(created_at) AS bulan, SUM(total_price) AS total_pendapatan FROM orders GROUP BY MONTH(created_at);
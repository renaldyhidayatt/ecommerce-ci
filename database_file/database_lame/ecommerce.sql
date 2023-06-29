-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 03:40 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `product_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `slug_category` varchar(255) NOT NULL,
  `image_category` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `nama_kategori`, `slug_category`, `image_category`, `created_at`, `updated_at`) VALUES
(1, 'Electronic', 'electronic', 'img1685815230.jpg', '2023-06-03 18:00:30', NULL),
(2, 'Fashion', 'fashion', 'img1685923537.jpg', '2023-06-05 00:05:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `postal_code` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `country_code` varchar(100) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `total_product` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `email`, `postal_code`, `user_id`, `country_code`, `total_price`, `total_product`, `created_at`, `updated_at`) VALUES
('09NBMbFOoN', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '244466', '2', '2023-06-05 15:15:26', '2023-06-05 15:15:26'),
('3K84zOVZrP', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '666702', '6', '2023-06-05 14:27:40', '2023-06-05 14:27:40'),
('41yJsgN3lC', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '466', '2', '2023-06-05 17:36:47', '2023-06-05 17:36:47'),
('88N4b16O56', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '1829', '13', '2023-06-05 18:20:31', '2023-06-05 18:20:31'),
('Ap9ojzh5F2', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '444468', '4', '2023-06-05 15:18:34', '2023-06-05 15:18:34'),
('auU9ezsh5o', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '244466', '2', '2023-06-05 15:10:03', '2023-06-05 15:10:03'),
('BaORPCAPrJ', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '699', '3', '2023-06-05 17:27:54', '2023-06-05 17:27:54'),
('bdnPCveG04', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '488932', '4', '2023-06-05 14:37:29', '2023-06-05 14:37:29'),
('cKu1gEaRaS', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '200002', '2', '2023-06-05 14:31:23', '2023-06-05 14:31:23'),
('DBQ4zsTyD8', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '244466', '2', '2023-06-05 15:12:22', '2023-06-05 15:12:22'),
('dhj2vcBUnT', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '452', '4', '2023-06-05 18:10:34', '2023-06-05 18:10:34'),
('e2OP2LyG3W', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '200002', '2', '2023-06-05 14:39:22', '2023-06-05 14:39:22'),
('eeltPgMaJT', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '339', '3', '2023-06-05 18:14:25', '2023-06-05 18:14:25'),
('FS3l8ktCfA', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '466', '2', '2023-06-05 18:07:56', '2023-06-05 18:07:56'),
('IG4V0hMZQ3', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '400004', '4', '2023-06-05 18:12:55', '2023-06-05 18:12:55'),
('Ix818krnLw', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '699', '3', '2023-06-05 18:16:05', '2023-06-05 18:16:05'),
('jbxlKcHpLN', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '699', '3', '2023-06-05 17:35:07', '2023-06-05 17:35:07'),
('jhHtVBuIAN', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '566701', '5', '2023-06-05 14:26:21', '2023-06-05 14:26:21'),
('jhm5yYyUmM', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '666702', '6', '2023-06-05 14:28:56', '2023-06-05 14:28:56'),
('KFHlyeOmzw', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '466', '2', '2023-06-05 17:29:50', '2023-06-05 17:29:50'),
('KM5FZDvVdi', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '122233', '1', '2023-06-05 15:04:07', '2023-06-05 15:04:07'),
('lcFf0htykT', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '566701', '5', '2023-06-05 14:54:42', '2023-06-05 14:54:42'),
('noOEz8qlnE', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '466', '2', '2023-06-05 17:15:48', '2023-06-05 17:15:48'),
('oaqvQcusus', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '200002', '2', '2023-06-05 15:20:16', '2023-06-05 15:20:16'),
('rZNZFqwPOa', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '244466', '2', '2023-06-05 15:02:30', '2023-06-05 15:02:30'),
('tmxtrL8FBk', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '122233', '1', '2023-06-05 15:08:24', '2023-06-05 15:08:24'),
('TsHiM8MDE7', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '226', '2', '2023-06-05 17:30:33', '2023-06-05 17:30:33'),
('ttlVreqvVu', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '300003', '3', '2023-06-05 08:48:45', '2023-06-05 08:48:45'),
('v8WWHBk20O', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '466', '2', '2023-06-05 17:18:39', '2023-06-05 17:18:39'),
('VQ6MSIC6uS', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '244466', '2', '2023-06-05 15:17:30', '2023-06-05 15:17:30'),
('VQy9REwxqx', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '611165', '5', '2023-06-05 14:29:57', '2023-06-05 14:29:57'),
('WECo0MJtJq', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '466', '2', '2023-06-05 18:09:09', '2023-06-05 18:09:09'),
('zpHjVcqNUz', 'sb-msp43g13315533@personal.example.com', '95131', 1, 'US', '200002', '2', '2023-06-05 18:15:35', '2023-06-05 18:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug_product` varchar(255) NOT NULL,
  `image_product` varchar(200) DEFAULT NULL,
  `category_id` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `countInStock` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `slug_product`, `image_product`, `category_id`, `description`, `price`, `countInStock`, `created_at`, `updated_at`) VALUES
(1, 'Iphone tab 21', 'iphone-tab-21', 'img1685963617.jpg', 1, 'iPad adalah sebuah produk komputer tablet buatan Apple Inc. (AI). iPad memiliki bentuk tampilan yang hampir serupa dengan iPod Touch dan iPhone, hanya saja ukurannya lebih besar dibandingkan kedua produk tersebut dan memiliki fungsi-fungsi tambahan sepert', 100001, 194, '2023-06-04 01:00:53', '2023-06-05 18:15:35'),
(2, 'Iphone 13', 'iphone-13', 'img1685959031.jpg', 1, 'iPhone 13[2] dan iPhone 13 Mini (dipasarkan sebagai iPhone 13 mini) adalah sebuah jenis telepon pintar yang dirancang, dikembangkan dan dipasarkan oleh Apple Inc. Produk tersebut adalah iPhone berharga rendah dan generasi kelima belas, menyusul iPhone 12.', 233, 194, '2023-06-05 09:49:02', '2023-06-05 18:20:31'),
(3, 'Thirst', 'thirst', 'img1685963641.jpg', 2, 'Bahan tekstil dan serat yang digunakan sebagai penutup tubuh. Pakaian adalah kebutuhan pokok manusia selain makanan dan tempat berteduh/tempat tinggal (rumah). Manusia membutuhkan pakaian untuk melindungi dan menutup dirinya.', 113, 187, '2023-06-05 09:49:44', '2023-06-05 18:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'adminn', '2023-06-03 16:27:13', NULL),
(2, 'member', '2023-06-02 18:28:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `nama`, `image`, `created_at`, `updated_at`) VALUES
(3, 'myhello', 'img1685923484.jpg', '2023-06-05 00:04:44', NULL),
(4, 'sayhello', 'img1685923561.jpg', '2023-06-05 00:06:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Dragon', 'Knight', 'dragon@gmail.com', '$2y$10$qwttw7kUzDdXumJVYBAZS.AX5/9ATW.cR3f/PWN3mG.OUYRCNTRA6', 1, '2023-06-02 18:29:47', NULL),
(2, 'Kentang', 'Knight', 'dota@gmail.com', '$2y$10$sAAFL86YYDhPV.H5A1hPFu13sRK0Op/plW24vQ589fR2Y7pl5pXk6', 1, '2023-06-02 18:45:41', NULL),
(3, 'Customis', 'FatalError', 'fatalerror@gmail.com', '$2y$10$QL9.AAglmovyNWq3qRV3Vu.FaVNZUSkx1Mf4.1TOINFoE02fMTtxO', 1, '2023-06-02 18:46:57', NULL),
(5, 'Dragoass', 'asadhfaskas', 'django@gmail.com', '$2y$10$EDcOskHhg7kuVKtaEwobse00GgxfSfkX26u9T0vIQWO9V4yn2dGo.', 1, '2023-06-03 01:52:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

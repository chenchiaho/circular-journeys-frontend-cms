-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 12 月 21 日 16:07
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `circular_journeys`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admins`
--

CREATE TABLE `admins` (
  `sid` int(11) NOT NULL,
  `account_id` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `admins`
--

INSERT INTO `admins` (`sid`, `account_id`, `password_hash`) VALUES
(2, 'kevinLa', '$2y$10$uS4kY1gRTYj02v12uvr/SeL1HYqnLEoTdzJpM/u7V8LW4nKlthkSq'),
(3, 'Anchor', '$2y$10$8ygdQqqGJ7mQSzE7FEoXk./N0G6XGJbYJcjPzTsxOYXQV1t3OWmsC'),
(4, 'Circle', '$2y$10$lxNFSJhX8YZnuSzwm8pEIOjlH166vq0b8XqUsQFTpVxY.VHyif2mq'),
(5, 'Alan', '$2y$10$m7ScZmsTplvDxbxRkYxdmunfJHbZ7F04PAUBWOBL9djX5BH.6/M0.');

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` decimal(36,0) NOT NULL,
  `created_at` date NOT NULL,
  `deleted_at` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `active_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `created_at`, `deleted_at`, `category_id`, `inventory_id`, `active_status`) VALUES
(1, 'test_product', 'testing, testing, testing, testing, testing, testing', 'testing, testing, testing, testing, testing, ', '17', '2022-12-01', '0000-00-00', 1, 1, 'yes');

-- --------------------------------------------------------

--
-- 資料表結構 `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `created_at` date NOT NULL,
  `deleted_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `product_inventories`
--

CREATE TABLE `product_inventories` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `deleted_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `users_information`
--

CREATE TABLE `users_information` (
  `id` int(11) NOT NULL COMMENT '編號',
  `member_id` varchar(25) NOT NULL COMMENT '會員編號',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '註冊日期',
  `active_status` tinyint(1) NOT NULL COMMENT '狀態',
  `first_name` varchar(25) NOT NULL COMMENT '姓',
  `last_name` varchar(25) NOT NULL COMMENT '名',
  `sex` char(1) NOT NULL COMMENT '性別',
  `password` varchar(50) NOT NULL COMMENT '密碼',
  `token` varchar(50) NOT NULL COMMENT '驗證碼',
  `email` varchar(25) NOT NULL COMMENT '信箱',
  `telephone` varchar(25) NOT NULL COMMENT '電話',
  `country` varchar(25) NOT NULL COMMENT '國家',
  `city` varchar(30) NOT NULL COMMENT '城市',
  `postal_code` varchar(10) NOT NULL COMMENT '郵遞區號',
  `address` varchar(50) NOT NULL COMMENT '地址',
  `payment_type` varchar(25) NOT NULL COMMENT '付款種類',
  `provider` varchar(25) NOT NULL COMMENT '供應商',
  `account_no` varchar(25) NOT NULL COMMENT '卡號',
  `expiry` date NOT NULL COMMENT '到期日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='user_databases';

--
-- 傾印資料表的資料 `users_information`
--

INSERT INTO `users_information` (`id`, `member_id`, `created_at`, `active_status`, `first_name`, `last_name`, `sex`, `password`, `token`, `email`, `telephone`, `country`, `city`, `postal_code`, `address`, `payment_type`, `provider`, `account_no`, `expiry`) VALUES
(1, '12345', '2022-12-21 02:44:42', 1, 'Chou', 'Alan', 'm', '123456', 'f1b699cc9af3eeb98e5de244ca7802ae38e77bae', 'alan@gmail.com', '0900000000', '台灣', '高雄市', '80711', '高雄市阿公店水庫', '信用卡', 'VISA', '1111 2222 3333 4444', '2022-12-21'),
(2, '12346', '2022-12-21 02:56:42', 1, 'La', 'Kevin', 'f', '123456', 'f1b699cc9af3eeb98e5de244ca7802ae38e77bae', 'kevin@gmail.com', '0900000000', '台灣', '高雄市', '80711', '高雄市阿公店0號水庫', '信用卡', 'VISA', '1111 2222 3333 4444', '2022-12-21'),
(3, '12347', '2022-12-21 02:57:28', 1, '陳', '家禾', 'f', '123456', 'f1b699cc9af3eeb98e5de244ca7802ae38e77bae', 'kevin@gmail.com', '0900000000', '台灣', '高雄市', '80711', '高雄市阿公店1號水庫', '信用卡', 'VISA', '1111 2222 3333 4444', '2022-12-21'),
(4, '12348', '2022-12-21 02:58:19', 1, '張', '圓圓', 'f', '123456', 'f1b699cc9af3eeb98e5de244ca7802ae38e77bae', 'circle@gmail.com', '0900000000', '台灣', '高雄市', '80711', '高雄市阿公店1號水庫', '信用卡', 'VISA', '1111 2222 3333 4444', '2022-12-21'),
(6, '12350', '2022-12-21 02:59:59', 1, '周', '杰倫', 'm', '123456', 'f1b699cc9af3eeb98e5de244ca7802ae38e77bae', 'ggg@gmail.com', '0900000000', '台灣', '台北市', '80711', '台北市大安森林公園', '信用卡', 'VISA', '1111 2222 3333 4444', '2022-12-21');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `account_id_2` (`account_id`),
  ADD KEY `account_id` (`account_id`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `inventory_id` (`inventory_id`);

--
-- 資料表索引 `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_inventories`
--
ALTER TABLE `product_inventories`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users_information`
--
ALTER TABLE `users_information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`member_id`),
  ADD UNIQUE KEY `member_id` (`member_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admins`
--
ALTER TABLE `admins`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_inventories`
--
ALTER TABLE `product_inventories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users_information`
--
ALTER TABLE `users_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

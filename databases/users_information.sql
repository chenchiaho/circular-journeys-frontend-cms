-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 12 月 21 日 04:00
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
-- 資料庫： `users_data`
--

-- --------------------------------------------------------

--
-- 資料表結構 `users_information`
--

CREATE TABLE `users_information` (
  `id` int(11) NOT NULL COMMENT '編號',
  `member_id` varchar(25) NOT NULL COMMENT '會員編號',
  `last_name` varchar(25) NOT NULL COMMENT '名',
  `first_name` varchar(25) NOT NULL COMMENT '姓',
  `sex` char(1) NOT NULL COMMENT '性別',
  `email` varchar(25) NOT NULL COMMENT '信箱',
  `password` varchar(25) NOT NULL COMMENT '密碼',
  `telephone` varchar(25) NOT NULL COMMENT '電話',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '註冊日期',
  `active_status` tinyint(1) NOT NULL COMMENT '狀態',
  `token` varchar(50) NOT NULL COMMENT '驗證碼',
  `address` varchar(50) NOT NULL COMMENT '地址',
  `city` varchar(30) NOT NULL COMMENT '城市',
  `postal_code` varchar(10) NOT NULL COMMENT '郵遞區號',
  `country` varchar(25) NOT NULL COMMENT '國家',
  `payment_type` varchar(25) NOT NULL COMMENT '付款種類',
  `provider` varchar(25) NOT NULL COMMENT '供應商',
  `account_no` varchar(25) NOT NULL COMMENT '卡號',
  `expiry` date NOT NULL COMMENT '到期日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='user_databases';

--
-- 傾印資料表的資料 `users_information`
--

INSERT INTO `users_information` (`id`, `member_id`, `last_name`, `first_name`, `sex`, `email`, `password`, `telephone`, `created_at`, `active_status`, `token`, `address`, `city`, `postal_code`, `country`, `payment_type`, `provider`, `account_no`, `expiry`) VALUES
(1, '12345', 'Alan', 'Chou', 'm', 'alan@gmail.com', '123456', '0900000000', '2022-12-21 02:44:42', 1, 'f1b699cc9af3eeb98e5de244ca7802ae38e77bae', '高雄市阿公店水庫', '高雄市', '80711', '台灣', '信用卡', 'VISA', '1111 2222 3333 4444', '2022-12-21'),
(2, '12346', 'Kevin', 'La', 'f', 'kevin@gmail.com', '123456', '0900000000', '2022-12-21 02:56:42', 1, 'f1b699cc9af3eeb98e5de244ca7802ae38e77bae', '高雄市阿公店0號水庫', '高雄市', '80711', '台灣', '信用卡', 'VISA', '1111 2222 3333 4444', '2022-12-21'),
(3, '12347', '家禾', '陳', 'f', 'kevin@gmail.com', '123456', '0900000000', '2022-12-21 02:57:28', 1, 'f1b699cc9af3eeb98e5de244ca7802ae38e77bae', '高雄市阿公店1號水庫', '高雄市', '80711', '台灣', '信用卡', 'VISA', '1111 2222 3333 4444', '2022-12-21'),
(4, '12348', '圓圓', '張', 'f', 'circle@gmail.com', '123456', '0900000000', '2022-12-21 02:58:19', 1, 'f1b699cc9af3eeb98e5de244ca7802ae38e77bae', '高雄市阿公店1號水庫', '高雄市', '80711', '台灣', '信用卡', 'VISA', '1111 2222 3333 4444', '2022-12-21'),
(5, '12349', '英九', '馬', 'm', '999@gmail.com', '123456', '0900000000', '2022-12-21 02:59:08', 1, 'f1b699cc9af3eeb98e5de244ca7802ae38e77bae', '高雄市阿公店10號水庫', '高雄市', '80711', '台灣', '信用卡', 'VISA', '1111 2222 3333 4444', '2022-12-21'),
(6, '12350', '杰倫', '周', 'm', 'ggg@gmail.com', '123456', '0900000000', '2022-12-21 02:59:59', 1, 'f1b699cc9af3eeb98e5de244ca7802ae38e77bae', '台北市大安森林公園', '台北市', '80711', '台灣', '信用卡', 'VISA', '1111 2222 3333 4444', '2022-12-21');

--
-- 已傾印資料表的索引
--

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
-- 使用資料表自動遞增(AUTO_INCREMENT) `users_information`
--
ALTER TABLE `users_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

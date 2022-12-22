-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 12 月 21 日 16:21
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 7.4.29

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
-- 資料表結構 `tourist_tags_category`
--

CREATE TABLE `tourist_tags_category` (
  `tourist_tag_id` int(11) NOT NULL,
  `tourist_spot` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `tourist_tags_category`
--

INSERT INTO `tourist_tags_category` (`tourist_tag_id`, `tourist_spot`) VALUES
(1, '駁二'),
(2, '壽山'),
(3, '澄清湖'),
(4, '愛河'),
(5, '美術館'),
(6, '英國領事館'),
(7, '中都溼地'),
(8, '衛武營'),
(9, '香蕉碼頭'),
(10, '小崗山'),
(11, '旗津'),
(12, '西子灣'),
(13, '巨蛋'),
(14, '凹子底'),
(15, '中央公園'),
(16, '新崛江'),
(17, '岡山老街'),
(18, '高雄港'),
(19, '大東'),
(20, '瑞豐夜市'),
(21, '流行音樂中心'),
(22, '蓮池潭'),
(24, '淨園農場'),
(25, '忠烈祠'),
(26, '動物園'),
(27, '龍湖塔'),
(28, '義大'),
(29, '佛光山'),
(30, '文化中心'),
(31, '糖廠'),
(32, '旗山'),
(33, '英國領事館'),
(34, '岡山之眼'),
(35, '半屏山'),
(36, '泥火山'),
(37, '阿公店水庫'),
(38, '興達港'),
(39, '觀音山'),
(40, '月世界');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `tourist_tags_category`
--
ALTER TABLE `tourist_tags_category`
  ADD PRIMARY KEY (`tourist_tag_id`) USING BTREE;

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `tourist_tags_category`
--
ALTER TABLE `tourist_tags_category`
  MODIFY `tourist_tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

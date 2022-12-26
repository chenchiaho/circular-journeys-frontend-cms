-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2022 at 08:15 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `circular_journeys`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` decimal(36,0) NOT NULL,
  `created_at` date NOT NULL,
  `modified_at` date NOT NULL,
  `category_id` varchar(25) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `active_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `created_at`, `modified_at`, `category_id`, `inventory_id`, `active_status`) VALUES
(79, 'CJ\'s 萬用手提包 (深藍)', 'CJ\'s 萬用手提包是一個耐用、多功能的選擇，適用於各種旅行目的地。超大容量，可以輕鬆容納你所有的旅行用品。此外，它還配有可拆卸肩帶，方便你在旅行中彈性調整。\r\n\r\n設計精美，這款旅行包既時尚又功能強大。它的外層采用了防水材質，能有效保護你的物品不受潮濕影響。此外，它還配有許多口袋和插扣，方便你組織和分類旅行用品。\r\n\r\n不管是在城市中漫步，還是在野外旅行，這款旅行包都能為你提供最佳的保護和便利。它是你旅行的理想夥伴，讓你的旅行更加愉快和輕鬆。', 'product-images/image_63a6f9a713b9c.jpg', '1900', '2022-12-24', '2022-12-24', '旅行包包 / 行李 / 收納', 25, '1'),
(80, 'CJ\'s 萬用手提包 (咖啡)', 'CJ\'s 萬用手提包是一個耐用、多功能的選擇，適用於各種旅行目的地。超大容量，可以輕鬆容納你所有的旅行用品。此外，它還配有可拆卸肩帶，方便你在旅行中彈性調整。 設計精美，這款旅行包既時尚又功能強大。它的外層采用了防水材質，能有效保護你的物品不受潮濕影響。此外，它還配有許多口袋和插扣，方便你組織和分類旅行用品。 不管是在城市中漫步，還是在野外旅行，這款旅行包都能為你提供最佳的保護和便利。它是你旅行的理想夥伴，讓你的旅行更加愉快和輕鬆。', 'product-images/image_63a6faa4b0358.jpg', '2000', '2022-12-24', '2022-12-24', '旅行包包 / 行李 / 收納', 18, '1'),
(81, 'CJ\'s 城市包 (藍)', 'CJ\'s 城市包是一個耐用、多功能的選擇，適用於各種旅行目的地。超大容量，可以輕鬆容納你所有的旅行用品。此外，它還配有可拆卸肩帶，方便你在旅行中彈性調整。 設計精美，這款旅行包既時尚又功能強大。它的外層采用了防水材質，能有效保護你的物品不受潮濕影響。此外，它還配有許多口袋和插扣，方便你組織和分類旅行用品。 不管是在城市中漫步，還是在野外旅行，這款旅行包都能為你提供最佳的保護和便利。它是你旅行的理想夥伴，讓你的旅行更加愉快和輕鬆。', 'product-images/image_63a6faed50df6.jpg', '1700', '2022-12-24', '2022-12-24', '旅行包包 / 行李 / 收納', 6, '0'),
(82, 'CJ\'s 西裝收納包 (深藍)', 'CJ\'s 西裝收納包是一個耐用、多功能的選擇，適用於各種場合。超大空間，可以輕鬆容納你的西裝、衬衫、領帶等衣物。此外，它還配有一個可拆卸插扣，方便你在出差或是旅行中攜帶。\r\n\r\n設計精美，這款收納包既優雅又實用。它的外層采用了防刮、耐磨的材質，能有效保護你的物品不受損壞。此外，它還配有許多口袋和插扣，方便你組織和分類日常用品。\r\n\r\n外觀方面，這款收納包提供了多種顏色和款式選擇。你可以根據自己的喜好選擇最適合你的款式。不管是在商務會議中，還是在旅行中，這款收納包都能為你提供最佳的便利。它是你生活中不可或缺的好幫手，讓你的穿著始終保持整潔和精致。', 'product-images/image_63a6fd34d9f86.jpg', '1500', '2022-12-24', '2022-12-24', '旅行包包 / 行李 / 收納', 6, '0'),
(83, 'CJ\'s 行李保護套', 'CJ\'s 行李保護套是一個耐用、多功能的選擇，適用於各種行李。它的外層采用了防水、防污染的材質，能有效保護你的行李不受潮濕、污染的影響。此外，它還配有一個可拆卸插扣和一個可拆卸肩帶，方便你在旅行中攜帶。\r\n\r\n設計精美，這款保護套既優雅又實用。它的多層設計能有效保護你的行李不受撞擊、擠壓的影響。此外，它還配有許多口袋和插扣，方便你組織和分類旅行用品。\r\n\r\n外觀方面，這款保護套提供了多種顏色和款式選擇。你可以根據自己的喜好選擇最適合你的款式。不管是在機場、火車站，還是在旅館中，這款保護套都能為你提供最佳的保護和便利。它是你旅行中不可或缺的好幫手，讓你的行李始終保持整潔和完好。\r\n\r\n此外，這款保護套還提供了自適應的尺寸設計，能輕鬆地套在各種大小的行李上。它是一款高性價比的產品，讓你的旅行更加愉快和輕鬆。', 'product-images/image_63a6fe91e7655.jpeg', '700', '2022-12-24', '2022-12-24', '旅行包包 / 行李 / 收納', 17, '0'),
(84, 'CJ\'s 旅遊防盜包包', 'CJ\'s 旅遊防盜包包是一個安全、耐用的選擇，適用於各種旅行目的地。它的外層采用了防盜鎖、防盜拉鍊等防盜措施，能有效保護你的財物不受盜竊的威脅。此外，它還配有一個反光標識和一個隱形插扣，方便你在旅行中攜帶。\r\n\r\n設計精美，這款包包既優雅又實用。它的多層設計能有效保護你的財物不受撞擊、擠壓的影響。此外，它還配有許多口袋和插扣，方便你組織和分類旅行用品。\r\n\r\n外觀方面，這款包包提供了多種顏色和款式選擇。你可以根據自己的喜好選擇最適合你的款式。不管是在城市裡漫步，還是在野外旅行，這款包包都能為你提供最佳的保護和便利。它是你旅行中不可或缺的好幫手，讓你的財物始終保持安全和完好。\r\n\r\n此外，這款包包還提供了自適應的尺寸設計，能輕鬆地套在各種大小的行李上。它是一款高性價比的產品，讓你的旅行更加愉快和輕鬆。', 'product-images/image_63a7098976f33.jpg', '2500', '2022-12-24', '2022-12-24', '旅行包包 / 行李 / 收納', 16, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `inventory_id` (`inventory_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

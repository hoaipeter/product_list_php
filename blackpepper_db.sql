-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Dec 10, 2021 at 02:28 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blackpepper_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `product_id` int NOT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `base_unit_price` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `unit_price` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`product_id`, `currency`, `base_unit_price`, `unit_price`) VALUES
(3, 'NZD', '34.99', '15.00'),
(5, 'NZD', '34.99', '15.00'),
(8, 'NZD', '34.99', '15.00'),
(9, 'NZD', '34.99', '15.00'),
(10, 'NZD', '34.99', '15.00'),
(12, 'NZD', '34.99', '15.00'),
(13, 'NZD', '34.99', '15.00'),
(14, 'NZD', '39.99', '39.99'),
(15, 'NZD', '39.99', '39.99'),
(16, 'NZD', '39.99', '39.99'),
(17, 'NZD', '39.99', '39.99'),
(18, 'NZD', '34.99', '15.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `style` varchar(30) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_520_ci,
  `extdescription` longtext COLLATE utf8mb4_unicode_520_ci,
  `img_url` text COLLATE utf8mb4_unicode_520_ci,
  `lastupdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_id`, `style`, `description`, `extdescription`, `img_url`, `lastupdated`) VALUES
(13, 3, 'BV45561CHK', 'Cropped Boucle Tweed Top', 'The sweetest bouclé tweed cami with a round neckline, check print, cropped length and antique button detail.', '/images/cropped_boucle_tweed_top.png', '2021-03-26 08:17:17'),
(14, 5, 'DS45942POL', 'Square Neck Ruched Mini Dress', 'Featuring a slim-fit with ruched material, square neckline and thin spaghetti straps.', '/images/square_neck_ruched_mini_dress.png', '2021-03-20 00:06:22'),
(15, 8, 'JD45788DNM', 'Diagonal Stitch Tapered Jean', 'Featuring a cropped length, high-rise fit, tapered leg and diagonal stitch detail.\r\nInside leg length = 70cm.', '/images/diagonal_stitch_tapered_jean.png', '2021-05-18 13:22:05'),
(16, 9, 'TS45477WAS', 'Super Oversized Tee', 'Featuring an oversized fit, crew neckline and 100% cotton fabric.', '/images/super_oversized_tee.png', '2021-04-06 00:06:07'),
(17, 10, 'KL45962KNT', 'Boxy Knit Top', 'Featuring a boxy style longsleeve top in a cotton blend knit material.', '/images/boxy_knit_top.png', '2021-05-18 13:10:30'),
(18, 12, 'TC46959SEA', 'Seamless Zip Through Top', 'This longsleeve top features a cropped length, zip through detail, a scoop neckline and seamless ribbed material.', '/images/seamless_zip_through_top.png', '2021-05-18 13:06:55'),
(19, 13, 'BL45309COR', 'Longline Cord Shirt', 'A vintage classic! Featuring a loose-fit, textured corduroy fabric, front pockets and tortoise shell buttons.', '/images/longline_cord_shirt.png', '2021-05-18 09:57:17'),
(20, 14, 'JD43761DNM', 'Super High Rise Straight Jean', 'Straight leg jean featuring a raw hem and high waisted fit.  Inside leg length = 71.5cm.\r\n\r\nREPREVE denim is designed for our denim lover! My recycled polyester fibres offer an eco friendly superior stretch denim with durability that maintains the authentic look and feel of traditional denim.', '/images/super_high_rise_straight_jean.png', '2021-05-18 15:30:21'),
(21, 15, 'PW44707PLN', 'Pintuck Wide Leg Pant', 'Featuring a floaty wide leg, elasticated waistband and pintuck detail.', '/images/pintuck_wide_leg_pant.png', '2021-05-18 13:07:50'),
(22, 16, 'TL44688SEA', 'Seamless V-Scoop Top', 'Featuring a longsleeve style with ribbed seamless material, a low neckline and back.', '/images/seamless_v-scoop_top.png', '2021-05-18 13:21:38'),
(23, 17, 'JD41279DNM', 'Wide Leg Jean', 'Featuring a high waist, snug through the hip with a straight leg style and ripped detailing on the hem.\r\nInside leg length is 70cm.', '/images/wide_leg_jean.png', '2021-05-18 13:23:27'),
(24, 18, 'TC46959SEA', 'Seamless Zip Through Top', 'This longsleeve top features a cropped length, zip through detail, a scoop neckline and seamless ribbed material.', '/images/seamless_zip_through_top.png', '2021-05-18 13:06:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

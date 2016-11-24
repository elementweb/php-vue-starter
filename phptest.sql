-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2016 at 10:31 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phptest`
--

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `charge_per_unit` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `title`, `description`, `charge_per_unit`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Cross-platform composite installation', 'Cross-platform composite installation description', 82.51, 97, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(2, 'Versatile non-volatile access', 'Versatile non-volatile access description', 34.16, 139, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(3, 'Reverse-engineered demand-driven middleware', 'Reverse-engineered demand-driven middleware description', 81.32, 143, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(4, 'Innovative attitude-oriented neural-net', 'Innovative attitude-oriented neural-net description', 21.26, 146, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(5, 'Configurable zerodefect strategy', 'Configurable zerodefect strategy description', 84.47, 93, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(6, 'Multi-channelled stable GraphicalUserInterface', 'Multi-channelled stable GraphicalUserInterface description', 47.40, 97, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(7, 'Streamlined client-driven conglomeration', 'Streamlined client-driven conglomeration description', 129.59, 135, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(8, 'Ergonomic responsive software', 'Ergonomic responsive software description', 106.58, 126, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(9, 'Organized well-modulated toolset', 'Organized well-modulated toolset description', 109.13, 60, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(10, 'Ergonomic multimedia encryption', 'Ergonomic multimedia encryption description', 106.06, 134, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(11, 'Multi-layered coherent archive', 'Multi-layered coherent archive description', 97.53, 40, '2016-11-24 10:30:54', '2016-11-24 10:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(10) UNSIGNED NOT NULL,
  `hash` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `charge_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quote_goods`
--

CREATE TABLE `quote_goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `quote_id` int(11) NOT NULL,
  `good_id` int(11) NOT NULL,
  `quantity` double(8,2) NOT NULL,
  `charge_per_unit` double(8,2) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quote_services`
--

CREATE TABLE `quote_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `quote_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `charge_per_hour` double(8,2) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `day` int(11) NOT NULL,
  `hour` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quote_subscriptions`
--

CREATE TABLE `quote_subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `quote_id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `charge_per_day` double(8,2) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `charge_per_hour` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `charge_per_hour`, `created_at`, `updated_at`) VALUES
(1, 'Persevering interactive success', 'Persevering interactive success description', 73.01, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(2, 'Configurable local budgetarymanagement', 'Configurable local budgetarymanagement description', 78.74, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(3, 'Persevering cohesive internetsolution', 'Persevering cohesive internetsolution description', 49.39, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(4, 'User-centric neutral productivity', 'User-centric neutral productivity description', 79.83, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(5, 'Business-focused content-based middleware', 'Business-focused content-based middleware description', 43.80, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(6, 'Fundamental optimizing moratorium', 'Fundamental optimizing moratorium description', 119.56, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(7, 'Adaptive zeroadministration info-mediaries', 'Adaptive zeroadministration info-mediaries description', 29.73, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(8, 'Synchronised empowering capability', 'Synchronised empowering capability description', 74.50, '2016-11-24 10:30:54', '2016-11-24 10:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `charge_per_day` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `title`, `description`, `charge_per_day`, `created_at`, `updated_at`) VALUES
(1, 'Sharable full-range paradigm', 'Sharable full-range paradigm description', 120.33, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(2, 'Triple-buffered demand-driven core', 'Triple-buffered demand-driven core description', 61.68, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(3, 'Fundamental global instructionset', 'Fundamental global instructionset description', 22.67, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(4, 'Vision-oriented explicit budgetarymanagement', 'Vision-oriented explicit budgetarymanagement description', 103.21, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(5, 'Innovative fresh-thinking emulation', 'Innovative fresh-thinking emulation description', 113.49, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(6, 'Mandatory interactive encoding', 'Mandatory interactive encoding description', 81.31, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(7, 'Vision-oriented attitude-oriented service-desk', 'Vision-oriented attitude-oriented service-desk description', 29.95, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(8, 'Vision-oriented even-keeled paradigm', 'Vision-oriented even-keeled paradigm description', 23.19, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(9, 'Multi-layered 3rdgeneration alliance', 'Multi-layered 3rdgeneration alliance description', 129.44, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(10, 'Innovative radical time-frame', 'Innovative radical time-frame description', 23.77, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(11, 'Upgradable intangible protocol', 'Upgradable intangible protocol description', 96.23, '2016-11-24 10:30:54', '2016-11-24 10:30:54'),
(12, 'Centralized multimedia contingency', 'Centralized multimedia contingency description', 42.64, '2016-11-24 10:30:54', '2016-11-24 10:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotes_user_id_foreign` (`user_id`);

--
-- Indexes for table `quote_goods`
--
ALTER TABLE `quote_goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quote_goods_quote_id_foreign` (`quote_id`),
  ADD KEY `quote_goods_good_id_foreign` (`good_id`);

--
-- Indexes for table `quote_services`
--
ALTER TABLE `quote_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quote_services_quote_id_foreign` (`quote_id`),
  ADD KEY `quote_services_service_id_foreign` (`service_id`);

--
-- Indexes for table `quote_subscriptions`
--
ALTER TABLE `quote_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quote_subscriptions_quote_id_foreign` (`quote_id`),
  ADD KEY `quote_subscriptions_subscription_id_foreign` (`subscription_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quote_goods`
--
ALTER TABLE `quote_goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quote_services`
--
ALTER TABLE `quote_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quote_subscriptions`
--
ALTER TABLE `quote_subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

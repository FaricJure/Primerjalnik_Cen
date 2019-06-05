-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 05. jun 2019 ob 09.13
-- Različica strežnika: 10.1.40-MariaDB
-- Različica PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `praktikum2.2`
--

-- --------------------------------------------------------

--
-- Struktura tabele `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Milk'),
(2, 'Bread'),
(3, 'Chocolate'),
(4, 'Vegetables'),
(5, 'Fruit');

-- --------------------------------------------------------

--
-- Struktura tabele `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabele `listed_products`
--

CREATE TABLE `listed_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabele `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabele `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `value` decimal(10,0) DEFAULT NULL,
  `old_value` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabele `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `barcode` int(11) NOT NULL,
  `price` double NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `details` varchar(500) NOT NULL,
  `visits` int(11) NOT NULL,
  `user_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `product`
--

INSERT INTO `product` (`id`, `name`, `barcode`, `price`, `image_url`, `category_id`, `description`, `subcategory_id`, `details`, `visits`, `user_id`) VALUES
(17, '14', 0, 24, '', 5, '', NULL, '', 0, 0),
(18, '14', 0, 24, '', 5, '', NULL, '', 0, 0),
(19, '14', 0, 24, '', 5, '', NULL, '', 0, 0),
(20, 'test', 0, 24, '', 5, '', NULL, '', 0, 0),
(21, 'test', 0, 24, '', 5, '', NULL, '', 0, 0),
(22, 'test', 1234, 23, '', 2, '', NULL, '', 0, 0),
(23, 'sas', 0, 2, '', 5, '', NULL, '', 0, 0),
(24, 'bojana', 1726, 10, '', 5, '', NULL, '', 0, 0),
(25, 'Peach', 123456, 10, 'peaches4.jpg', 5, '', NULL, '', 0, 0),
(26, 'cokolado', 2147483647, 2, 'chocolate.jpg', 3, 'Cokoladava top e brat', 1, '', 0, 0),
(27, 'Alpsko', 65132, 2, 'alpsko-mleko-3-5-1l-photo.jpg', 5, '984651351', 1, '', 0, 0),
(28, 'Bitolsko', 46513, 2, '', 1, 'Bitolsko mleko', 1, '', 0, 4);

-- --------------------------------------------------------

--
-- Struktura tabele `product_store`
--

CREATE TABLE `product_store` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `product_store`
--

INSERT INTO `product_store` (`id`, `product_id`, `store_id`) VALUES
(37, 17, 4),
(40, 20, 4),
(41, 21, 4),
(42, 22, 2),
(43, 23, 4),
(44, 24, 4),
(45, 25, 4),
(46, 26, 1),
(47, 27, 4),
(48, 28, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabele `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `id_location` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `store`
--

INSERT INTO `store` (`id`, `name`, `id_location`) VALUES
(1, 'Tus', NULL),
(2, 'Spar', NULL),
(3, 'Hofer', NULL),
(4, 'Merkator', NULL);

-- --------------------------------------------------------

--
-- Struktura tabele `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `category_id`) VALUES
(1, 'praski', 5),
(2, 'Banani', 5);

-- --------------------------------------------------------

--
-- Struktura tabele `user`
--

CREATE TABLE `user` (
  `id` int(200) NOT NULL,
  `uid` tinytext NOT NULL,
  `pwd` tinytext NOT NULL,
  `email` longtext NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `user`
--

INSERT INTO `user` (`id`, `uid`, `pwd`, `email`, `admin`) VALUES
(3, 'admin', '$2y$10$xJ3EOO.RTe8pR6CCkJcDLOm8k/J5V7M1fMQ0uElkYiEv0sDoxtLDu', 'admin@mail.com', 1),
(4, 'Eftimije', '$2y$10$TK1ynl7xXIj629n9rUHzC.b175K/ld.VKWbASY1vl1B/BGloLlDu.', 'tomovskie@gmail.com', 0),
(5, 'Bojana', '$2y$10$XUOqowwbyQs.GRU60O6n3.EdywFBykz/LuJdO98vVf2f9idJFeDXG', 'bojana@gmail.com', 0);

-- --------------------------------------------------------

--
-- Struktura tabele `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(8) NOT NULL,
  `product_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `wishlist`
--

INSERT INTO `wishlist` (`id`, `product_id`, `user_id`, `date`) VALUES
(242, 26, 4, '0000-00-00'),
(243, 26, 4, '0000-00-00'),
(244, 25, 5, '0000-00-00'),
(245, 26, 4, '0000-00-00'),
(246, 22, 4, '0000-00-00'),
(247, 26, 4, '0000-00-00');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeksi tabele `listed_products`
--
ALTER TABLE `listed_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksi tabele `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeksi tabele `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`category_id`),
  ADD KEY `subcategory_id` (`subcategory_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksi tabele `product_store`
--
ALTER TABLE `product_store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indeksi tabele `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeksi tabele `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_ibfk_1` (`id_location`);

--
-- Indeksi tabele `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeksi tabele `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT tabele `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `listed_products`
--
ALTER TABLE `listed_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT tabele `product_store`
--
ALTER TABLE `product_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT tabele `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT tabele `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT tabele `user`
--
ALTER TABLE `user`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT tabele `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Omejitve za tabelo `listed_products`
--
ALTER TABLE `listed_products`
  ADD CONSTRAINT `listed_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `listed_products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Omejitve za tabelo `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `price_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Omejitve za tabelo `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`id`);

--
-- Omejitve za tabelo `product_store`
--
ALTER TABLE `product_store`
  ADD CONSTRAINT `product_store_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product_store_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`);

--
-- Omejitve za tabelo `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Omejitve za tabelo `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_ibfk_1` FOREIGN KEY (`id_location`) REFERENCES `location` (`id`);

--
-- Omejitve za tabelo `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

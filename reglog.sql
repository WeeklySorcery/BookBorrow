-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 02:20 PM
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
-- Database: `reglog`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `qty` varchar(45) DEFAULT NULL,
  `customer` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `Order_id` int(100) NOT NULL,
  `User_id` int(100) NOT NULL,
  `Full_Name` text NOT NULL,
  `Phone_No` bigint(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Pay_Mode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `idProduct` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_desc` text NOT NULL,
  `product_price` int(50) NOT NULL,
  `image_book` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`idProduct`, `product_name`, `product_desc`, `product_price`, `image_book`) VALUES
(1, 'The Dark Rising', 'On the Midwinter Day that is his eleventh birthday, Will Stanton discovers a special gift -- that he is the last of the Old Ones, immortals dedicated to keeping the world from domination by the forces of evil, the Dark. At once, he is plunged into a quest for the six magical Signs that will one day aid the Old Ones in the final battle between the Dark and the Light. And for the twelve days of Christmas, while the Dark is rising, life for Will is full of wonder, terror, and delight.', 350, 'RESOURCES/Books//list-of-books/thedarkisrising.jpg'),
(2, 'Starsight', 'All her life, Spensa\'s dreamed of becoming a pilot and proving herself a hero like her father. She made it to the sky, but the truths she learned there were crushing. The rumors of her father\'s cowardice are true--he deserted his Flight during battle against the Krell. Worse, though, he turned against his team and attacked them.', 600, 'RESOURCES/Books//list-of-books/starsight.jpg'),
(3, 'Harry Potter', 'Turning the envelope over, his hand trembling, Harry saw a purple wax seal bearing a coat of arms; a lion, an eagle, a badger and a snake surrounding a large letter H.\r\n\r\nHarry Potter has never even heard of Hogwarts when the letters start dropping on the doormat at number four, Privet Drive. Addressed in green ink on yellowish parchment with a purple seal, they are swiftly confiscated by his grisly aunt and uncle. Then, on Harry`s eleventh birthday, a great beetle-eyed giant of a man called Rubeus Hagrid bursts in with some astonishing news: Harry Potter is a wizard, and he has a place at Hogwarts School of Witchcraft and Wizardry. An incredible adventure is about to begin!', 380, 'RESOURCES/Books//list-of-books/harry potter.jpg'),
(4, 'Scythe', 'Two teens must learn the \"art of killing\" in this Printz Honor-winning book, the first in a chilling new series from Neal Shusterman, author of the New York Times best-selling Unwind Dystology series.\r\n\r\nA world with no hunger, no disease, no war, no misery: Humanity has conquered all those things and has even conquered death. Now Scythes are the only ones who can end life - and they are commanded to do so in order to keep the size of the population under control.', 280, 'RESOURCES/Books//list-of-books/scythe.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_cost` int(11) NOT NULL,
  `order_products` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `card_no` bigint(250) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `username`, `email`, `password`, `card_no`, `usertype`) VALUES
(1, 'Person Admin', 'admin', 'Admin@gmail.com', '1234', 4513256858760869, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users_input`
--

CREATE TABLE `users_input` (
  `id` int(11) NOT NULL,
  `input_email` varchar(50) NOT NULL,
  `input_message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_input_data`
--

CREATE TABLE `users_input_data` (
  `id` int(11) NOT NULL,
  `input_email` varchar(50) NOT NULL,
  `input_message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `Order_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(100) NOT NULL,
  `Quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idProduct`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_order_ibfk_1` (`user_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_input`
--
ALTER TABLE `users_input`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_input_data`
--
ALTER TABLE `users_input_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `Order_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users_input`
--
ALTER TABLE `users_input`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_input_data`
--
ALTER TABLE `users_input_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

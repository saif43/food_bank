-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2017 at 05:23 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_bank`
--

-- --------------------------------------------------------
CREATE TABLE `customers` (
  `C_ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `contact` int(11) NOT NULL,
  `c_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`C_ID`, `username`, `password`, `address`, `type`, `gender`, `contact`, `c_email`) VALUES
(0, 'Admin', '9999', '19 No Road,Dhanmondi', 'Admin', 'male', 555555, 'usai@gmail.com'),
(20, 'Mithun', '5555', 'Dania,dhaka', 'User', 'Male', 111111, 'mithun@gmail.com'),
(21, 'Piya', '1111', 'Dhanmondi,Dhaka', 'User', 'female', 113333, 'piya@gmail.com'),
(22, 'Zahid', '2222', 'Dhanmondi,dhaka', 'User', 'Male', 1222222, 'Zahid@gmail.com'),
(23, 'Tithi', '3333', 'Motijhil,dhaka', 'User', 'Female', 144444, 'tithi@gmail.com'),
(24, 'Mini', '4444', 'Mohammadpur,dhaka', 'User', 'Female', 115555, 'mini@gmail.com'),
(25, 'Saif', '7777', 'Islambag,Lalbag', 'User', 'male', 42100, 'saif@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `f_ID` int(11) NOT NULL,
  `f_name` varchar(40) NOT NULL,
  `f_type` varchar(40) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`f_ID`, `f_name`, `f_type`, `price`) VALUES
(30, 'Caesar Salad', 'Salad', 385),
(31, 'Mediterranean Salad', 'Salad', 300),
(32, 'Spicy Rice', 'Lunch', 110),
(33, 'French Fries', 'Snacks', 195),
(34, 'Mutton Boti Kebab', 'Kabab', 100),
(35, 'Chicken Tikka Kebab', 'Kabab', 80),
(36, 'Beef Kebab Roll', 'Kabab', 90),
(37, 'Mutton Khichuri', 'Lunch', 110),
(38, 'Chicken Biriany', 'Dinner', 110),
(39, 'Chocolate Ice cream', 'Dessert', 150),
(40, 'Firni', 'Dessert', 80),
(41, 'Chocolate Pestry', 'Dessert', 200),
(48, 'Mad Burger ', 'Burger', 170),
(49, 'Chicken Salad', 'Salad', 350),
(54, 'Cheeser Burger', '160', 0);

-- --------------------------------------------------------

--
-- Table structure for table `food_rating`
--

CREATE TABLE `food_rating` (
  `C_ID` int(11) NOT NULL,
  `f_ID` int(11) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_rating`
--

INSERT INTO `food_rating` (`C_ID`, `f_ID`, `rating`) VALUES
(21, 30, 4),
(22, 30, 1),
(25, 30, 5);

-- --------------------------------------------------------

--
-- Table structure for table `restaurent`
--

CREATE TABLE `restaurent` (
  `rest_ID` int(11) NOT NULL,
  `rest_name` varchar(40) NOT NULL,
  `rest_address` varchar(40) NOT NULL,
  `est_year` int(11) NOT NULL,
  `rest_feature` varchar(40) NOT NULL,
  `rest_website` varchar(40) NOT NULL,
  `rest_email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurent`
--

INSERT INTO `restaurent` (`rest_ID`, `rest_name`, `rest_address`, `est_year`, `rest_feature`, `rest_website`, `rest_email`) VALUES
(11, 'Nandos Bangladesh', '27 Dhanmondi, Dhaka, Bangladesh', 2007, 'Air Condition', 'www.NandosBangladesh.com', 'NandosBangladesh@gmail.com'),
(12, 'Kosturi', 'Zaman Chamber,7th Floor, Gulshan , Dhaka', 2007, 'Air Condition', 'www.Kosturi.com', 'Kosturi@gmail.com'),
(13, 'Bunka', 'Road 96, House 19, Gulshan 2, Dhaka, Ban', 2007, 'Air Condition', 'www.Bunka.com', 'Bunka@gmail.com'),
(14, 'Pizza Hut', 'Gulshan South, Dhaka, Bangladesh', 2007, 'Air Condition', 'www.PizzaHut.com', 'PizzaHut@gmail.com'),
(15, 'Star Kabab & Restaurant', 'Banani, Dhaka, Bangladesh', 2007, 'Air Condition', 'www.StarKabab.com', 'StarKabab@gmail.com'),
(16, 'Grand Nawab', '13/1, Abul Hasnat Road | Satrowja, Near ', 2007, 'Air Condition', 'www.GrandNawab.com', 'GrandNawab@gmail.com'),
(17, '\r\nHakka Dhaka', 'House-66, Road-10, Block-D | Banini, Dha', 2007, 'Air Condition', 'www.Hakkab.com', 'Hakka@gmail.com'),
(24, 'Mad Chef', '15 No Bus Stand,Dhanmondi', 2015, 'None', 'www.madchef.com', 'madchef@gmail.com'),
(47, 'Burger King ', 'Dhanmondi', 2015, 'None', 'None', 'None'),
(48, 'Appleiano', 'Taltola', 2012, 'None', 'None', 'None'),
(49, 'Chillox', 'Jigatola', 2016, 'None', 'None', 'None'),
(54, 'Takeout', 'Dhanmondi', 2014, 'None', 'None', 'None'),
(55, 'a', 'b', 2, 'c', 'd ', 'e');

-- --------------------------------------------------------

--
-- Table structure for table `restaurent_rating`
--

CREATE TABLE `restaurent_rating` (
  `C_ID` int(11) NOT NULL,
  `rest_ID` int(11) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurent_rating`
--

INSERT INTO `restaurent_rating` (`C_ID`, `rest_ID`, `rating`) VALUES
(20, 11, 4),
(21, 11, 3),
(22, 11, 1),
(23, 11, 4),
(24, 11, 1),
(25, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rest_foods`
--

CREATE TABLE `rest_foods` (
  `r_ID` int(11) NOT NULL,
  `f_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `food` binary(1) DEFAULT NULL,
  `restaurant` binary(1) DEFAULT NULL,
  `f_ID` int(11) DEFAULT NULL,
  `rest_ID` int(11) DEFAULT NULL,
  `review` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `C_ID`, `food`, `restaurant`, `f_ID`, `rest_ID`, `review`) VALUES
(15, 21, NULL, 0x31, NULL, 11, 'Beautiful restaurant.Amazing food.'),
(16, 21, NULL, 0x31, NULL, 11, 'Amazing view,delicious food.Loved it.'),
(17, 21, 0x31, NULL, 30, NULL, 'Love to eat this again.\r\n'),
(18, 22, 0x31, NULL, 30, NULL, 'Thought its expensive but its worth spending money for.'),
(19, 25, NULL, 0x31, NULL, 11, 'Not very sure how the restaurant was but the food was nice.'),
(20, 25, 0x31, NULL, 30, NULL, 'Best salad ever.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`f_ID`);

--
-- Indexes for table `food_rating`
--
ALTER TABLE `food_rating`
  ADD PRIMARY KEY (`C_ID`,`f_ID`),
  ADD KEY `C_ID` (`C_ID`,`f_ID`),
  ADD KEY `f_ID` (`f_ID`);

--
-- Indexes for table `restaurent`
--
ALTER TABLE `restaurent`
  ADD PRIMARY KEY (`rest_ID`);

--
-- Indexes for table `restaurent_rating`
--
ALTER TABLE `restaurent_rating`
  ADD PRIMARY KEY (`C_ID`,`rest_ID`),
  ADD KEY `C_ID` (`C_ID`,`rest_ID`),
  ADD KEY `rest_ID` (`rest_ID`);

--
-- Indexes for table `rest_foods`
--
ALTER TABLE `rest_foods`
  ADD PRIMARY KEY (`r_ID`),
  ADD KEY `f_ID` (`f_ID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `C_ID` (`C_ID`),
  ADD KEY `food_restaurent_id` (`f_ID`),
  ADD KEY `rest_ID` (`rest_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `f_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `restaurent`
--
ALTER TABLE `restaurent`
  MODIFY `rest_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food_rating`
--
ALTER TABLE `food_rating`
  ADD CONSTRAINT `food_rating_ibfk_1` FOREIGN KEY (`C_ID`) REFERENCES `customers` (`C_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `food_rating_ibfk_2` FOREIGN KEY (`f_ID`) REFERENCES `foods` (`f_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurent_rating`
--
ALTER TABLE `restaurent_rating`
  ADD CONSTRAINT `restaurent_rating_ibfk_1` FOREIGN KEY (`rest_ID`) REFERENCES `restaurent` (`rest_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restaurent_rating_ibfk_3` FOREIGN KEY (`C_ID`) REFERENCES `customers` (`C_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rest_foods`
--
ALTER TABLE `rest_foods`
  ADD CONSTRAINT `rest_foods_ibfk_3` FOREIGN KEY (`r_ID`) REFERENCES `restaurent` (`rest_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rest_foods_ibfk_4` FOREIGN KEY (`f_ID`) REFERENCES `foods` (`f_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`C_ID`) REFERENCES `customers` (`C_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`rest_ID`) REFERENCES `restaurent` (`rest_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`f_ID`) REFERENCES `foods` (`f_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
